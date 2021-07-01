<?php
class BadRequestErrorResponse extends ErrorResponse {
    public function __construct($detail = 'Bad Request', $message = 'Bad Request', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $detail, $errorCode, 400, $extraBody);
    }
}