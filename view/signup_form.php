<?php
session_start();
require_once '../functions/function.php';
require_once '../classes/UserLogic.php';
$login_user = $_SESSION['login_user'];
$result = UserLogic::checkLogin();
if (!$result) {
    header('location:login_form.php');
    return;
}
if (!$login_user['name'] == 'master' || $login_user['id'] > 1) {
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/mypage.css">
  <title>ユーザー登録画面</title>
</head>

<body>
  <div class="wrapper">
    <?php include './component/header.php'; ?>
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
      <button type="submit">登録</button>
    </form>
    <a href="./mypage.php">マイページへ戻る</a>
  </div>
</body>

</html>