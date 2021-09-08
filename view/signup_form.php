<?php
session_start();
require_once '../functions/function.php';
require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
    header('location:mypage.php');
    return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録画面</title>
</head>

<body>
  <h2>ユーザー登録フォーム</h2>
  <?php if (isset($login_err)) :?>
  <span><?php echo $login_err ;?></span>
  <?php endif; ?>
  <form action="../model/register.php" method="POST">
    <p>
      <label for="username">ユーザー名:</label>
      <input type="text" name="username">
    </p>
    <p>
      <label for="email">メールアドレス:</label>
      <input type="email" name="email">
    </p>
    <p>
      <label for="password">パスワード:</label>
      <input type="password" name="password">
    </p>
    <p>
      <label for="password_conf">パスワード（確認）:</label>
      <input type="password" name="password_conf">
    </p>
    <input type="hidden" name="csrf_token" value="<?php echo h(setToken()) ?>">
    <button type="submit">新規登録</button>
  </form>
</body>

</html>