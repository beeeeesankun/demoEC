<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions/function.php';

if (!UserLogic::checkLogin()) {
    kick();
}
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
  <title>確認画面</title>
</head>

<body>
  <div class="wrapper">
    <form class="sign-in" action="../model/remove_account.php" method="POST">
      <fieldset>
        <legend class="legend">削除アカウントの確認</legend>
        <div class="input">
          <input name="removeUser" type="text" placeholder="Deleted Name" required="">
          <span><i class="fas fa-user"></i></span>
        </div>
        <div class="input">
          <input name="email" type="email" placeholder="Registered Email" required="">
          <span><i class="far fa-envelope"></i></span>
        </div>
        <div class="input">
          <input name="password" type="password" placeholder="Registered Password" required="">
          <span><i class="fas fa-unlock-alt"></i></span>
        </div>
        <div class="input back">
          <a href="./mypage.php">キャンセル</a>
        </div>
        <button type="submit" class="submit">
          <div>
            <i class="fas fa-user-minus"></i>
          </div>
        </button>
      </fieldset>
    </form>
  </div>
</body>

</html>