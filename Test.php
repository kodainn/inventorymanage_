<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line風レイアウト</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            padding: 20px;
            background-color: #00b900;
            color: #fff;
            text-align: center;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .chat {
            display: flex;
            align-items: flex-start;
        }

        .chat .message-bubble {
            background-color: #eee;
            padding: 10px 15px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .chat .sender {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .chat .triangle {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            margin-top: 10px;
        }

        .chat.left .triangle {
            border-top: 10px solid #eee;
            margin-right: 5px;
        }

        .chat.right .triangle {
            border-top: 10px solid #eee;
            margin-left: 5px;
        }

        .chat .icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat.left .icon {
            margin-right: 10px;
        }

        .chat.right .icon {
            margin-left: 10px;
        }

        .message-input {
            flex: 1;
        }

        .send-button {
            margin-left: 10px;
        }

        .chat-box {
            display: flex;
            align-items: flex-start;
        }

        .message-area {
            flex: 1;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Line風レイアウト</h1>
        </div>
        <div class="chat-container">
            <div class="chat left">
                <img class="icon" src="icon/user1.jpg" alt="アイコン">
                <div class="message-area">
                    <div class="message-bubble">
                        <div class="sender">John</div>
                        <div class="message">Hello, how are you?</div>
                    </div>
                    <div class="triangle"></div>
                </div>
            </div>
            <div class="chat right">
                <div class="message-area">
                    <div class="message-bubble">
                        <div class="sender">Jane</div>
                        <div class="message">I'm good, thanks! How about you?</div>
                    </div>
                    <div class="triangle"></div>
                </div>
                <img class="icon" src="icon/user2.jpg" alt="アイコン">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <input class="form-control message-input" type="text" placeholder="メッセージを入力">
            <button class="btn btn-primary send-button">送信</button>
        </div>
    </div>
    <hr>

</body>

</html>