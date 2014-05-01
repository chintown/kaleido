<?php
    header("Location: lookdown.php");
    exit(0);

    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require 'template/header.php';
    require 'core/authentication.php';
?>

<div id="index">
</div>

<div id="wrap_template">
<?php
    //require 'template/crud.php';
    //require 'template/index.crud.php';
?>
</div>
<?php
    add_extra_footer('index.footer.php');
    require 'template/footer.php';
?>
