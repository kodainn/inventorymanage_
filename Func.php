<?php
require_once __DIR__ . '/SQL.php';


class Func
{
    public static function login(string $username, string $password, bool $loginContinueFlag): bool
    {
        $success = false;
        $expression = "username = '{$username}'";
        $dbuser = SQL::db_fetch('inventorymanage', 'userdata', $expression);
        if (!empty($dbuser['username']) && password_verify($password, $dbuser['password'])) {
            session_regenerate_id(true);
            $_SESSION['login_user']['user_id'] = $dbuser['user_id'];
            $_SESSION['login_user']['username'] = $dbuser['username'];
            if ($loginContinueFlag) {
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
        unset($_SESSION['login_user']);
        session_destroy();
        setcookie('inventorymanage', '', time() - (60 * 60));
    }

    public static function deadlineCheck($date)
    {
        $rtn = '';
        $safetyline = date("Y-m-d", strtotime(date('') . "+7 days"));
        $warningline = date("Y-m-d", strtotime(date('') . "+3 days"));
        $deadline = date("Y-m-d", strtotime(date('') . "-1 days"));
        if ($date > $safetyline) {
            $rtn = 'table-success';
        } else if ($date > $warningline) {
            $rtn = 'table-warning';
        } else if ($date > $deadline) {
            $rtn = 'table-danger';
        } else {
            $rtn = 'table-secondary';
        }
        return $rtn;
    }
}
