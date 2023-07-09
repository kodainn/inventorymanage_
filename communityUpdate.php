<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';
require_once __DIR__ . '/Func.php';


if(isset($_POST['community-update']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['title'], $errMsgs, 'タイトル');
        $varidate[] = Varidate::IsRequired($_POST['genre'], $errMsgs, 'ジャンル');
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header("Location: {$communityUpdatePageUrl}");
            exit;
        }
        $filepath = !empty($_FILES['image']['name']) ? 'community_icon/'.$_FILES['image']['name'] : '';
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
        !empty($_POST['title']) ? $community['title'] = $_POST['title'] : '';
        !empty($_POST['genre']) ? $community['genre'] = $_POST['genre'] : '';
        !empty($_POST['description']) ? $community['description'] = $_POST['description'] : '';
        !empty($filepath) ? $community['imagepath'] = $filepath : '';
        $community_id = $_SESSION['login_user']['community_id'];
        $expression = "community_id = {$community_id}";
        SQL::db_update('inventorymanage', 'community', $community, $expression);
        header("Location: {$communityPageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'エラーメッセージ' . $e->getMessage();
    }
}

if(!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        if(!empty($_SESSION['login_user']['community_id']) && !empty($_GET['data']))
        {
            unset($_SESSION['login_user']['community_id']);
            $_SESSION['login_user']['community_id'] = $_GET['data'];
            $community_id = $_SESSION['login_user']['community_id'];
        } elseif (!empty($_GET['data']))
        {
            $_SESSION['login_user']['community_id'] = $_GET['data'];
            $community_id = $_SESSION['login_user']['community_id'];
        } elseif (isset($_POST))
        {
            $community_id = $_SESSION['login_user']['community_id'];
        }
        $user_id = $_SESSION['login_user']['user_id'];
        $communityCondition = "community_id = {$community_id} and user_id = '{$user_id}'";
        $accessright = false;
        $accessCount = SQL::db_getcount('inventorymanage', 'community', $communityCondition);
        if($accessCount > 0)
        {
            $accessright = true;
        }

        if($accessCount)
        {
            $communitydata = SQL::db_fetch('inventorymanage', 'community', $communityCondition);
        } else
        {
            header("Location: {$communityPageUrl}");
            exit;
        }
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}