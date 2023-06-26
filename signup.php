<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';
session_start();

$errMsgs = [];
$formVaridationFlag = false;
$siginupPageUrl = "http://localhost/----/signupPage.php";
$inventoryPageUrl = "http://localhost/----/inventoryPage.php";

if (isset($_POST['signup']))
{
    if (empty($_POST['userName']) || empty($_POST['password']) || empty($_POST['rePassword']))
    {
        array_push($errMsgs, 'フォームに空欄があります。');
        $formVaridationFlag = true;

    } elseif ($_POST['password'] !== $_POST['rePassword'])
    {
        array_push($errMsgs, 'パスワードと再確認用パスワードが一致しません。');
        $formVaridationFlag = true;
    }

    if(!preg_match('/^[a-zA-Z0-9]{6,20}$/', $_POST['userName']))
    {
        array_push($errMsgs, 'ユーザー名は６文字以上２０文字以下の英数字です。');
        $formVaridationFlag = true;
    }

    if(!preg_match('/^[a-zA-Z0-9]{8,100}$/', $_POST['password']))
    {
        array_push($errMsgs, 'パスワードは８文字以上１００文字以下の英数字です。');
        $formVaridationFlag = true;
    }

    if($formVaridationFlag)
    {
        $_SESSION['formVaridate'] = $errMsgs;
        header('Location: ' . $siginupPageUrl);
        exit;
    }

    if (!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['rePassword']))
    {
        try
        {
            $user['userName'] = $_POST['userName'];
            $password = $_POST['password'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT); //セキュリティの観点からパスワードはハッシュ化しておく
            $user['password'] = $password_hash;
            $loginContinueFlag = isset($_POST['loginContinue']) ? true : false;
            $allUsername = SQL::db_fetch('loginmanagement', 'userdata');


            //データベースのusernameと一致したらメッセージを表示
            foreach ($allUsername as $u)
            {
                if ($user['userName'] === $u['username'])
                {
                    array_push($errMsgs, 'そのユーザー名は既に使われています。');
                    $formVaridationFlag = true;
                    break;
                }
            }

            if($formVaridationFlag)
            {
                $_SESSION['formVaridate'] = $errMsgs;
                header('Location: ' . $siginupPageUrl);
                exit;
            }

            SQL::db_insert('loginmanagement', 'userdata', $user);
            $loginStatus = Func::Login($user['userName'], $password, $loginContinueFlag);

            if(!$loginStatus)
            {
                array_push($errMsgs, 'ログインに失敗しました。');
                header('Location: ' . $siginupPageUrl);
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
