<?php
    // 0 | 1
    define('DEV_MODE',1);
    if (DEV_MODE) {
        ini_set('display_errors', 'On');
    }
    // remote (for linode dev) | local (for Mac dev)
    define('ENV','local');

    define('MOBILE_APP_ICON', true);

    define('AUTH_COOKIE_SECONDS', 60*60*24); // 24hr

    // facebook
    define('FB_APP_ID', '679538345446379');
    define('FB_APP_SECRET', '');