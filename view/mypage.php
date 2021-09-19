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

if (!isset($_SESSION['login_counter'])) {
    $_SESSION['login_counter'] = 0;
}
$_SESSION['login_counter'] += 1;
$login_user = $_SESSION['login_user'];
$el = '<div id="alert" class="alert"><p>ログインしました</p></div>';
$h2Txt = '管理画面';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/mypage.css">
  <title>マイページ</title>
</head>

<body>
  <div class="wrapper">
    <?php include './component/header.php'; ?>
    <section class="dashboard">
      <h4>ダッシュボード</h4>
      <ul class="lists">
        <?php if ($login_user['id'] == 1 && $login_user['name'] == 'master') :?>
        <li class="lists-item">
          <a href="./account_lists.php">
            <div>
              <i class="mypage-icon fas fa-chalkboard-teacher"></i>
            </div>
            <p>アカウント管理</p>
            <ul class="accounts child-lists">
              <li class="account">
                <a href="./account_lists.php">アカウント一覧</a>
              </li>
              <li class="account">
                <a href="./signup_form.php">アカウントの追加</a>
              </li>
              <li class="account">
                <a href="./remove_account_form.php">アカウントの削除</a>
              </li>
            </ul>
          </a>
        </li>
        <?php endif; ?>
        <li class="lists-item">
          <a href="./products_lists.php">
            <div>
              <i class="mypage-icon fas fa-boxes"></i>
            </div>
            <p>商品管理</p>
            <ul class="products child-lists">
              <li class="product"><a href="./products_lists.php">商品一覧</a></li>
              <li class="product"><a href="./add_product_form.php">商品の追加</a></li>
              <li class="product"><a href="./update_product_form.php">商品の編集</a></li>
              <li class="product"><a href="./remove_product_form.php">商品の削除</a></li>
            </ul>
          </a>
        </li>
        <li class="lists-item">
          <a href="../public_html/">
            <div>
              <i class="mypage-icon fas fa-store-alt"></i>
            </div>
            <p>ショップを見る</p>
          </a>
        </li>
      </ul>
    </section>
  </div>
  <?php if ($_SESSION['login_counter'] < 2) :?>
  <?php echo $el; ?>
  <script src="../js/mypage.js"></script>
  <?php endif; ?>
</body>

</html>