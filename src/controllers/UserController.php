<?php
require_once UTILS_PATH;
require_once RESPONSES_DIR . "SuccessResponse.php";
require_once MIDDLEWARES_DIR . "IsLoggedMiddleware.php";
class UserController extends BaseController
{
    public function __construct(Request $request) {
        parent::__construct($request, [
            [
                'pattern' => '/^\/api\/users\/me\/?$/',
                'methods' => ['GET'],
                'action' => 'me',
                'middlewares' => [
                    new IsLoggedMiddleware()
                ]
            ],
        ]);
    }

    public function me($args)
    {
        return new SuccessResponse(['user' => $_SESSION['user']]);
    }
}
