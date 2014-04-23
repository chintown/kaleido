<?php
    function get($req, $res) {
        $param = pickup($req, 'level', 'sidx', 'num');

        update_sidx($param['level'], $param['sidx']);
        $card = get_card($param['level'], $param['sidx']);

        $res['cards'] = array(purify_values($card, 'html'));
        $res['sidx'] = $param['sidx'];
        $res['num'] = $param['num'];
        $res['param_prefix'] = 'card.php?&level='.$param['level'].'&num='.$param['num'];
    }
    function get_card($level, $idx) {
        $raw = file_get_contents('http://www.chintown.org/lookup/api.php?target=card&level='.$level.'&sidx='.$idx);
        $json = json_decode($raw, true);
        return $json['result'];
    }
    function update_sidx($level, $idx) {
        file_get_contents('http://www.chintown.org/lookup/api.php?target=_jump&level='.$level.'&sidx='.$idx);
    }
