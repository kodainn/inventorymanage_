<?php require_once __DIR__ . '/url.php'; ?>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?=$communityPageUrl?>" class="nav-link px-2 text-white">コミュニティ</a></li>
                <li><a href="<?=$recipePageUrl?>" class="nav-link px-2 text-white">レシピ</a></li>
                <li><a href="<?=$inventoryPageUrl?>" class="nav-link px-2 text-white">在庫</a></li>
                <li><a href="<?=$profilePageUrl?>" class="nav-link px-2 text-white">プロフィール</a></li>
            </ul>

            <?php if (empty($_SESSION['login_user']['user_id'])) { ?>
                <div class="text-end">
                    <a href="<?=$loginPageUrl?>"><button type="button" class="btn btn-outline-light me-2">ログイン</button></a>
                    <a href="<?=$signupPageUrl?>"><button type="button" class="btn btn-warning">サインアップ</button></a>
                </div>
            <?php } else { ?>
                <div class="text-end">
                    <a href="<?=$logoutUrl?>"><button type="button" class="btn btn-outline-light me-2">ログアウト</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
</header>