<?php

//namespace GiphyApp;
namespace App;

//define('GIPHY_API_URL', 'http://api.giphy.com');
const GIPHY_API_URL = 'http://api.giphy.com';

class Giphy {

    private static $key;

    public function __construct(String $key = 'dc6zaTOxFJmzC') {
        self::$key = $key;
    }
    
    public function search ($query, $limit = 5, $offset = 0) {
        $endpoint = '/v1/gifs/search';
        $params = array(
            'q' => urlencode($query),
            'limit' => (int) $limit,
            'offset' => (int) $offset
        );
        return $this->request($endpoint, $params);
    }
    
    private function request ($endpoint, array $params = array()) {
        $params['api_key'] = self::$key;
        $query = http_build_query($params);
        $url = GIPHY_API_URL . $endpoint . ($query ? "?$query" : '');
        $result = file_get_contents($url);
        //return $result ? json_decode($result) : false;
        return $result ? $result : false;
    }
}
