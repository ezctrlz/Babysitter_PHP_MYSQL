<?php
require_once MODELS_DIR . "UserModel.php";
require_once SERVICES_DIR . "UserService.php";
require_once ERRORS_DIR . "NotFoundError.php";
require_once ERRORS_DIR . "ValidationError.php";

class AuthenticationService
{
    static public function signup($userData)
    {
        $user = UserService::createUser($userData);
        self::createSession($user);
        return $user;
    }

    static public function signin($username, $password)
    {
        $userModel = new UserModel();

        $user = $userModel->getByUserName($username);

        if ($user) {
            if($user['password'] === md5($password)) {
                $user = UserService::clearUser($user);
                self::createSession($user);
                return $user;
            }
            throw new ValidationError();
            
        }
        throw new NotFoundError("User");
    }

    static public function signout()
    {
        Session::destroy();
    }

    static public function isLogged() {
        return Session::e('user');
    }

    static private function createSession($user)
    {
        Session::s('user', $user);
    }
}
