<?php
require_once __DIR__ . '/SQL.php';
session_start();
$errMsgNum = 0;
$loginPageUrl = "http://localhost/front/signupPage.php?errMsgNum=";
$inventoryPageUrl = "http://localhost/front/inventoryPage.php";
if (isset($_POST['signup']))
{
    if (empty($_POST['userName']) || empty($_POST['password']) || empty($_POST['rePassword']))
    {
        $errMsgNum = 1;
        header("Location:" . $loginPageUrl . $errMsgNum);
    } elseif ($_POST['password'] !== $_POST['rePassword'])
    {
        $errMsgNum = 2;
        header("Location:" . $loginPageUrl . $errMsgNum);
    }
    if (!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['rePassword']))
    {
        try
        {
            $user['userName'] = $_POST['userName'];
            $user['password'] = $_POST['password'];
            $rePassword = $_POST['rePassword'];
            $allUsername = db_fetch('loginmanagement', 'userdata');
            //データベースのusernameと一致したらメッセージを表示
            foreach($allUsername as $u) {
                echo $u['username'].'<br>';
                if($user['userName'] === $u['username']) {
                    $errMsgNum = 3;
                    header("Location: ".$loginPageUrl.$errMsgNum);
                }
            }
            db_insert('loginmanagement', 'userdata', $user);
            //header('Location: '.$inventoryPageUrl);
        }
        catch(PDOException $e)
        {
            echo 'データベースエラー:'.$e->getMessage();
        }
    }
}
