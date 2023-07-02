<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/Varidate.php';


if(isset($_POST['inventory_create']))
{
    try
    {
        $errMsgs = [];
        $varidate[] = Varidate::IsRequired($_POST['ingredientname'], $errMsgs, '食材名');
        $varidate[] = Varidate::IsRequired($_POST['category'], $errMsgs, '種類');
        $varidate[] = Varidate::IsRequired($_POST['deadline'], $errMsgs, '期限');
        $varidate[] = Varidate::IsRequired($_POST['amount'], $errMsgs, '数量');
        $varidate[] = Varidate::IsMax($_POST['ingredientname'], $errMsgs, 15, '食材名');
        $varidate[] = Varidate::IsPositivenumber($_POST['amount'], $errMsgs);
        if(array_search(true, $varidate) !== false)
        {
            $_SESSION['formVaridate'] = $errMsgs;
            header("Location: {$inventoryCreatePageUrl}");
            exit;
        }

        $inventory['ingredientname'] = $_POST['ingredientname'];
        $inventory['userid'] = $_SESSION['login_user']['userid'];
        $inventory['category'] = $_POST['category'];
        $inventory['deadline'] = $_POST['deadline'];
        $inventory['amount'] = $_POST['amount'];
        SQL::db_insert('inventorymanage', 'inventory', $inventory);
        header("Location: {$inventoryPageUrl}");
        exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー:' . $e->getMessage();
    }
}