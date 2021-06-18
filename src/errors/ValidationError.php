<?php
class ValidationError extends Exception
{
    public function __construct($error = "Validation Error", $code = 0) {
        parent::__construct($error, $code);
    }
}
