<?php
class ErrorResponse extends JSONResponse {
    public function __construct($detail = 'Error', $message = 'Error', $errorCode = 0, $code = 400, $extraBody = []) {
        parent::__construct(array_merge([
            'message' => $message,
            'detail' => $detail,
            'errorCode' => $errorCode
        ], $extraBody), $code);
    }
}