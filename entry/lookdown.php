<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require('template/jquery.mobile.header.php');
    //require 'core/authentication.php';
?>

<div id="lookdown" data-role="content">
    <ul class="buckets" data-role="listview" data-count-theme="a">
        <?php
        $r_buckets = array_reverse($r_buckets);
        foreach($r_buckets as $bucket) {
            $max = max(floatval($bucket['num']), floatval($bucket['capacity']));
            $num_index = 100 * floatval($bucket['num']) / $max;
            $capacity_index = 100 * floatval($bucket['capacity']) / $max;
            ?>
            <li class="bucket">
                <a href="card.php?level=<?=$bucket['level']?>&sidx=<?=$bucket['sidx']?>" data-ajax="false">
                    <h2 class="meta level">Lv <?=$bucket['level']?> — <?=$bucket['capacity']?></h2>
                    <span class="meta num ui-li-count"><?=$bucket['num']?></span>
                    <span class="percentage-index" style="width: <?=$num_index?>%"><?=$num_index?>%</span>
                    <span class="capacity-index" style="width: <?=$capacity_index?>%"><?=$capacity_index?>%</span>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</div>

<?php
    add_extra_footer('lookdown.footer.php');
    require('template/jquery.mobile.footer.php');
?>
