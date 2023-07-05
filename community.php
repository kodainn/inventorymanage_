<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

if (!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $user_id = $_SESSION['login_user']['user_id'];
        $expression = "1 order by user_id = '{$user_id}' desc, community_id desc";
        $communitydata = SQL::db_fetchAll('inventorymanage', 'community', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
