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
$products = Product::getAllProducts();


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
  <title>商品管理</title>
</head>

<body>
  <div class="wrapper">
    <?php include './component/header.php'; ?>
    <section class="dashboard">
      <h3>商品一覧</h3>
      <table class="user-lists">
        <tr>
          <th>商品画像</th>
          <th>商品名</th>
          <th>価格</th>
          <th>在庫数</th>
          <th>カテゴリー</th>
          <th>対象カテゴリー</th>
          <th>最終更新日</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
          <td>
            <div class='list-img'>
              <img src='<?php echo "$product[pass]"; ?>' alt=''>
            </div>
          </td>
          <td><?php echo "$product[name]";?>
          </td>
          <td><?php
            $num = number_format($product['price']);
            $num .='円';
            echo $num;
            ?>
          </td>
          <td><?php echo "$product[stock]";?>
          </td>
          <td><?php echo "$product[category]";?>
          </td>
          <td><?php echo "$product[gender]";?>
          </td>
          <td><?php echo "$product[update_time]";?>
          </td>
          <td>
            <form action="./update_product_form.php" method="post">
              <input type="hidden" name="id" value="<?php echo "$product[id]"?>">
              <button type="submit"><i class="far fa-edit"></i></button>
            </form>
          </td>
          <td>
            <form action="./remove_product_form.php" method="post">
              <input type="hidden" name="id" value="<?php echo "$product[id]"?>">
              <button type="submit"><i class="far fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      <div class="back"><a href="./mypage.php">戻る</a></div>
    </section>
  </div>
</body>

</html>