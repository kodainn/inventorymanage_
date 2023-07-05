<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/SQL.php';

if(!empty($_SESSION['login_user']['user_id']))
{
    try
    {
        $loginUser = $_SESSION['login_user']['user_id'];
        $expression = "user_id = '{$loginUser}'";
        $userdata = SQL::db_fetch('inventorymanage', 'userdata', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}