<?php
session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';


if (isset($_POST['signup']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['username'], $errMsgs, 'ユーザー名');
        $varidate[] = Varidate::IsRequired($_POST['password'], $errMsgs, 'パスワード');
        $varidate[] = Varidate::IsRequired($_POST['rePassword'], $errMsgs, 'パスワード(再確認)');
        $varidate[] = Varidate::IsUsernameRule($_POST['username'], $errMsgs);
        $varidate[] = Varidate::IsPasswordRule($_POST['password'], $errMsgs);
        $varidate[] = Varidate::IsPasswordMatch($_POST['password'], $_POST['rePassword'], $errMsgs);
        $varidate[] = Varidate::IsUserUnique($_POST['username'], $errMsgs);
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header('Location: ' . $signupPageUrl);
            exit;
        }

        $user['username'] = $_POST['username'];
        $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //セキュリティの観点からパスワードはハッシュ化しておく(新規登録db挿入用)
        $password = $_POST['password']; //ログイン用
        $loginContinueFlag = isset($_POST['loginContinue']) ? true : false;

        SQL::db_insert('inventorymanage', 'userdata', $user);
        $loginStatus = Func::login($user['username'], $password, $loginContinueFlag);

        if(!$loginStatus)
        {
            array_push($errMsgs, 'ログインに失敗しました。');
            header('Location: ' . $signupPageUrl);
            exit;
        }

        header('Location: ' . $inventoryPageUrl);
    }
    catch (PDOException $e)
    {
        echo 'データベースエラー:' . $e->getMessage();
    }
}

