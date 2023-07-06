<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

if (!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $user_id = $_SESSION['login_user']['user_id'];
        $community_id = $_GET['data'];
        $expression = "community_id = {$community_id} order create_date desc";
        $communitydata = SQL::db_fetchAll('inventorymanage', 'message', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
