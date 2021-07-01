<?php
class NotFoundErrorResponse extends ErrorResponse {
    public function __construct($message = 'Not Found', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $message, $errorCode, 404, $extraBody);
    }
}