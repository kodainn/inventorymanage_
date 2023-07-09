<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_SESSION['login_user']['user_id']) && !empty($_GET['data']))
{
    try
    {
        $inventoryId = $_GET['data'];
        $user_id = $_SESSION['login_user']['user_id'];
        $expression = "inventory_id = {$inventoryId} and user_id = '{$user_id}'";
        SQL::db_delete('inventorymanage', 'inventory', $expression);
        header("Location: {$inventoryPageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}

if(!empty($_SESSION['login_user']['user_id']) && empty($_GET['data']))
{
    try
    {
        $inventoryId = $_GET['data'];
        $user_id = $_SESSION['login_user']['user_id'];
        $expression = "user_id = '{$user_id}'";
        SQL::db_delete('inventorymanage', 'inventory', $expression);
        header("Location: {$inventoryPageUrl}");
    exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
