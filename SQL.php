<?php
function db_connect(string $dbname)
{
    $dsn = "mysql:host=localhost;dbname={$dbname}";
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function db_fetch(string $dbname, string $tblname, int $limit = 0, string $expression = "1")
{
    $rtn = '';
    $pdo = db_connect($dbname);
    $fetchSql = "select * from $tblname where $expression";
    $stmt = $pdo->prepare($fetchSql);
    $stmt->execute();
    $rtn = $stmt->fetchAll();
    if($limit > 0) {
        $tmp_result = $rtn;
        $rtn = [];
        for($i = 0; $i < $limit; $i++) {
            $rtn[] = $tmp_result[$i];
        }
    }
    return $rtn;
}

function db_insert(string $dbname, string $tblname, array $arr)
{
    $insertSql = "";
    $pdo = db_connect($dbname);
    $insertKey = "";
    $insertValue = "";
    $lastKey = end(array_keys($arr));
    $lastValue = end($arr);
    foreach($arr as $key => $value) {
        if ($key === $lastKey && $value === $lastValue) {
            $insertKey .= $key;
            $insertValue .= "'{$value}'";
            continue;
        }
        $insertKey .= "{$key}, ";
        $insertValue .= "'{$value}', ";
    }
    $insertSql .= "insert into {$tblname}({$insertKey}) values({$insertValue})";
    $stmt = $pdo->prepare($insertSql);
    $stmt->execute();
}
