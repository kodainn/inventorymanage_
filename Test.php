<?php
// 二次元配列を定義
$data =
    array(
        'username' => 'John',
        'password' => '1234'
    );

// 二次元配列をJSON形式にシリアライズ
$serializedData = json_encode($data);

// Cookieを設定
setcookie('test', $serializedData, time() + 10);

if (isset($_COOKIE['test'])) {
    $cookieData = json_decode($_COOKIE['test'], true);
    $username = $cookieData['username'];
    $password = $cookieData['password'];
    echo $username.'<br>'; // John
    echo $password;
}
?>