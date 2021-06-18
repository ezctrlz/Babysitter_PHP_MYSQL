<?php
class Response
{
    private $code;
    private $contentType;
    private $body;
    public function __construct($body, $code = 200, $contentType = 'text/html; charset=utf-8') {
        $this->body = $body;
        $this->code = $code;
        $this->contentType = $contentType;
    }
    public function send()
    {
        http_response_code($this->code);
        header('Content-Type: ' . $this->contentType);
        echo $this->body;
        exit();
    }
}
