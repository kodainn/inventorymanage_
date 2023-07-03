<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_SESSION['login_user']['userid']))
{
    try
    {
        $loginUser = $_SESSION['login_user']['userid'];
        $expression = "userid = '{$loginUser}'";
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
        $userid = $_SESSION['login_user']['userid'];
        $user['username'] = $_POST['username'];
        !empty($_POST['password']) ? $user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT) : ''; //パスワードはハッシュ化
        $user['nickname'] = $_POST['nickname'];
        $user['gender'] = $_POST['gender'];
        $user['birthdate'] = $_POST['birthdate'];
        $expression = "userid = '{$userid}'";
        SQL::db_update('inventorymanage', 'userdata', $user, $expression);
        header("Location: {$profilePageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'エラーメッセージ' . $e->getMessage();
    }
}

