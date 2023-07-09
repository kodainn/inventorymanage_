<?php
session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/profileUpdate.php';
require_once __DIR__ . '/pictureJS.php';
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
                <form action="<?=$profileUpdateUrl?>" method="post" enctype="multipart/form-data">
                    <?php if (!empty($_SESSION['formVaridate'])) { ?>
                        <div class="alert alert-danger" style="text-align: left;" role="alert">
                            <ul>
                                <?php foreach ($_SESSION['formVaridate'] as $varidate) { ?>
                                    <li><?= $varidate ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php unset($_SESSION['formVaridate']); ?>
                    <?php } ?>
                    <div class="mb-3">
                        <p>アイコン</p>
                        <label for="formFileSm" class="form-label"><img src="<?= !empty($imagepath) ? $imagepath : (!empty($userdata['imagepath']) ? $userdata['imagepath'] :'user_icon/init_icon.png')?>" id="preview" class="rounded-circle" width="100" height="100" alt="アイコン"></label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" onchange="previewImage(event)">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ユーザー名(必須)</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= !empty($userdata['username']) ? h($userdata['username']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">ニックネーム</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="<?= !empty($userdata['nickname']) ? h($userdata['nickname']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">性別</label>
                        <div class="form-check">
                            <label class="form-check-label" for="other">
                                その他
                            </label>
                            <input class="form-check-input" type="radio" name="gender" id="other" value="その他" <?= $userdata['gender'] === 'その他' ? 'checked' : '' ?>>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="man">
                                男性
                            </label>
                            <input class="form-check-input" type="radio" name="gender" id="man" value="男性" <?= $userdata['gender'] === '男性' ? 'checked' : '' ?>>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="woman">
                                女性
                            </label>
                            <input class="form-check-input" type="radio" name="gender" id="woman" value="女性" <?= $userdata['gender'] === '女性' ? 'checked' : '' ?>>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">生年月日</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= !empty($userdata['birthdate']) ? $userdata['birthdate'] : '' ?>">
                    </div>
                    <button class="w-25 btn btn-primary" type="submit" name="profile-update">更新</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>