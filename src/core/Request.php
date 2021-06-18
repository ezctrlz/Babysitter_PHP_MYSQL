<?php
class Request {
    public $method = '';
    public $uri = '';
    public $query = [];
    public $body;
    public $files;
    
    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
        $this->query = $_GET;
        $this->files = $_FILES;
        if (empty($_POST)) {
            $input = file_get_contents('php://input');
            if(!empty($input)) {
                $json = json_decode($input, true);
                if ($_SERVER['CONTENT_TYPE'] && $_SERVER['CONTENT_TYPE'] === 'application/json' && $json){
                    $this->body = $json;
                }else {
                    $this->body = ['input' => $input];
                }
            }
        }else {
            $this->body = $_POST;
        }
    }

    public function getUriParts()
    {
        return explode("/", $this->uri);
    }
}