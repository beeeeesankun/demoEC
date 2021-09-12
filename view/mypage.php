<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions/function.php';

//ログインしているが判定し。していなかったら新規登録画面へ戻す
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録をしてログインしてください。';
    header('location:signup_form.php');
    return;
}
$login_user = $_SESSION['login_user'];

$el = '<div id="alert" class="alert"><p>ログインしました</p></div>'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>
</head>

<body>
  <?php echo $el; ?>
  <h2>マイページ</h2>
  <p>ログインユーザー：<?php echo h($login_user['name']) ?>
  </p>
  <p>メールアドレス：<?php echo h($login_user['email']) ?>
  </p>
  <form action="logout.php" method="POST">
    <input type="submit" name="logout" value="ログアウト">
  </form>
  <style>
    .alert {
      border-radius: 10px;
      background: #eee;
      padding: 0px 20px;
      position: absolute;
      top: -120px;
      left: 50%;
      transform: translateX(-50%);
      transition: top 1000ms ease;
    }

    .alert.moved {
      top: 20px;
    }
  </style>
  <script>
    window.addEventListener('load', (event) => {
      const el = document.getElementById('alert');
      el.classList.add('moved');
      setTimeout(function() {
        el.classList.remove('moved');
      }, 2000);
    });
  </script>
</body>

</html>