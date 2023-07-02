<?php
session_start();
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/url.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-center">
    <div class="container">
        <main class="form-signin">
            <form action="<?=$loginUrl?>" method="post">
                <?php if (!empty($_SESSION['formVaridate'])) { ?>
                    <div class="alert alert-danger" style="text-align: left;" role="alert">
                        <ul>
                            <li><?= $_SESSION['formVaridate'] ?></li>
                        </ul>
                    </div>
                    <?php unset($_SESSION['formVaridate']); ?>
                <?php } ?>

                <h1 class="h3 mb-3 fw-normal">ログイン</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name1234">
                    <label for="floatingInput">ユーザー名</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">パスワード</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me" name="loginContinue">ログインしたままにする
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">ログイン</button>
            </form>
        </main>
    </div>
</body>

</html>