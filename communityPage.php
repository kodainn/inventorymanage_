<?php
session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/community.php';
require_once __DIR__ . '/communityJS.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コミュニティ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php if (!empty($_SESSION['login_user']['user_id'])) { ?>
        <div class="container">
            <div class="processing d-flex justify-content-center">
                <div class="search">
                    <form class="d-flex" action="<?= $communityPageUrl ?>" id="search-form">
                        <div class="search-box d-flex">
                            <input class="form-control search-text" type="text" aria-label="Search" id="search-text">
                            <select class="form-select form-select-sm search-pulldown" aria-label=".form-select-sm example" id="search-pulldown">
                                <option selected value="">-------------</option>
                                <option value="雑談">雑談</option>
                                <option value="情報交換">情報交換</option>
                            </select>
                        </div>
                        <div class="search-button">
                            <button type="submit" class="btn btn-outline-info">検索</button>
                        </div>
                    </form>
                </div>
                <div class="create-button">
                    <a href="<?= $communityCreatePageUrl ?>"><button class="btn btn-primary">コミュニティ作成</button></a>
                </div>
            </div>
            <div id="community-list">
                <?php foreach ($communitydata as $v) { ?>
                    <div class="card community-card" id="community-card" style="width: 70%;">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-4">
                                <img src="<?= !empty($v['imagepath']) ? $v['imagepath'] : 'community_icon\no_image.jpg' ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title"><?= !empty($v['title']) ? h($v['title']) : '' ?></h2>
                                    <h6 class="card-genre"><?= !empty($v['genre']) ? h($v['genre']) : '' ?></h6>
                                    <p class="card-text"><?= !empty($v['description']) ? h($v['description']) : '' ?></p>
                                    <a href="<?= $communityDetailPageUrl ?>?data=<?= $v['community_id'] ?>">コミュニティに入る</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>