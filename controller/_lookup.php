<?php
    function get($req, $res) {
        $param = pickup($req, 'query', 'source', 'sentence');
        $query = $param['query'];
        $source = $param['source'];
        $sentence = purify($param['sentence'], 'urldecode');

        if (empty($query)) {
            $source = 'random_lookup';
        }

        $source = empty($source ) ? 'lookup' : $source ;
        $url = get_source_url($source, $sentence).$query;

        if (empty($query)) {
            $source = 'lookup';
        }

        $res['source'] = $source;
        $res['query'] = purify($query, 'html');
        $res['url'] = $url;
    }

    function get_source_url($source, $sentence) {
        $dict = array(
            'random_lookup'=> 'http://www.chintown.org/lookup/random.php',
            'lookup'=> 'http://www.chintown.org/lookup/?sentence='.purify($sentence, 'url').'&query=',
            'wordnik'=> "http://www.wordnik.com/words/",
            'ciku'=> "http://m.nciku.com/en/en/detail/?query=",
            'termly'=> "http://term.ly/",
            'yahoo'=> "http://tw.dictionary.search.yahoo.com/search?p=",
            'google'=> "http://www.google.com/search?&tbs=nws&q=define%20"
        );
        return $dict[$source];
    }

