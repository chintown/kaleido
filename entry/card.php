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

        <div class="sentence"><?=$card['sentence']?></div>
        <div class="map"></div>
        <ul class="flickr"></ul>

        <div class="meaning"><?=$card['meaning']?></div>
        <div class="tip"><?=$card['tip']?></div>


    </div>
    <? } ?>
</div>

<?php
    $prev = ($r_sidx == 0) ? 0 : $r_sidx-1;
    $next = ($r_sidx == $r_num-1) ? $r_num-1 : $r_sidx+1;
?>
<a id="prev" href="<?=$r_param_prefix?>&sidx=<?=$prev?>"
   class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-carat-l"
   data-ajax="false">&nbsp;</a>
<a id="next" href="<?=$r_param_prefix?>&sidx=<?=$next?>"
   class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-carat-r"
   data-ajax="false">&nbsp;</a>

<?php
    add_extra_footer('card.footer.php');
    require('template/jquery.mobile.footer.php');
?>
