<?php
if(session_id() == ''){
    session_start();
}

class Session {
    /**
     * Get a variable from session or return default value
     *
     * @param string $varName
     * @param string $default
     * @return mixed
     */
    static public function g($varName, $default = '')
    {
        return self::e($varName)?$_SESSION[$varName]:$default;
    }
    
    /**
     * Set a variable in session
     *
     * @param string $varName
     * @param mixed $value
     * @return void
     */
    static public function s($varName, $value)
    {
        $_SESSION[$varName] = $value;
    }

    /**
     * Verify existence of a variable in session
     *
     * @param string $varName
     * @return bool
     */
    static public function e($varName)
    {
        return array_key_exists($varName, $_SESSION);
    }

    /**
     * Destroy the current session
     *
     * @return void
     */
    static public function destroy()
    {
        session_start();
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
        session_destroy();
    }
}