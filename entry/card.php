<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require('template/jquery.mobile.header.php');
    //require 'core/authentication.php';
?>

<div id="deck">
    <? foreach ($r_cards as $card) { ?>
    <div class="card">
        <div class="word"><?=$card['word']?></div>

        <div class="forgot"><?=$card['forgot']?></div>

        <div class="meaning"><?=$card['meaning']?></div>
        <div class="tip"><?=$card['tip']?></div>

        <div class="sentence"><?=$card['sentence']?></div>
    </div>
    <? } ?>
</div>

<?php
    add_extra_footer('card.footer.php');
    require('template/jquery.mobile.footer.php');
?>
