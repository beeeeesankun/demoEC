<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
$err_mes = [];

$token = filter_input(INPUT_POST, 'csrf_token');
//トークンが空||不一致で処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエストです。');
}
unset($_SESSION['csrf_token']);

if (!$username = filter_input(INPUT_POST, 'username')) {
    $err_mes[] = 'ユーザー名を記入してください。';
}
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err_mes[] = 'メールアドレスを記入してください。';
}
if (!preg_match("/\A[a-z\d]{8,100}+\z/i", $password = filter_input(INPUT_POST, 'password'))) {
    $err_mes[] = 'パスワードは英数字８文字以上１００文字以内で入力してください。';
}
if ($password!==$password_conf = filter_input(INPUT_POST, 'password_conf')) {
    $err_mes[] = '確認用パスワードと異なっています。';
}

if (count($err_mes) === 0) {
    $hasCreated = UserLogic::createUser($_POST);
    if (!$hasCreated) {
        $err_mes[] = '登録に失敗しました。';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録完了画面</title>
</head>

<body>

  <?php if (count($err_mes) > 0):?>
  <?php foreach ($err_mes as $e):?>
  <p>
    <?php echo $e?>
  </p>
  <?php endforeach ?>
  <?php else:?>
  <h2>ユーザー登録完了しました。</h2>
  <?php endif ?>
  <a href="../view/signup_form.php">戻る</a>
</body>

</html>