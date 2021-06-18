<?php
require_once MODELS_DIR . "UserModel.php";
require_once SERVICES_DIR . "UserService.php";
require_once ERRORS_DIR . "NotFoundError.php";
require_once ERRORS_DIR . "ValidationError.php";

class AuthenticationService
{
    static public function signup($userData)
    {
        return UserService::createUser($userData);
    }

    static public function signin($username, $password)
    {
        $userModel = new UserModel();

        $user = $userModel->getByUserName($username);

        if ($user) {
            if($user['password'] === md5($password)) {
                return UserService::clearUser($user);
            }
            throw new ValidationError();
            
        }
        throw new NotFoundError("User");
    }
}
