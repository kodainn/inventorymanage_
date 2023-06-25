<?php
session_start();
require_once __DIR__ . '/SQL.php';

class Func
{
    static function Login(string $username, string $password, $loginConitueFlag): bool
    {
        $success = false;
        $dbuser = SQL::db_fetch('loginmanagement', 'userdata', $expression = "username = {$username}");
        if(!empty($dbuser['username']) && password_verify($password, $dbuser['password']))
        {
            session_regenerate_id(true);
            $_SESSION['login_user']['username'] = $dbuser['username'];
            if($loginConitueFlag) {
                $cookieData = array(
                    'username' => $username,
                    'password' => $password
                );
                $seriCokkieData = json_encode($cookieData);
                setCookie('inventorymanage', $seriCokkieData, time() * 60 * 60 * 24 * 30); //一か月間Cookieを保存
            }
            $success = true;
        }
        return $success;
    }
}