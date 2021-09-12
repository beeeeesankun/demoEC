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
  <link rel="stylesheet" href="">
  <title>ログアウト</title>
</head>

<body>
  <div class="logout">
    <h2>Logout</h2>
    <p>ログアウトしました。</p>
    <a href="login_form.php">ログイン画面へ</a>
  </div>
</body>
<style>
  body{
    background: #eee;
  }
  .logout{
    margin: 260px auto;
    width: 45%;
    background: #fff;
    padding: 0 0 20px;
  }
  .logout > *{
    padding: 0 40px;
  }
  .logout h2{
    font-weight: 200;
    background: #ff7052;
    color: #fff;
    padding: 15px;
    font-size: 20px;
  }

</style>

</html>