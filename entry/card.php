<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require('template/jquery.mobile.header.php');
    //require 'core/authentication.php';
?>

<div id="deck" data-role="content">
    <? foreach ($r_cards as $card) { ?>
    <div class="card">
        <h3 class="word"><?=$card['word']?></h3>
        <div class="forgot"><?=$card['forgot']?></div>

        <div class="map"></div>
        <ul class="flickr"></ul>

        <ul class="sentences">
            <? foreach ($card['sentence'] as $sentence) { ?>
            <li class="sentence"><?=html_entity_decode($sentence)?></li>
            <? } ?>
        </ul>


        <div class="meaning"><?=$card['meaning']?></div>
        <hr>
        <div class="tip"><?=$card['tip']?></div>

        <div class="ui-icon"></div>

        <button class="card_flipper" class="ui-btn ui-shadow">FLIP</button>
    </div>
    <? } ?>
</div>

<?php
    $prev = ($r_sidx == 0) ? $r_num-1 : $r_sidx-1;
    $next = ($r_sidx == $r_num-1) ? 0 : $r_sidx+1;
?>
<a id="prev" href="<?=$r_param_prefix?>&sidx=<?=$prev?>"
   class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-carat-l"
   data-ajax="false"><?=($r_sidx+1)." / ".$r_num?></a>
<a id="next" href="<?=$r_param_prefix?>&sidx=<?=$next?>"
   class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-carat-r"
   data-ajax="false"><?=$card['forgot']?></a>


<div id="answer_control" data-role="navbar" data-iconpos="left" ><ul>
    <li id="">
        <a href="lookup.php?query=<?=urlencode($card['word'])?>" data-mini="true" class="ui-icon-search" data-icon="search" data-ajax="false" data-theme="b">QUERY</a>
    </li>
    <li id="answer_bad">
        <a href="javascript:void(0)" data-mini="true" class="ui-icon-delete" data-icon="delete" data-ajax="false" data-theme="b">BAD</a>
    </li>
    <li id="answer_good">
        <a href="javascript:void(0)" data-mini="true" class="ui-icon-check" data-icon="check" data-ajax="false" data-theme="b">GOOD</a>
    </li>
</ul></div>

<?php
    add_extra_footer('card.footer.php');
    require('template/jquery.mobile.footer.php');
?>
