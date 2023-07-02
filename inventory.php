<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

if (!empty($_SESSION['login_user']['username']))
{
    $username = $_SESSION['login_user']['username'];
    $expression = "username = '{$username}' order by category, deadline";
    $inventoryData = SQL::db_fetchAll('inventorymanage', 'inventory', $expression);
}
