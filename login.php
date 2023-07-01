<?php
session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';
require_once __DIR__ . '/url.php';


if (isset($_POST['login']))
{
    $formVaridationFlag = false;
    if (empty($_POST['username']) || empty($_POST['password']))
    {
        $errMsg = 'フォームに空欄があります。';
        $formVaridationFlag = true;

    }

    if($formVaridationFlag)
    {
        $_SESSION['formVaridate'] = $errMsg;
        header('Location: ' . $loginPageUrl);
        exit;
    }

    if (!empty($_POST['username']) && !empty($_POST['password']))
    {
        try
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $loginContinueFlag = isset($_POST['loginContinue']) ? true : false;

            $loginStatus = Func::login($username, $password, $loginContinueFlag);
            if(!$loginStatus)
            {
                $errMsg = 'ユーザー名またはパスワードが間違っています。';
                $_SESSION['formVaridate'] = $errMsg;
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
}
