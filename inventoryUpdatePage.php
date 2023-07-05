<?php
session_start();
require_once __DIR__ . '/inventoryUpdate.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/h.php';
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
                <div class="inventory-create">
                    <form action="<?= $inventoryUpdateUrl ?>" method="post">
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
                        <input type="hidden" name="data" value="<?= $inventoryId ?>">
                        <div class="mb-3">
                            <label for="ingredientName" class="form-label">食材名</label>
                            <p style="font-size: 27px;"><?= h($ingredientname) ?></p>
                            <input type="hidden" name="ingredientname" value="<?= $ingredientname ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">期限(必須)</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="<?= h($deadline) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">数量(必須)</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?= h($amount) ?>">
                        </div>
                        <button class="w-25 btn btn-primary" type="submit" name="inventory_update">編集確定</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>