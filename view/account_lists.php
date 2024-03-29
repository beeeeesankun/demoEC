<?php
ini_set('display_errors', true);
require_once '../functions/function.php';
require_once '../classes/UserLogic.php';
session_start();
if (!UserLogic::checkLogin()) {
    kick();
}

$h2Txt = 'アカウント管理';
$login_user = $_SESSION['login_user'];
$users = UserLogic::getUsersLists();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/mypage.css">
  <title>アカウント管理</title>
</head>

<body>
  <div class="wrapper">
    <?php include './component/header.php'; ?>
    <section class="dashboard">
      <h3>アカウント一覧</h3>
      <table class="user-lists">
        <tr>
          <th>アカウント名</th>
          <th>メールアドレス</th>
          <th>作成日</th>
          <th>システム管理権限</th>
        </tr>
        <?php foreach ($users as $user): ?>
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
        <?php endforeach; ?>
      </table>
      <div class="back"><a href="./mypage.php">戻る</a></div>
    </section>
  </div>
</body>

</html>