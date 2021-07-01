<?php
class SuccessResponse extends JSONResponse {
    public function __construct($extraBody = []) {
        parent::__construct(array_merge([
            'message' => 'successful'
        ], $extraBody), 200);
    }
}