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
    <?php require_once __DIR__.'/header.php' ?>
    <div class="container">
        <div class="inventory-create">
            <form>
                <div class="mb-3">
                    <label for="ingredientName" class="form-label">食材名</label>
                    <input type="text" class="form-control" id="ingredientName" name="ingredientName" placeholder="例:たまご">
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">期限</label>
                    <input type="date" class="form-control" id="deadline" name="deadline">
                </div>
                <div class="mb-3">
                    <label for="ingredientCount" class="form-label">数量</label>
                    <input type="number" class="form-control" id="ingredientCount" name="ingredientCount" value="1">
                </div>
                <button class="w-25 btn btn-primary" type="submit">編集確定</button>
            </form>
        </div>
    </div>
</body>
</html>