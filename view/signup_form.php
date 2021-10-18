<?php
session_start();
require_once '../functions/function.php';
require_once '../classes/UserLogic.php';
$login_user = $_SESSION['login_user'];
if (!UserLogic::checkLogin()) {
    kick();
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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/form.css">
  <title>登録画面</title>
</head>

<body>
  <div class="wrapper">
    <?php if (isset($login_err)) :?>
    <span><?php echo $login_err ;?></span>
    <?php endif; ?>
    <form class="sign-in" action="../model/register.php" method="POST">
      <fieldset>
        <legend class="legend">管理者登録</legend>
        <div class="input">
          <input name="username" type="text" placeholder="Name" required="">
          <span><i class="fas fa-user"></i></span>
        </div>
        <div class="input">
          <input name="email" type="email" placeholder="Email" required="">
          <span><i class="far fa-envelope"></i></span>
        </div>
        <div class="input">
          <input name="password" type="password" placeholder="Password" required="">
          <span><i class="fas fa-unlock-alt"></i></span>
        </div>
        <div class="input">
          <input name="password_conf" type="password" placeholder="Re-enter" required="">
          <span><i class="fas fa-unlock"></i></span>
        </div>
        <div class="input back">
          <a href="./mypage.php">キャンセル</a>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo h(setToken()) ?>">
        <button type="submit" class="submit">
          <div>
            <i class="fas fa-user-plus"></i>
          </div>
        </button>
      </fieldset>
    </form>

  </div>
</body>

</html>