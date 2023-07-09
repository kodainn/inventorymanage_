<?php
isset($_SESSION) ? '' : session_start();
require_once __DIR__ . '/SQL.php';
require_once __DIR__ . '/Func.php';
require_once __DIR__ . '/url.php';


$community_id = "";
if(!empty($_SESSION['login_user']['community_id']) && !empty($_GET['data']))
{
    unset($_SESSION['login_user']['community_id']);
}

if(!empty($_SESSION['login_user']['user_id']))
{
    if(!empty($_GET['data']))
    {
        $_SESSION['login_user']['community_id'] = $_GET['data'];
        $community_id = $_SESSION['login_user']['community_id'];
    }
    if(isset($_POST['message-create']))
    {
        $community_id = $_SESSION['login_user']['community_id'];
    }
    
} else
{
    $community_id = $_GET['data'];
}

$whereCondition = "community_id = '{$community_id}'";
$getcountCommunity = SQL::db_getcount('inventorymanage', 'community', $whereCondition);
$existsCommunity = false;
if($getcountCommunity > 0)
{
    $existsCommunity = true;
}

if(isset($_POST['message-create']) && $existsCommunity && $_SESSION['login_user']['user_id'])
{
    try
    {
        $message['community_id'] = $community_id;
        $message['user_id'] = $_SESSION['login_user']['user_id'];
        $message['sentence'] = $_POST['sentence'];
        SQL::db_insert('inventorymanage', 'message', $message);
        header("Location: {$communityDetailPageUrl}?data={$community_id}");
        exit;
    } catch(PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}


if($existsCommunity)
{
    try
    {
        $messageColumns = ['nickname', 'sentence', 'imagepath', 'create_date'];
        $messageCondition = "community_id = {$community_id} order by create_date desc";
        $messageJoin = "msg inner join userdata ud on msg.user_id = ud.user_id";
        $messagedata = SQL::db_aliasFetchAll('inventorymanage', 'message', $messageColumns, $messageCondition, $messageJoin);
    } catch (PDOException $e)
    {
        echo 'データベースエラー' . $e->getMessage();
    }
}