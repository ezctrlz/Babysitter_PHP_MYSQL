<?php
class UnauthorizedErrorResponse extends ErrorResponse {
    public function __construct($detail = 'Unauthorized', $message = 'Unauthorized', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $detail, $errorCode, 401, $extraBody);
    }
}