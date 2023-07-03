<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/SQL.php';

if(!empty($_SESSION['login_user']['userid']))
{
    try
    {
        $loginUser = $_SESSION['login_user']['userid'];
        $expression = "userid = '{$loginUser}'";
        $userdata = SQL::db_fetch('inventorymanage', 'userdata', $expression);
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}