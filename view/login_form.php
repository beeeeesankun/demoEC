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
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/form.css">
  <title>ログイン画面</title>
</head>

<body>
  <form class="login" action="../model/login.php" method="POST">
    <fieldset>
      <legend class="legend">Login</legend>
      <div class="input">
        <input name="email" type="email" placeholder="Email" required />
        <span><i class="far fa-envelope"></i></span>
      </div>
      <div class="input">
        <input name="password" type="password" placeholder="Password" required />
        <span><i class="fas fa-unlock-alt"></i></span>
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
  <script src="../js/login_form.js"></script>
</body>

</html>