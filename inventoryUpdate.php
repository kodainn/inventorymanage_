<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';

if(!empty($_GET))
{
    $inventoryId = $_GET['data'];
    $ingredientname = $_GET['ingredientname'];
    $amount = $_GET['amount'];
    $deadline = $_GET['deadline'];
}


if(!empty($_SESSION['login_user']['userid']) && isset($_POST['inventory_update']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['deadline'], $errMsgs, '期限');
        $varidate[] = Varidate::IsRequired($_POST['amount'], $errMsgs, '数量');
        $varidate[] = Varidate::IsPositivenumber($_POST['amount'], $errMsgs);
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            $query = http_build_query([
                'ingredientname' => $_POST['ingredientname'],
                'amount' => $_POST['amount'],
                'deadline' => $_POST['deadline'],
                'data' => $_POST['data']
            ]);
            header("Location: {$inventoryUpdatePageUrl}?{$query}");
            exit;
        }

        $userid = $_SESSION['login_user']['userid'];
        $inventoryId = $_POST['data'];
        $inventory['ingredientname'] = $_POST['ingredientname'];
        $inventory['deadline'] = $_POST['deadline'];
        $inventory['amount'] = $_POST['amount'];
        $expression = "inventory_id = {$inventoryId} and userid = '{$userid}'";

        SQL::db_update('inventorymanage', 'inventory', $inventory, $expression);
        header("Location: {$inventoryPageUrl}");
        exit;
    } catch (PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}