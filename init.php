<?php
require_once __DIR__.'/Func.php';

if(!empty($_COOKIE['inventorymanage']) && empty($_SESSION['login_user']['user_id']))
{
    $seriCookieData = $_COOKIE['inventorymanage'];
    $cookieData = json_decode($seriCookieData, true);
    Func::login($cookieData['username'], $cookieData['password'], false);
}