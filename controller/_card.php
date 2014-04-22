<?php
    function get($req, $res) {
        $param = pickup($req, 'level', 'sidx');
        $card = get_card($param['level'], $param['sidx']);
        $res['cards'] = array(purify_values($card, 'html'));
    }
    function get_card($level, $idx) {
        $raw = file_get_contents('http://www.chintown.org/lookup/api.php?target=card&level='.$level.'&sidx='.$idx);
        $json = json_decode($raw, true);
        return $json['result'];
    }
