<?php
session_start();
require_once __DIR__ . '/Func.php';
require_once __DIR__ . '/url.php';

Func::logout();
header("Location: {$loginPageUrl}");
exit;
