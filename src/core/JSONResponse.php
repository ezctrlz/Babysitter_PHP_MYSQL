<?php
class JSONResponse extends Response
{
    public function __construct($body, $code = 200) {
        parent::__construct(json_encode($body), $code, "application/json");
    }
}
