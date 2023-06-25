<?php
session_start();
require_once __DIR__ . '/header.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>設定</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php if(true) { ?>
    <div class="container">
        <div class="form-setting">
            <form>
                <div class="mb-3">
                    <label for="userName" class="form-label">ユーザー名</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="#">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="#">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">パスワード(再確認)</label>
                    <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="#">
                </div>
                <button class="w-25 btn btn-primary" type="submit">更新</button>
            </form>
        </div>
    </div>
    <?php } ?>
    <?php if(false) { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>