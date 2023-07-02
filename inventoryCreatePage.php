<?php
session_start();
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/inventoryCreate.php';
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
    <?php if (!empty($_SESSION['login_user']['userid'])) { ?>
    <div class="container">
        <div class="inventory-create">
            <form action="<?=$inventoryCreateUrl?>" method="post">
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
                    <label for="ingredientname" class="form-label">食材名</label>
                    <input type="text" class="form-control" id="ingredientname" name="ingredientname" placeholder="例:たまご">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">種類</label>
                    <select class="form-select form-select-sm" id="category" name="category" aria-label=".form-select-sm example">
                        <option selected value="">-------------</option>
                        <option value="肉類">肉類</option>
                        <option value="野菜">野菜</option>
                        <option value="魚介類">魚介類</option>
                        <option value="卵・乳酸品">卵・乳酸品</option>
                        <option value="調味料">調味料</option>
                        <option value="その他">その他</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label">期限</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">数量</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="1">
                </div>
                <button class="w-25 btn btn-primary" type="submit" name="inventory_create">作成</button>
            </form>
        </div>
    </div>
    <?php } else {?>
        <div class="recommend-message">ログインしてください。</div>
    <?php } ?>
</body>

</html>