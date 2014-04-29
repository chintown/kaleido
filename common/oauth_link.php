<?php
    require_once 'common/auth.php';

    function oauth_link($source, $identifier, $params) {
        if ($source == 'facebook') {
            $sub_param = pickup($params, 'access_token', 'expired_stamp', 'email', 'name');

            // add DB record for new user
            keep_user_in_cookie($identifier, AUTH_COOKIE_SECONDS);
            keep_session_in_cookie($sub_param['access_token'], AUTH_COOKIE_SECONDS);

            return json_encode(array(
                "msg"=> "ok",
                "user_id"=> 'test_user'
            ));

//            return json_encode(array(
//                "msg"=> 'failed. '.$e->getMessage()
//            ));
        }
    }
