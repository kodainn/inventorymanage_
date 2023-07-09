<?php
session_start();
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/communityUpdate.php';
require_once __DIR__ . '/pictureJS.php';
require_once __DIR__ . '/communityDeleteJS.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>在庫追加</title>
</head>

<body>
    <?php if (!empty($_SESSION['login_user']['user_id'])) { ?>
        <div class="container">
            <div class="form-wrap">
                <div class="community-create">
                    <form action="<?= $communityUpdateUrl ?>" method="post" enctype="multipart/form-data">
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
                            <label for="formFileSm" class="form-label"><img src="<?= !empty($communitydata['imagepath']) ? $communitydata['imagepath'] : 'community_icon/no_image.jpg' ?>" id="preview" class="img-thumbnail" width="100" height="100" alt="アイコン"></label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" onchange="previewImage(event)">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">タイトル(必須)</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?=$communitydata['title']?>" placeholder="例:情報交換コミュニティ">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">ジャンル(必須)</label>
                            <select class="form-select form-select-sm" id="genre" name="genre" aria-label=".form-select-sm example">
                                <option selected value="">-------------</option>
                                <option value="雑談" <?= $communitydata['genre'] === '雑談' ? 'selected' : '' ?>>雑談</option>
                                <option value="情報交換" <?= $communitydata['genre'] === '情報交換' ? 'selected' : '' ?>>情報交換</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">説明</label>
                            <textarea class="form-control" id="description" name="description" placeholder="例:情報交換のためのコミュニティです。" style="height: 200px"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="w-25 btn btn-primary" type="submit" name="community-update">更新</button>
                            <button class="w-25 btn btn-danger" style="margin-left: 50px;" type="button" id="community-delete">削除</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>
</html>