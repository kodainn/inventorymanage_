<?php
session_start();
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/profile.php';
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
    <?php if (!empty($_SESSION['login_user']['user_id'])) { ?>
        <div class="container">
            <div class="form-wrap">
                <div class="mb-3">
                    <p>アイコン</p>
                    <img src="<?=!empty($userdata['imagepath']) ? $userdata['imagepath'] : 'user_icon\init_icon.png'?>" class="rounded-circle" width="100" height="100" alt="アイコン">
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">ユーザー名</label>
                    <p style="font-size: 27px;"><?= !empty($userdata['username']) ? h($userdata['username']) : '未設定' ?></p>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">ニックネーム</label>
                    <p style="font-size: 27px;"><?= !empty($userdata['nickname']) ? h($userdata['nickname']) : '未設定' ?></p>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">性別</label>
                    <p style="font-size: 27px;"><?= !empty($userdata['gender']) ? h($userdata['gender']) : '未設定' ?></p>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">生年月日</label>
                    <p style="font-size: 27px;"><?= !empty($userdata['birthdate']) ? h($userdata['birthdate']) : '未設定' ?></p>
                </div>
                <a href="<?=$profileUpdatePageUrl?>"><button class="w-25 btn btn-primary">更新ページへ</button></a>
            </div>
        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>