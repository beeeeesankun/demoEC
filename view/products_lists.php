<?php
ini_set('display_errors', true);
require_once '../functions/function.php';
require_once '../classes/Product.php';
require_once '../classes/UserLogic.php';

session_start();
if (!UserLogic::checkLogin()) {
    kick();
}

$h2Txt = '商品管理';
$login_user = $_SESSION['login_user'];
Product::getAllProducts();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/mypage.css">
  <title>商品管理</title>
</head>

<body>
  <div class="wrapper">
    <?php include './component/header.php'; ?>
    <section class="dashboard">
      <h3>商品一覧</h3>
      <table class="user-lists">
        <tr>
          <th>商品名</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>カテゴリー</th>
          <th>属性</th>
          <th>最終更新日</th>
        </tr>
        <!-- <?php foreach ($users as $user): ?>
        <tr>
          <td>
            <?php echo "$user[name]"; ?>
          </td>
          <td>
            <?php echo "$user[email]"; ?>
          </td>
          <td>
            <?php echo "$user[create_time]"; ?>
          </td>
          <td>
            <?php if ($user['name'] == 'master'): ?>
            <i class="fas fa-check"></i>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?> -->
      </table>
      <div class="back"><a href="./mypage.php">戻る</a></div>
    </section>
  </div>
</body>

</html>