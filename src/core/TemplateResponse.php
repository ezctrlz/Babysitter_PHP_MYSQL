<?php
class TemplateResponse
{
    private $code;
    private $template;
    private $context;
    public function __construct($template, $context = [], $code = 200) {
        $this->template = $template;
        $this->context  = $context;
        $this->code = $code;
    }
    public function send()
    {
        http_response_code($this->code);
        extract($this->context);
        include TEMPLATES_DIR . $this->template . ".php";
        exit();
    }
}
