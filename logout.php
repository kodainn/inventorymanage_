<?php
session_start();
require_once __DIR__ . '/Func.php';
if(isset($_POST['logout']))
{
    Func::logout();
}