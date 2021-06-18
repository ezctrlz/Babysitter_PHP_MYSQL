<?php
require_once MODELS_DIR . "UserModel.php";

class UserService {
    static public function createUser($userData)
    {
        if (!empty($userData['image'])) {
            // TODO: Save image
            $userData['imageUrl'] = '';
        }

        $userModel = new UserModel();

        return self::clearUser($userModel->create(
            [
                NULL,
                $userData['username'],
                md5($userData['password']),
                $userData['role'],
                $userData['imageUrl']
            ]
        ));
    }

    static public function clearUser($user)
    {
        return $user?[
            "user_id" => intval($user["user_id"]),
            "username" => $user["username"],
            "role" => $user["role"],
            "photo_url" => $user["photo_url"]
        ]:null;
    }
}