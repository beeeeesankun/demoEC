<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/Message.php';
require_once '../classes/Product.php';

$mes_h2 = 'Success';
$err_mes_h2 = 'Failed';
$mes_a = '<a href="../view/mypage.php">戻る</a>';
$err_mes_a = '<a href="../view/insert_product_form.php">戻る</a>';

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンが空||不一致で処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエストです。');
}
unset($_SESSION['csrf_token']);

$err_mes = null;
$populating = [];

$product = $_POST['product'];

$file = $_FILES['image'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$file_size = $file['size'];
$upload_dir = '../uploads/products-img/';
$save_path =  $upload_dir.$filename;
$allow_extension = ['jpg','jpeg','png'];
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//商品情報のバリデーション
strlen($product['name']) > 0 ? $populating['name'] = $product['name'] : $err_mes .= '・商品名を入力してください。<br><br>' ;
intval($product['price']) > 0 ? $populating['price'] =intval($product['price']): $err_mes .= '・価格を正しく入力してください。<br><br>' ;
intval($product['stock']) > 0 ? $populating['stock'] = intval($product['stock']) : $err_mes .=  '・在庫数を正しく入力してください。<br><br>';
strlen($product['category']) > 0 ? $populating['category'] = $product['category'] : $err_mes .=  '・商品カテゴリーを選択してください。<br><br>';
strlen($product['gender']) > 0 ? $populating['gender'] = $product['gender'] : $err_mes .=  '・対象カテゴリーを選択してください。<br><br>';
//画像のバリデーション
if (!isset($file)) {
    $err_mes .= '・画像を選択してください。<br><br>';
}
if ($file_size > 1048576  || $file_err == 2) {
    $err_mes .= '・ファイルサイズは1MB未満にしてください<br><br>';
}
if (!in_array($file_extension, $allow_extension)) {
    $err_mes .=  '・画像ファイルを添付してください。<br><br>';
}
$populating['pass'] = $save_path;

if (isset($err_mes)) {
    $err_mes .= '・商品情報を正しく入力してください。<br><br>';
}
$titleTxt = !isset($err_mes) ? 'Success' : 'Failed';


if (is_uploaded_file($tmp_path) && move_uploaded_file($tmp_path, $save_path)) {
    $result = Product::insertProduct($populating);
    $result ? $mes_p = '・登録完了しました。': $err_mes .= '・登録に失敗しました。';
} else {
    $err_mes .= '・画像の保存に失敗しました。';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo '<title>' . $titleTxt . '</title>'; ?>
</head>

<body>

  <?php if (isset($err_mes)):?>
  <?php Message::putMes($err_mes_h2, $err_mes, $err_mes_a)?>
  <?php else:?>
  <?php Message::putMes($mes_h2, $mes_p, $mes_a)?>
  <?php endif ?>
</body>

</html>