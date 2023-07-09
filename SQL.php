<?php

class SQL
{
    private static function db_connect(string $dbname)
    {
        $dsn = "mysql:host=localhost;dbname={$dbname}";
        $user = 'root';
        $password = '';
        return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public static function db_aliasFetch(string $dbname, string $tblname, array $alias, string $expression = "1", string $join = "")
    {
        $rtn = '';
        $pdo = SQL::db_connect($dbname);
        $columns = "";
        $lastAlias = end($alias);
        foreach($alias as $a)
        {
            if($lastAlias === $a)
            {
                $columns .= "{$a}";
                continue;
            }
            $columns .= "{$a},";
        }

        $fetchSql = "select {$columns} from $tblname {$join} where $expression";
        $stmt = $pdo->prepare($fetchSql);
        $stmt->execute();
        $rtn = $stmt->fetch();
        return $rtn;
    }

    public static function db_aliasFetchAll(string $dbname, string $tblname, array $alias, string $expression = "1", string $join = "")
    {
        $rtn = '';
        $pdo = SQL::db_connect($dbname);
        $columns = "";
        $lastAlias = end($alias);
        foreach($alias as $a)
        {
            if($lastAlias === $a)
            {
                $columns .= "{$a}";
                continue;
            }
            $columns .= "{$a},";
        }

        $fetchSql = "select {$columns} from $tblname {$join} where $expression";
        $stmt = $pdo->prepare($fetchSql);
        $stmt->execute();
        $rtn = $stmt->fetchAll();
        return $rtn;
    }

    public static function db_fetch(string $dbname, string $tblname, string $expression = "1", string $join = "")
    {
        $rtn = '';
        $pdo = SQL::db_connect($dbname);
        $fetchSql = "select * from $tblname {$join} where $expression";
        $stmt = $pdo->prepare($fetchSql);
        $stmt->execute();
        $rtn = $stmt->fetch();
        return $rtn;
    }

    public static function db_fetchAll(string $dbname, string $tblname, string $expression = "1", string $join = "")
    {
        $rtn = '';
        $pdo = SQL::db_connect($dbname);
        $fetchSql = "select * from {$tblname} {$join} where $expression";
        $stmt = $pdo->prepare($fetchSql);
        $stmt->execute();
        $rtn = $stmt->fetchAll();
        return $rtn;
    }

    public static function db_getcount(string $dbname, string $tblname, string $expression = "1", $join = "")
    {
        $rtn = 0;
        $pdo = SQL::db_connect($dbname);
        $getcountSql = "select count(*) from {$tblname} {$join} where {$expression}";
        $stmt = $pdo->prepare($getcountSql);
        $stmt->execute();
        $rtnAlias = $stmt->fetch();
        $rtn = $rtnAlias[0];
        return $rtn;
    }

    public static function db_insert(string $dbname, string $tblname, array $arr)
    {
        $pdo = SQL::db_connect($dbname);
        $insertKey = "";
        $insertValue = "";
        $insertLastKey = end(array_keys($arr));
        $insertLastValue = end($arr);

        foreach ($arr as $key => $value) {
            if ($key === $insertLastKey && $value === $insertLastValue) {
                $insertKey .= $key;
                $insertValue .= "'{$value}'";
                continue;
            }

            $insertKey .= "{$key}, ";
            $insertValue .= "'{$value}', ";
        }

        $insertSql = "insert into {$tblname}({$insertKey}) values({$insertValue})";
        $stmt = $pdo->prepare($insertSql);
        $stmt->execute();
    }

    public static function db_update(string $dbname, string $tblname, array $arr, string $expression = "1")
    {
        $pdo = SQL::db_connect($dbname);
        $setColumn = "";
        $updateLastKey = end(array_keys($arr));
        $updateLastValue = end($arr);

        foreach ($arr as $key => $value) {
            if ($key === $updateLastKey && $value === $updateLastValue) {
                $setColumn .= "{$key} = '{$value}'";
                continue;
            }

            $setColumn .= " {$key} = '{$value}',";
        }

        $updateSql = "update {$tblname} set {$setColumn} where {$expression}";
        $stmt = $pdo->prepare($updateSql);
        $stmt->execute();
    }

    public static function db_delete(string $dbname, string $tblname, string $expression = "1")
    {
        $pdo = SQL::db_connect($dbname);
        $deleteSql = "delete from {$tblname} where {$expression}";
        $stmt = $pdo->prepare($deleteSql);
        $stmt->execute();
    }
}
