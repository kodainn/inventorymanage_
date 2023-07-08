<?php
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';

try
{
    if(!empty($_SESSION['login_user']['user_id']))
    {
        $user_id = $_SESSION['login_user']['user_id'];
        $loginUserCondtion = "1 order by user_id = '{$user_id}' desc, create_date desc";
        $communitydata = SQL::db_fetchAll('inventorymanage', 'community', $loginUserCondtion);
    } else
    {
        $noLoginUserCondtion = "1 order by create_date desc";
        $communitydata = SQL::db_fetchAll('inventorymanage', 'community', $noLoginUserCondtion);
    }
}
catch (PDOException $e) {
    echo 'データベースエラー' . $e->getMessage();
}
