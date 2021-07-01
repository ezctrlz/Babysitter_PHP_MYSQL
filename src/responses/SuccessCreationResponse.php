<?php
class SuccessCreationResponse extends JSONResponse {
    public function __construct($extraBody = []) {
        parent::__construct(array_merge([
            'message' => 'successful'
        ], $extraBody), 201);
    }
}
