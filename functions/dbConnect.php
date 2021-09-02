<?php
require_once dirname(__FILE__) . '/../env.php';
ini_set('display_errors', true);
function dbc()
{
    $host = DB_HOST;
    $user = DB_USER;
    $db = DB_NAME;
    $pass = DB_PASS;

    $dns = "mysql:host=$host;dbname=$db;charset=utf8mb4;";

    try {
        $pdo = new PDO($dns, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
        echo 'success';
        return $pdo;
    } catch (PDOException $e) {
        echo'接続失敗です！'.$e->getMessage();
        exit();
    }
}
