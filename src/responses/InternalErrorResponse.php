<?php
class InternalErrorResponse extends ErrorResponse {
    public function __construct($detail = 'Internal Error', $message = 'Internal Error', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $detail, $errorCode, 500, $extraBody);
    }
}