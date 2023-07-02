<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/SQL.php';

if(!empty($_SESSION['login_user']['username']))
{
    $loginUser = $_SESSION['login_user']['username'];
    $expression = "username = '{$loginUser}'";
    $userdata = SQL::db_fetch('inventorymanage', 'userdata', $expression);
}