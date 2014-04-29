<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require 'template/header.php';
    //require 'core/authentication.php';
?>

<div id="login">
    <form id="form-login" method="post" action="login.php" class="">
<!--        <div class="wrapper l-width-fit">-->
<!--            <label for="user">Account</label>-->
<!--            <input id="user" type="text" name="k" class="input-block-level"-->
<!--                   placeholder="" value="--><?//=$r_k?><!--" tabindex="1">-->
<!--            <label for="pass">Password</label>-->
<!--            <input id="pass" type="password" name="v" class="input-block-level"-->
<!--                   placeholder="" value="" tabindex="2">-->
<!--            <button class="btn input-block-level"-->
<!--                    type="submit" tabindex="4">Login</button>-->
<!--            <input type="hidden" name="r" value="--><?//=$r_r?><!--">-->
<!--        </div>-->
<!---->
<!--        <br>-->

        <div id="login_options" class="l-width-fit">
            <a href="oauth_fb.php?r=<?=$r_r?>" class="btn input-block-level" type="submit" tabindex="4"><i class="icon-facebook"></i></a>
        </div>
    </form>
</div>

<div id="wrap_template">
<?php
    //require 'template/crud.php';
    //require 'template/login.crud.php';
?>
</div>
<?php
    add_extra_footer('login.footer.php');
    require 'template/footer.php';
?>
