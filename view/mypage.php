<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions/function.php';
require_once '../config.php';

//ログインしているが判定し。していなかったら新規登録画面へ戻す
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録をしてログインしてください。';
    header('location:signup_form.php');
    return;
}
$login_user = $_SESSION['login_user'];

$el = '<div id="alert" class="alert"><p>ログインしました</p></div>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo CSS.'mypage.css'?>">
  <title>マイページ</title>
</head>

<body>
  <?php echo $el; ?>
  <?php include './component/header.php'; ?>
  <div class="wrapper">
    <?php include './component/side.php'; ?>
    <?php include './component/main.php'; ?>
  </div>
  <script src="<?php echo JS.'mypage.js'?>"></script>
</body>

</html>