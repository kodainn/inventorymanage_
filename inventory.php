<?php
require_once __DIR__ . '/SQL.php';

if (!empty($_SESSION['login_user']['username']))
{
    $username = $_SESSION['login_user']['username'];
    $expression = "username = '{$username}' order by category, deadline";
    $inventoryData = SQL::db_fetch('inventorymanage', 'inventory', $expression);
}

function deadlineCheck($date)
{
    $rtn = '';
    $safetyline = date("Y-m-d", strtotime(date('') . "+7 days"));
    $warningline = date("Y-m-d", strtotime(date('') . "+3 days"));
    $deadline = date("Y-m-d", strtotime(date('') . "-1 days"));
    if($date > $safetyline)
    {
        $rtn = 'table-primary';
    }else if($date > $warningline)
    {
        $rtn = 'table-success';
    }else if($date > $deadline)
    {
        $rtn = 'table-danger';
    }else
    {
        $rtn = 'table-secondary';
    }
    return $rtn;
}