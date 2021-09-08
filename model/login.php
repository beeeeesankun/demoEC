<?php
session_start();
ini_set('display_errors', true);
require_once '../classes/UserLogic.php';

$err_mes = [];
$_SESSION = [];

if (!$email = filter_input(INPUT_POST, 'email')) {
    $err_mes['email'] = '※メールアドレスを記入してください。';
}
if (!$password = filter_input(INPUT_POST, 'password')) {
    $err_mes['password'] = '※パスワードを記入してください。';
}

if (count($err_mes) > 0) {
    $_SESSION = $err_mes;
    header('location:../view/login_form.php');
    return;
}
//ログイン成功時
$result = UserLogic::login($email, $password);

//ログイン失敗時
if (!$result) {
    header('location:../view/login_form.php');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン完了</title>
</head>

<body>
  <h2>ログイン完了</h2>
  <p>ログインしました！</p>
  <a href="./mypage.php">マイページへ</a>
</body>

</html>