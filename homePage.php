<?php
session_start();
require_once __DIR__.'/init.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require_once __DIR__.'/header.php'; ?>
    <main>
        <img src="images/food.jpg" class="img-fluid background-img" alt="背景画像">
        <h2 class="home-content-title">冷蔵庫管理アプリケーション(仮)</h2>
        <p class="home-content-text">
            テキストテキストテキストテキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
    </main>
    <?php require_once __DIR__.'/footer.php'; ?>
    </div>
</body>
</html>