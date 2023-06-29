<?php
require_once __DIR__ . '/SQL.php';


class Func
{
    public static function login(string $username, string $password, bool $loginContinueFlag): bool
    {
        $success = false;
        $dbuser = SQL::db_fetch('inventorymanage', 'userdata', expression: "username = '{$username}'");
        if(!empty($dbuser[0]['username']) && password_verify($password, $dbuser[0]['password']))
        {
            session_regenerate_id(true);
            $_SESSION['login_user']['username'] = $dbuser[0]['username'];
            if($loginContinueFlag)
            {
                $cookieData = array(
                    'username' => $username,
                    'password' => $password
                );
                $seriCokkieData = json_encode($cookieData);
                setcookie('inventorymanage', $seriCokkieData, time() + (60 * 60 * 24 * 30)); //一か月間Cookieを保存
            }

            $success = true;
        }
        return $success;
    }

    public static function logout()
    {
        unset($_SESSION['login_user']['username']);
        session_destroy();
        setcookie('inventorymanage', '', time() - (60 * 60));
    }
}