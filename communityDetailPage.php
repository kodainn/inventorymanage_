<?php
session_start();
require_once __DIR__ . '/h.php';
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/communityDetail.php';
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
    <div class="container">

        <?php if ($existsCommunity) { ?>
            <?php if (!empty($_SESSION['login_user']['user_id'])) { ?>
                <div class="message-submit">
                    <form id="message-form" action="<?=$communityDetailUrl?>" method="post">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="input-group">
                                    <textarea class="form-control message-textarea" placeholder="メッセージを入力してください" rows="3" name="sentence" style="height: 150px"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <button class="btn btn-primary btn-block message-button" type="submit" name="message-create">メッセージ送信</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <h3 style="margin: 50px;">ログインしたら投稿できます。</h3>
            <?php } ?>
            <div class="row message-area">
                <div class="col-lg-10">
                    <!-- チャットメッセージの表示領域 -->
                    <?php if (!empty($messagedata)) { ?>
                        <div class="chat-messages">
                            <?php foreach ($messagedata as $v) { ?>
                                <hr>
                                <div class="message d-flex" style="margin-top: 30px">
                                    <img src="<?=!empty($v['imagepath']) ? h($v['imagepath']) : 'user_icon/init_icon.png'?>" alt="Avatar" class="rounded-circle" width="50" height="50">
                                    <div class="message-content">
                                        <div class="message-header d-flex">
                                            <h6 class="message-sender" style="margin: 5px;"><?= !empty($v['nickname']) ? h($v['nickname']) : '' ?></h6>
                                            <h6 class="message-time" style="margin: 5px;"><?= !empty($v['create_date']) ? h(date('Y年n月j日 h時i分s秒', strtotime($v['create_date']))) : '' ?></h6>
                                        </div>
                                        <div class="message-text" style="margin: 5px;">
                                            <?= !empty($v['sentence']) ? h($v['sentence']) : '' ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <hr>
                        <p>投稿がありません。</p>
                    <?php } ?>
                </div>
            </div>
        <?php  } else { ?>
            <div class="recommend-message">コミュニティが存在しません。</div>
        <?php  } ?>
    </div>
</body>

</html>