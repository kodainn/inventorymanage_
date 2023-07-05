<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';

if( !empty($_SESSION['login_user']['user_id']) && isset($_POST['community_create']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['title'], $errMsgs, 'タイトル');
        $varidate[] = Varidate::IsRequired($_POST['genre'], $errMsgs, 'ジャンル');
        $varidate[] = Varidate::IsMax($_POST['title'], $errMsgs, 20,'タイトル');
        $varidate[] = Varidate::IsMax($_POST['description'], $errMsgs, 100,'説明');
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header("Location: {$communityCreatePageUrl}");
            exit;
        }
        $filepath = !empty($_FILES['image']['name']) ? 'community_icon/'.$_FILES['image']['name'] : '';
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
        $community['user_id'] = $_SESSION['login_user']['user_id'];
        $community['title'] = $_POST['title'];
        $community['genre'] = $_POST['genre'];
        !empty($_POST['description']) ? $community['description'] = $_POST['description'] : '';
        !empty($_POST['imagepath']) ? $community['imagepath'] = $_POST['imagepath'] : '';
        SQL::db_insert('inventorymanage', 'community', $community);
        header("Location: {$communityPageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー:' . $e->getMessage();
    }
}