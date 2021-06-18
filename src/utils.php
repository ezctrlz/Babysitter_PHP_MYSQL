<?php
class SuccessCreationResponse extends JSONResponse {
    public function __construct($extraBody = []) {
        parent::__construct(array_merge([
            'message' => 'successful'
        ], $extraBody), 201);
    }
}

class SuccessResponse extends JSONResponse {
    public function __construct($extraBody = []) {
        parent::__construct(array_merge([
            'message' => 'successful'
        ], $extraBody), 200);
    }
}

class ErrorResponse extends JSONResponse {
    public function __construct($detail = 'Error', $message = 'Error', $errorCode = 0, $code = 400, $extraBody = []) {
        parent::__construct(array_merge([
            'message' => $message,
            'detail' => $detail,
            'errorCode' => $errorCode
        ], $extraBody), $code);
    }
}

class IternalErrorResponse extends ErrorResponse {
    public function __construct($detail = 'Iternal Error', $message = 'Iternal Error', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $detail, $errorCode, 500, $extraBody);
    }
}

class BadRequestErrorResponse extends ErrorResponse {
    public function __construct($detail = 'Bad Request', $message = 'Bad Request', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $detail, $errorCode, 400, $extraBody);
    }
}

class NotFoundErrorResponse extends ErrorResponse {
    public function __construct($message = 'Not Found', $errorCode = 0, $extraBody = []) {
        parent::__construct($message, $message, $errorCode, 404, $extraBody);
    }
}
