<?php
    require 'common/oauth.php';

    function get($req, &$res) {
        fb_get_wrapper($req, $res);
    }
