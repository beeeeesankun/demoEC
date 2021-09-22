<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/Message.php';

$mes_h2 = 'Success';
$err_mes_h2 = 'Failed';
$mes_p = '登録完了しました。';
$mes_a = '<a href="../view/mypage.php">戻る</a>';
$err_mes_a = '<a href="../view/signup_form.php">戻る</a>';

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンが空||不一致で処理を中止
// if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
//     exit('不正なリクエストです。');
// }
// unset($_SESSION['csrf_token']);

$err_mes = null;
$product = $_POST['product'];
$file = $_FILES['product'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$file_size = $file['size'];
$upload_dir = 'images/';
$save_filename = $filename . date('YmdHis');
$save_path =  $upload_dir.$save_filename;
$allow_extension = ['jpg','jpeg','png'];
$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!isset($product['name'])) {
    $err_mes .= '・商品名を入力してください。<br><br>';
}
if (!isset($product['price'])) {
    $err_mes .= '・価格を入力してください。<br><br>';
}
if (!isset($product['stock'])) {
    $err_mes .= '・在庫数を入力してください。<br><br>';
}
if (!isset($product)) {
    $err_mes .= '・画像を選択してください。<br><br>';
}
if (!isset($product['category'])) {
    $err_mes .= '・商品カテゴリーを入力してください。<br><br>';
}
if (!isset($product['gender'])) {
    $err_mes .= '・対象カテゴリーを入力してください。<br><br>';
}
if ($file_size > 1048576  || $file_err == 2) {
    $err_mes .= '・ファイルサイズは1MB未満にしてください<br><br>';
}
if (!in_array($file_extension, $allow_extension)) {
    $err_mes .=  '・画像ファイルを添付してください。<br><br>';
}
if (isset($err_mes)) {
    $err_mes .= '・商品情報を正しく入力してください。<br><br>';
}

echo '<pre>';
var_dump($file);
echo '</pre>';
echo '<pre>';
var_dump($file['name']);
echo '</pre>';
echo '<pre>';
var_dump($filename);
echo '</pre>';
$populating=0;

// $result = Product::insertProduct($populating);
// if (!$result) {
//     $err_mes .= '・登録に失敗しました。';
// }
$titleTxt = !isset($err_mes) ? 'Success' : 'Failed';

?>

<!-- <!DOCTYPE html>
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

</html> -->