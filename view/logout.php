<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';

if (!$logout = filter_input(INPUT_POST, 'logout')) {
    exit('不正なリクエストです。');
}

//ログインしているが判定し、タイムアウトしていたらメッセージを出す。
$result = UserLogic::checkLogin();

if (!$result) {
    exit('セッションが切れましたので、再ログインしてください。');
}

//ログアウトする
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログアウト</title>
</head>

<body>
  <h2>ログアウト</h2>
  <p>ログアウトしました。</p>
  <a href="login_form.php">ログイン画面へ</a>
</body>

</html>