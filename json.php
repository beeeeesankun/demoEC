<?php
require_once './functions/dbConnect.php';

mb_language('uni');
mb_internal_encoding('utf-8'); //内部文字コードを変更
mb_http_input('auto');
mb_http_output('utf-8');

$dbh = dbc();

$sth = $dbh->prepare('SELECT * FROM products_table');
$sth->execute();

$products = [];

while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $products[]=[
    'id'=>$row['id'],
    'name'=>$row['name'],
    'src'=>$row['pass'],
    'gender'=>$row['gender'],
    'itemCategory'=>$row['category'],
    'price'=>$row['price'],
    'quantity'=>$row['stock'],
    ];
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($products);
