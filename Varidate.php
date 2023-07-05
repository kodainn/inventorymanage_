<?php
require_once __DIR__ . '/SQL.php';

class Varidate
{
    public static function IsMax(string $checkField, array &$errMsgs, int $maxnumCharacter, string $word)
    {
        $rtn = false;
        if(!empty($checkField) && (mb_strlen($checkField) > $maxnumCharacter))
        {
            $rtn = true;
            array_push($errMsgs, "{$word}が長すぎます。");
        }
        return $rtn;
    }

    public static function IsPasswordRule(string $checkPassword, array &$errMsgs)
    {
        $rtn = false;
        if(!empty($checkPassword) && !preg_match('/^[a-zA-Z0-9]{8,100}$/', $checkPassword))
        {
            $rtn = true;
            array_push($errMsgs, 'パスワードは８文字以上１００文字以下の英数字です。');
        }
        return $rtn;
    }

    public static function IsPasswordMatch(string $checkPassword, $checkRepassword, array &$errMsgs)
    {
        $rtn = false;
        if(!empty($checkPassword) && !empty($checkRepassword) && ($checkPassword !== $checkRepassword))
        {
            $rtn = true;
            array_push($errMsgs, 'パスワードと再確認用パスワードが一致しません。');
        }
        return $rtn;
    }

    public static function IsPositivenumber(string $checkField, array &$errMsgs)
    {
        $rtn = false;
        if(!empty($checkField) && ($checkField < 0))
        {
            $rtn = true;
            array_push($errMsgs, "そのような不正な値は使えません。");
        }
        return $rtn;
    }

    public static function IsRequired(string $checkField, array &$errMsgs, string $word)
    {
        $rtn = false;
        if(empty($checkField))
        {
            $rtn = true;
            array_push($errMsgs, "{$word}は必須です。");
        }
        return $rtn;
    }

    public static function IsUsernameRule(string $checkUsername, array &$errMsgs)
    {
        $rtn = false;
        if(!empty($checkUsername) && !preg_match('/^[a-zA-Z0-9]{6,20}$/', $checkUsername))
        {
            array_push($errMsgs, 'ユーザー名は６文字以上２０文字以下の英数字です。');
            $rtn = true;
        }
        return $rtn;
    }

    public static function IsUserUnique(string $checkUsername, array &$errMsgs)
    {
        $rtn = false;
        if(!empty($checkUsername))
        {
            try
            {
                $expression = "username = '{$checkUsername}'";
                $dbUsername = SQL::db_fetchAll('inventorymanage', 'userdata', $expression);
                if(!empty($dbUsername))
                {
                    $rtn = true;
                    array_push($errMsgs, 'そのユーザー名はすでに使われています。');
                }
            } catch(PDOException $e)
            {
                echo 'データベースエラー' . $e->getMessage();
            }
        }
        return $rtn;
    }
}