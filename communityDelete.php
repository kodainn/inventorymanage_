<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $community_id = $_SESSION['login_user']['community_id'];
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
            $deleteCondition = "community_id = $community_id";
            SQL::db_delete('inventorymanage', 'message', $deleteCondition);
            SQL::db_delete('inventorymanage', 'community', $deleteCondition);
        }
        header("Location: {$communityPageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
