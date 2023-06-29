<?php
session_start();
require_once __DIR__ . '/Func.php';

$loginPageUrl = "http://localhost/----/loginPage.php";
Func::logout();
header("Location: {$loginPageUrl}");