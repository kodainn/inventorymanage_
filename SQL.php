<?php
function db_connect(string $dbname) {
    $dsn = "mysql:host=localhost;dbname={$dbname};charset=utf-8";
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
