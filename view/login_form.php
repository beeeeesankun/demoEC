<?php

session_start();
require_once '../classes/UserLogic.php';
require_once '../config.php';
$err = $_SESSION;

$result = UserLogic::checkLogin();
if ($result) {
    header('location:mypage.php');
    return;
}
if (isset($_GET['reload'])) {
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo CSS.'login_form.css'?>">
  <title>ログイン画面</title>
</head>

<body>
  <form class="login" action="../model/login.php" method="POST">
    <fieldset>
      <legend class="legend">Login</legend>
      <div class="input">
        <input name="email" type="email" placeholder="Email" required />
        <span><img src="../uploads/icon/email.png" alt=""></span>
      </div>
      <div class="input">
        <input name="password" type="password" placeholder="Password" required />
        <span><img src="../uploads/icon/password.png" alt=""></span>
      </div>
      <?php if (isset($err['msg'])) :?>
      <div class="err-mes">
        <?php echo $err['msg'] ;?>
      </div>
      <?php endif; ?>
      <button type="submit" class="submit">
        <div class="thinright"></div>
      </button>
    </fieldset>
  </form>
  <form action="#" method="get" id="reload">
    <input type="hidden" name="reload" value="true">
  </form>
  <script src="<?php echo JS.'login_form.js'?>"></script>
</body>

</html>