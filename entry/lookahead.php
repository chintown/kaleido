<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require('template/jquery.mobile.header.php');
    //require 'core/authentication.php';
?>

<div data-role="content" id="lookahead">
    <ul data-role="listview" data-split-icon="search" data-theme="a" data-split-theme="a">
        <?php
        foreach($r_headlines as $headline) {
            ?>
            <li class="headline">
                <a href="#">
                    <div class="meta"><?=$headline['timestamp']?> — <?=purify($headline['provider'], 'html')?></div>
                    <div class="en"><?=$headline['en']?></div>
                    <div class="ch" hidden><?=$headline['ch']?></div>
                    <div class="query" hidden><?=purify($headline['en_highlight'], 'url')?></div>
                </a>
                <a href="lookup?query=<?=purify($headline['en_highlight'], 'url')?>" data-ajax="false"></a>
            </li>
        <?php
        }
        ?>
    </ul>

</div>

<?php
    add_extra_footer('lookahead.footer.php');
    require('template/jquery.mobile.footer.php');
?>
