<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/Message.php';
require_once '../classes/Product.php';

$mes_h2 = 'Success';
$err_mes_h2 = 'Failed';
$mes_a = '<a href="../view/products_lists.php">戻る</a>';
$err_mes_a = '<a href="../view/products_lists.php">戻る</a>';

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンが空||不一致で処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエストです。');
}
unset($_SESSION['csrf_token']);

$err_mes = null;
$populate = [];

$product = $_POST['product'];
$populate['id'] = $_SESSION['id'];

$file = $_FILES['image'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$file_size = $file['size'];
$upload_dir = '../uploads/products-img/';
$save_path = $upload_dir.$filename;
$allow_extension = ['jpg','jpeg','png'];
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//商品情報のバリデーション
strlen($product['name']) > 0 ? $populate['name'] = $product['name'] : $err_mes .= '・商品名を入力してください。<br><br>' ;
intval($product['price']) > 0 ? $populate['price'] =intval($product['price']): $err_mes .= '・価格を正しく入力してください。<br><br>' ;
intval($product['stock']) > 0 ? $populate['stock'] = intval($product['stock']) : $err_mes .=  '・在庫数を正しく入力してください。<br><br>';
strlen($product['category']) > 0 ? $populate['category'] = $product['category'] : $err_mes .=  '・商品カテゴリーを選択してください。<br><br>';
strlen($product['gender']) > 0 ? $populate['gender'] = $product['gender'] : $err_mes .=  '・対象カテゴリーを選択してください。<br><br>';
//画像のバリデーション

if (is_uploaded_file($tmp_path)) {
    echo 'ca';
    if ($file_size > 1048576  || $file_err == 2) {
        $err_mes .= '・ファイルサイズは1MB未満にしてください<br><br>';
    }
    if (!in_array($file_extension, $allow_extension)) {
        $err_mes .=  '・画像ファイルを添付してください。<br><br>';
    }
    if ($file_err == 0 && move_uploaded_file($tmp_path, $save_path)) {
        $populate['pass'] = $save_path;
        $removeImg = basename($product['pass']);
    } else {
        $err_mes .=  '・ファイルアップロードにエラーが起きています。<br><br>';
    }
} elseif ($file_err == 4) {
    $populate['pass'] = $product['pass'];
}

if (isset($err_mes)) {
    $err_mes .= '・商品情報を正しく入力してください。<br><br>';
}

if (empty($err_mes)) {
    $result = Product::updateProduct($populate);
    $result ? $mes_p = '・登録完了しました。<br>': $err_mes .= '・登録に失敗しました。<br>管理者へお問い合わせください';
    if ($result && isset($removeImg)) {
        unlink('../uploads/products-img/' . $removeImg) ? $mes_p .= '既存の画像は削除されました。' : $err_mes .= '既存の画像の削除に失敗しました。';
    }
} else {
    $err_mes .= '・画像の保存に失敗しました。<br>管理者へお問い合わせください。';
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