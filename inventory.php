<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

if (!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $user_id = $_SESSION['login_user']['user_id'];
        $expression = "user_id = '{$user_id}' order by category, deadline";
        $inventoryData = SQL::db_fetchAll('inventorymanage', 'inventory', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
