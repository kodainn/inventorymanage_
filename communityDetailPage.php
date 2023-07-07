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
    <?php if (!empty($_SESSION['login_user']['user_id'])) { ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <!-- チャットメッセージの表示領域 -->
                    <div class="chat-messages">
                        <div class="message d-flex" style="margin-top: 30px">
                            <img src="user_icon/botti1.jpg" alt="Avatar" class="rounded-circle" width="50" height="50">
                            <div class="message-content">
                                <div class="message-header d-flex">
                                    <h6 class="message-sender" style="margin: 5px;">Jane Smith</h6>
                                    <h6 class="message-time" style="margin: 5px;">10:05 AM</h6>
                                </div>
                                <div class="message-text" style="margin: 5px;">
                                    I'm good, thank you!dsfffsdfaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaさあああああああああああああああああああああああああああああああああああああああああああああ
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="message-submit">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="input-group">
                                    <textarea class="form-control message-textarea" placeholder="メッセージを入力してください" rows="3" style="height: 150px"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <button class="btn btn-primary btn-block message-button" type="button">メッセージ送信</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  } else { ?>
        <div class="recommend-message">ログインしてください。</div>
    <?php  } ?>
</body>

</html>