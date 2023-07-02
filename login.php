<?php
session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';


if (isset($_POST['login']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['username'], $errMsgs, 'ユーザー名');
        $varidate[] = Varidate::IsRequired($_POST['password'], $errMsgs, 'パスワード');
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header('Location: ' . $loginPageUrl);
            exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginContinueFlag = isset($_POST['loginContinue']) ? true : false;

        $loginStatus = Func::login($username, $password, $loginContinueFlag);
        if(!$loginStatus)
        {
            $errMsgs[] = 'ユーザー名またはパスワードが間違っています。';
            $_SESSION['formVaridate'] = $errMsgs;
            header('Location: ' . $loginPageUrl);
            exit;
        }

        header('Location: ' . $inventoryPageUrl);
    }
    catch (PDOException $e)
    {
        echo 'データベースエラー:' . $e->getMessage();
    }
}

