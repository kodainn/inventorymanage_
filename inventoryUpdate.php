<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';

if(!empty($_GET))
{
    $inventoryId = $_GET['data'];
    $ingredientname = $_GET['ingredientname'];
    $amount = $_GET['amount'];
    $deadline = $_GET['deadline'];
}


if(!empty($_SESSION['login_user']['username']) && isset($_POST['inventory_update']))
{
    $username = $_SESSION['login_user']['username'];
    $inventoryId = $_POST['data'];
    $inventory['ingredientname'] = $_POST['ingredientname'];
    $inventory['amount'] = $_POST['amount'];
    $inventory['deadline'] = $_POST['deadline'];
    $expression = "inventory_id = {$inventoryId} and username = '{$username}'";

    SQL::db_update('inventorymanage', 'inventory', $inventory, $expression);
    header("Location: {$inventoryPageUrl}");
    exit;
}