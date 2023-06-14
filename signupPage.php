<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインイン</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="text-center">
    <?php require_once __DIR__.'/header.php'; ?>
    <div class="container">
        <main class="form-signup">
            <form>
                <h1 class="h3 mb-3 fw-normal">サインアップ</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name1234">
                    <label for="floatingInput">UserName</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me">ログインしたままにする
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">登録</button>
            </form>
        </main>
    </div>
</body>
</html>