
<?php // leave file path as plain text (rather than php var) for better gen_js.py parsing
// keep the sequence of html attribute so that parser can get correct js files
if (DEV_MODE) { ?>
        <script type="text/javascript" src="<?=PARENT_WEB_PATH?>/js/vendor/iscroll.js"></script>
<?php } else { ?>
        <script src="<?=WEB_PATH?>/js/card.lib.min.js" type="text/javascript"></script>
<?php } ?>
<?php // leave file path as plain text (rather than php var) for better gen_js.py parsing
if (DEV_MODE) { ?>
        <script src="<?=toggle_min_script(PARENT_WEB_PATH.'/js/std.js')?>" type="text/javascript"></script>
        <script src="<?=toggle_min_script(PARENT_WEB_PATH.'/js/common.jquery.js')?>" type="text/javascript"></script>
        <script src="<?=toggle_min_script(WEB_PATH.'/js/common.project.js')?>" type="text/javascript"></script>
        <script src="<?=toggle_min_script(WEB_PATH.'/js/card.js')?>" type="text/javascript"></script>
<?php } else { ?>
        <script src="<?=WEB_PATH?>/js/card.pack.min.js" type="text/javascript"></script>
<?php } ?>
        <?php
echo serialize_vars_as_js(array(
    'TRANS'=> array(
    ),
));
?>