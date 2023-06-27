<?php
session_start();

if (!empty($_POST['session_create']))
{
    $_SESSION['session_test'] = 'session_test';
} elseif (!empty($_POST['delete']))
{
    unset($_SESSION['test']);
    session_destroy();
}

if(!empty($_POST['cookie_create']))
{
    setcookie('cookie_test', 'cookie_test', time() + 60 * 60);
} else
{
    setcookie('cookie_test', '', time() - 60 * 60);
}

?>

<form action="Test.php" method="post">
    <div>
        <input type="submit" name='session_create' value="セッション生成">
        <input type="submit" name="session_delete" value="セッション破棄">
        <?php echo !empty($_SESSION['test']) ? $_SESSION['test'] : 'セッションなし'; ?>
    </div>
    <div>
        <input type="submit" name='cookie_create' value="クッキー生成">
        <input type="submit" name="cookie_delete" value="クッキー破棄">
        <?php echo !empty($_COOKIE['cookie_test']) ? $_COOKIE['cookie_test'] : 'クッキーなし'; ?>
    </div>
</form>