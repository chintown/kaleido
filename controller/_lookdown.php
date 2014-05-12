<?php
    function get($req, &$res) {
        $param = pickup($req, '');

        $buckets = get_buckets();
        $res['buckets'] = $buckets;
    }
    function get_buckets() {
        $raw = file_get_contents('http://www.chintown.org/lookup/api.php?target=buckets');
        $json = json_decode($raw, true);
        return $json['result'];
    }

