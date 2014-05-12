<?php
    function get($req, &$res) {
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

        $json['result']['sentence'] = parseSentences($json['result']['sentence']);
        return $json['result'];
    }
    function parseSentences($raw) {
        $parts = preg_split('/([.]?.▇)|([.] )/', $raw);
        $parts = map($parts, 'trim', false);
        $parts = array_filter($parts, function($v) {return !empty($v);});
        //de($raw);
        //de($parts);
        return $parts;
    }
    function update_sidx($level, $idx) {
        file_get_contents('http://www.chintown.org/lookup/api.php?target=_jump&level='.$level.'&sidx='.$idx);
    }
