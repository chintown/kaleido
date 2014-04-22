<?php
    $allowed_langs = array('en', 'zh-hant');
    $default_lang = 'en'; //'zh-hant';
    $lang = (empty($_GET['lang'])) ? $default_lang : strtolower(trim($_GET['lang']));
    $lang = in_array($lang, $allowed_langs) ? $lang : 'zh-hant';
    define('LANG', $lang);
    $TRANS = new Translator(LANG);

    $site_caped = ucfirst(SITE_CODE);
    // browser title
    $TITLE_SITE = $site_caped;
    // display title of html page
    $TITLE_PAGE = $site_caped;
    // meta tags
    $KEYWORDS = ''.SITE_CODE;
    $DESCRIPTION = 'Learning vocabularies could be fun';
    $HOME_LOGO = ''; // url
    // prefix of browser title shows the current page
    $NAV_DICT = array(
        'index' => $TRANS->k('entry.index', 'capital'),
        'setting' => $TRANS->k('entry.setting', 'capital'),
        'login' => $TRANS->k('entry.login', 'capital'),
        'logout' => $TRANS->k('entry.logout', 'capital'),
        'register' => $TRANS->k('entry.register', 'capital'),

        'lookdown' => 'L. Down',
        'lookup' => 'L. Up',
        'lookahead' => 'L. Ahead',
    );
    // http://api.jquerymobile.com/icons/
    $DROPDOWN_DICT = array(
        'lookdown'=> array('acl'=>array(), 'icon'=>'shop'),
        'lookup'=> array('acl'=>array(), 'icon'=>'search'),
        'lookahead'=> array('acl'=>array(), 'icon'=>'eye'),
    );