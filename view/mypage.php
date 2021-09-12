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
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo CSS.'mypage.css'?>">
  <title>マイページ</title>
</head>

<body>
  <div class="wrapper">
    <?php echo $el; ?>
    <?php include './component/header.php'; ?>
    <section class="dashboard">
      <h4>ダッシュボード</h4>
      <ul class="lists">
        <?php if ($login_user['id'] == 1 && $login_user['name'] == 'master') :?>
        <li class="lists-item">
          <div>
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <p>アカウント管理</p>
        </li>
        <?php endif; ?>
        <li class="lists-item">
          <div>
            <i class="fas fa-boxes"></i>
          </div>
          <p>商品管理</p>
        </li>
      </ul>
    </section>
  </div>
  <script src="<?php echo JS.'mypage.js'?>"></script>
</body>

</html>