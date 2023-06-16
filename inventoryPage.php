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
    <?php require_once __DIR__.'/header.php'; ?>
    <div class="container">
        <div class="inventory-processing d-flex justify-content-center">
            <div class="inventory-search">
                <form class="d-flex" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="search-box">
                        <input class="form-control" type="text" placeholder="食材を入力して" aria-label="Search">
                    </div>
                    <div class="search-button">
                        <button type="submit" class="btn btn-outline-info">検索</button>
                    </div>
                </form>
            </div>
            <div class="create-button">
                <a href="#"><button class="btn btn-primary">食材追加</button></a>
            </div>
        </div>
        <div class="inventory-list">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">材料名</th>
                    <th scope="col">期限</th>
                    <th scope="col">数量(パック単位)</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>リンゴ</td>
                    <td>2023-6-30</td>
                    <td>3</td>
                    <td><a href="#">編集</a></td>
                    <td><a href="#">削除</a></td>
                </tr>
                <tr>
                    <td>お肉</td>
                    <td>2023-6-17</td>
                    <td>1</td>
                    <td><a href="#">編集</a></td>
                    <td><a href="#">削除</a></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>