<?php
session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/recipe.php';
require_once __DIR__ . '/header.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レシピ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <?php if(!empty($recipeData)) { ?>
        <?php foreach($recipeData['result'] as $v) { ?>
        <div class="card">
            <h5 class="card-header">ランキング<?=h($v['rank'])?>位</h5>
            <div class="card-body">
                <h5 class="card-title"><?=h($v['recipeTitle'])?></h5>
                <div class="d-flex">
                    <p class="card-image"><img src="<?=h($v['foodImageUrl'])?>" width="300" height="225"></p>
                    <div class="card-text">
                        <p><?=h($v['recipeDescription'])?></p>
                        <ul>
                        <?php foreach($v['recipeMaterial'] as $material) { ?>
                            <li><?=h($material)?></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                <a href="<?=h($v['recipeUrl'])?>" target="_blank">作り方はこちらへ</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</body>

</html>