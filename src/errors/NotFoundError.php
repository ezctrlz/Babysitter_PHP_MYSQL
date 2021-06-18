<?php
class NotFoundError extends Exception
{
    public function __construct($who) {
        parent::__construct("$who not found");
    }
}
