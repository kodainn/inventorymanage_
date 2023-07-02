<?php
session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/inventory.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/javascript.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php if (!empty($_SESSION['login_user']['userid'])) { ?>
        <div class="container">
            <div class="inventory-processing d-flex justify-content-center">
                <div class="inventory-search">
                    <form class="d-flex" action="<?=$inventoryPageUrl?>" id="search-form">
                        <div class="search-box">
                            <input class="form-control" type="text" placeholder="検索ワードを入力して" aria-label="Search" id="search-box">
                        </div>
                        <div class="search-button">
                            <button type="submit" class="btn btn-outline-info">検索</button>
                        </div>
                    </form>
                </div>
                <div class="create-button">
                    <a href="<?=$inventoryCreatePageUrl?>"><button class="btn btn-primary">食材追加</button></a>
                </div>
                <div class="delete-button">
                    <button class="btn btn-danger">全て削除</button>
                </div>
            </div>

            <div class="inventory-list" style="margin-bottom: 200px;">
                
                <table class="table table-hover" id="inventory-table">
                    <thead>
                        <tr>
                            <th scope="col">材料名</th>
                            <th scope="col">種類</th>
                            <th scope="col">数量(パック単位)</th>
                            <th scope="col">期限</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventoryData as $v) { ?>
                            <tr class="<?=Func::deadlineCheck($v['deadline'])?>">
                                <td><?= h($v['ingredientname']) ?></td>
                                <td><?= h($v['category']) ?></td>
                                <td><?= h($v['amount']) ?></td>
                                <td><?= h($v['deadline']) ?></td>
                                <td><a href="<?= $inventoryUpdatePageUrl ?>?ingredientname=<?= urlencode($v['ingredientname']) ?>&amount=<?= $v['amount'] ?>&deadline=<?= $v['deadline'] ?>&data=<?= $v['inventory_id'] ?>" class="update">更新</a></td>
                                <td><a href="<?= $inventoryDeleteUrl ?>?data=<?= $v['inventory_id'] ?>" class="delete">削除</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>
</html>