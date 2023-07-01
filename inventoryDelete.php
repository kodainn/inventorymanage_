<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_SESSION['login_user']['username']) && !empty($_GET['data']))
{
    $inventoryId = $_GET['data'];
    $username = $_SESSION['login_user']['username'];
    $expression = "inventory_id = {$inventoryId} and username = '{$username}'";
    SQL::db_delete('inventorymanage', 'inventory', $expression);
    header("Location: {$inventoryPageUrl}");
    exit;
}
