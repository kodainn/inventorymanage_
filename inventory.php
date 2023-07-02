<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

if (!empty($_SESSION['login_user']['userid']))
{
    $userid = $_SESSION['login_user']['userid'];
    $expression = "userid = '{$userid}' order by category, deadline";
    $inventoryData = SQL::db_fetchAll('inventorymanage', 'inventory', $expression);
}
