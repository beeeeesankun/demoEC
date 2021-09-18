<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/Message.php';
$err_mes = null;

$mes_h2 = 'Success';
$mes_p = '登録完了しました。';
$mes_a = '<a href="../view/signup_form.php">戻る</a>';
$err_mes_h2 = 'Failed';

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンが空||不一致で処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエストです。');
}
unset($_SESSION['csrf_token']);

if (!$username = filter_input(INPUT_POST, 'username')) {
    $err_mes .= '・ユーザー名を記入してください。<br><br>';
}
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err_mes .= '・メールアドレスを記入してください。<br><br>';
}
if (!preg_match("/\A[a-z\d]{8,100}+\z/i", $password = filter_input(INPUT_POST, 'password'))) {
    $err_mes .= '・パスワードは英数字８文字以上１００文字以内で入力してください。<br><br>';
}
if ($password!==$password_conf = filter_input(INPUT_POST, 'password_conf')) {
    $err_mes .= '・確認用パスワードと異なっています。<br><br>';
}

if (!isset($err_mes)) {
    $hasCreated = UserLogic::createUser($_POST);
    if (!$hasCreated) {
        $err_mes .= '・登録に失敗しました。';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了</title>
</head>

<body>

  <?php if (isset($err_mes)):?>
  <?php Message::putMes($err_mes_h2, $err_mes, $mes_a)?>
  <?php else:?>
  <?php Message::putMes($mes_h2, $mes_p, $mes_a)?>
  <?php endif ?>
</body>

</html>