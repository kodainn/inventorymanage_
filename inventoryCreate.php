<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';


if(isset($_POST['inventory_create']))
{
    $inventory['username'] = $_SESSION['login_user']['username'];
    $inventory['ingredientname'] = $_POST['ingredientname'];
    $inventory['category'] = $_POST['category'];
    $inventory['deadline'] = $_POST['deadline'];
    $inventory['amount'] = $_POST['amount'];


    if(empty($inventory['username']) || empty($inventory['category']) || empty($inventory['deadline']) || empty($inventory['amount']))
    {
        $errMsgs = [];
        array_push($errMsgs, 'フォームに空欄があります。');
        if(mb_strlen($inventory['ingredientname']) > 15)
        {
            array_push($errMsgs, '食材名が長すぎます。');
        }

        $_SESSION['formVaridate'] = $errMsgs;
        header("Location: {$inventoryCreatePageUrl}");
        exit;
    }

    SQL::db_insert('inventorymanage', 'inventory', $inventory);
    header("Location: {$inventoryPageUrl}");
    exit;
}