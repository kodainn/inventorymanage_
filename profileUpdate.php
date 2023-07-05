<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';
require_once __DIR__ . '/Func.php';

if(!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $loginUser = $_SESSION['login_user']['user_id'];
        $expression = "user_id = '{$loginUser}'";
        $userdata = SQL::db_fetch('inventorymanage', 'userdata', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}

if(isset($_POST['profile-update']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['username'], $errMsgs, 'ユーザー名');
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header("Location: {$profileUpdatePageUrl}");
            exit;
        }
        $filepath = !empty($_FILES['image']['name']) ? 'user_icon/'.$_FILES['image']['name'] : '';
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
        $user_id = $_SESSION['login_user']['user_id'];
        $user['username'] = $_POST['username'];
        !empty($_POST['password']) ? $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT) : ''; //パスワードはハッシュ化
        !empty($_POST['nickname']) ? $user['nickname'] = $_POST['nickname'] : '';
        !empty($_POST['gender']) ? $user['gender'] = $_POST['gender'] : '';
        !empty($_POST['birthdate']) ? $user['birthdate'] = $_POST['birthdate'] : '';
        !empty($_POST['imagepath']) ? $user['nickname'] = $_POST['nickname'] : '';


        $expression = "user_id = '{$user_id}'";
        SQL::db_update('inventorymanage', 'userdata', $user, $expression);
        header("Location: {$profilePageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'エラーメッセージ' . $e->getMessage();
    }
}

