<?php
    function get($req, $res) {
        $param = pickup($req, 'query', 'source');
        $query = $param['query'];
        $source = $param['source'];

        $source = empty($source ) ? 'lookup' : $source ;
        $url = empty($query) ? '' : get_source_url($source).$query;

        $res['source'] = $source;
        $res['query'] = purify($query, 'html');
        $res['url'] = $url;
    }

    function get_source_url($source) {
        $dict = array(
            'lookup'=> 'http://www.chintown.org/lookup/?query=',
            'wordnik'=> "http://www.wordnik.com/words/",
            'ciku'=> "http://m.nciku.com/en/en/detail/?query=",
            'termly'=> "http://term.ly/",
            'yahoo'=> "http://tw.dictionary.search.yahoo.com/search?p=",
            'google'=> "http://www.google.com/search?&tbs=nws&q=define%20"
        );
        return $dict[$source];
    }

