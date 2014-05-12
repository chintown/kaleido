<?php
    function get($req, &$res) {
        $param = pickup($req, '');

        $headlines = get_headlines();
        $headlines = map($headlines, 'cook_highlight', false);
        $res['headlines'] = $headlines;
    }

    function get_headlines() {
        $raw = file_get_contents('http://www.chintown.org:9000/headline/');
        $json = json_decode($raw, true);
        return $json['result'];
    }

    function cook_highlight(&$dict) {
        $dict['en'] = preg_replace('/(.*)('.$dict['en_highlight'].')(.*)/', '\1<mark>\2</mark>\3', $dict['en']);
        $dict['ch'] = preg_replace('/(.*)('.$dict['ch_highlight'].')(.*)/', '\1<mark>\2</mark>\3', $dict['ch']);
        return $dict;
    }
