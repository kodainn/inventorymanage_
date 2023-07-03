<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_SESSION['login_user']['userid']) && !empty($_GET['data']))
{
    try
    {
        $inventoryId = $_GET['data'];
        $userid = $_SESSION['login_user']['userid'];
        $expression = "inventory_id = {$inventoryId} and userid = '{$userid}'";
        SQL::db_delete('inventorymanage', 'inventory', $expression);
        header("Location: {$inventoryPageUrl}");
    exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}

if(!empty($_SESSION['login_user']['userid']) && empty($_GET['data']))
{
    try
    {
        $inventoryId = $_GET['data'];
        $userid = $_SESSION['login_user']['userid'];
        $expression = "userid = '{$userid}'";
        SQL::db_delete('inventorymanage', 'inventory', $expression);
        header("Location: {$inventoryPageUrl}");
    exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}
