<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/Message.php';
require_once '../classes/Product.php';

$mes_h2 = 'Success';
$err_mes_h2 = 'Failed';
$mes_a = '<a href="../view/products_lists.php">戻る</a>';
$err_mes_a = '<a href="../view/products_lists.php">戻る</a>';

// $token = filter_input(INPUT_POST, 'csrf_token');
// // トークンが空||不一致で処理を中止
// if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
//     exit('不正なリクエストです。');
// }
// unset($_SESSION['csrf_token']);

$err_mes = null;
$id = $_SESSION['thisId'];
$pass = $_SESSION['thisPass'];
$removeImg = basename($pass);

if (isset($id) && isset($removeImg)) {
    $result = Product::removeProduct($id);
    if ($result) {
        $mes_p = '・商品の削除が完了しました。<br>';
        unlink('../uploads/products-img/' . $removeImg) ? $mes_p .= '既存の画像は削除されました。':$err_mes .= '既存の画像の削除に失敗しました。';
    } else {
        $err_mes .= '・商品の削除に失敗しました。<br>管理者へお問い合わせください';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $titleTxt = !isset($err_mes) ? 'Success' : 'Failed';
    echo '<title>' . $titleTxt . '</title>';
   ?>
</head>

<body>

  <?php if (isset($err_mes)):?>
  <?php Message::putMes($err_mes_h2, $err_mes, $err_mes_a)?>
  <?php else:?>
  <?php Message::putMes($mes_h2, $mes_p, $mes_a)?>
  <?php endif ?>
</body>

</html>