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
    add_extra_footer('card.footer.php');
    require('template/jquery.mobile.footer.php');
?>
