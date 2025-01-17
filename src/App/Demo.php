<?php
namespace App\App;

use App\Util\HttpRequest;
class Demo {
    const URL = "http://some-api.com/user_info";
    private $_logger;
    private $_req;
    function __construct($logger, HttpRequest $req) {
        $this->_logger = $logger;
        $this->_req = $req;
    }
    function set_req(HttpRequest $req) {
        $this->_req = $req;
    }
    function foo() {
        return "bar";
    }
    function get_user_info() {
        $result = $this->_req->get(self::URL);
        $result_arr = json_decode($result, true);
        if (!$result_arr || !is_array($result_arr)) return null;
        if (isset($result_arr['error']) && $result_arr['error'] == 0) {
            if (isset($result_arr['data'])) {
                return $result_arr['data'];
            }
        } else {
            $this->_logger->error("fetch data error.");
        }
        return null;
    }
}
