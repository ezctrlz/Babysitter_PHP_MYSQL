<?php
require_once RESPONSES_DIR . "UnauthorizedErrorResponse.php";
require_once SERVICES_DIR . "AuthenticationService.php";

class IsLoggedMiddleware {
    public function __invoke($next)
    {
        if (AuthenticationService::isLogged()) {
            return $next();
        } else {
            return new UnauthorizedErrorResponse();
        }
    }
}