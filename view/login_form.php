<?php
session_start();
require_once '../classes/UserLogic.php';
$err = $_SESSION;

$result = UserLogic::checkLogin();
if ($result) {
    header('location:mypage.php');
    return;
}
if (isset($_GET['reload'])) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <h2>ログインフォーム</h2>
  <?php if (isset($err['msg'])) :?>
  <span><?php echo $err['msg'] ;?></span>
  <?php endif; ?>
  <form action="../model/login.php" method="POST">
    <p>
      <label for="email">メールアドレス:</label>
      <input type="email" name="email">
      <?php if (isset($err['email'])) :?>
      <span><?php echo $err['email'] ;?></span>
      <?php endif; ?>
    </p>
    <p>
      <label for="password">パスワード:</label>
      <input type="password" name="password">
      <?php if (isset($err['password'])) :?>
      <span><?php echo $err['password'];?></span>
      <?php endif; ?>
    </p>
    <button type="submit">ログイン</button>
  </form>
  <form action="#" method="get" id="reload">
    <input type="hidden" name="reload" value="true">
  </form>
  <a href="./signup_form.php">新規登録はこちら</a>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script>
    if (window.performance.navigation.type === 1) {
      $('#reload').submit();
    }
  </script>
</body>

</html>