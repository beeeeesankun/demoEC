<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions/function.php';
require_once '../classes/Product.php';

if (!UserLogic::checkLogin()) {
    kick();
}
$_SESSION['thisId'] =  filter_input(INPUT_POST, 'id');
$product = Product::getProductById($_SESSION['id']);
$_SESSION['thisPass'] = $product['pass'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/product.css">
  <title>商品削除画面</title>
</head>

<body>
  <div class="wrapper">
    <?php if (isset($login_err)) :?>
    <span><?php echo $login_err ;?></span>
    <?php endif; ?>
    <form enctype="multipart/form-data" class="sign-in" action="../model/remove_product.php" method="POST">
      <fieldset>
        <legend class="legend">商品確認</legend>
        <div class="input">
          <label for="image">商品画像</label>
          <div class='img-wrap'>
            <img src='<?php echo $product['pass'] ?>' alt=''>
          </div>
        </div>
        <div class="input">
          <label for="product[name]">商品名</label>
          <p><?php echo $product['name'] ?>
          </p>
        </div>
        <div class=" input">
          <label for="product[price]">価格</label>
          <p><?php echo $product['price'] ?>
          </p>
        </div>
        <div class="input">
          <label for="product[stock]">在庫数</label>
          <p><?php echo $product['stock'] ?>
          </p>
        </div>
        <div class="input">
          <label for="product[category]">商品カテゴリー</label>
          <p><?php echo $product['category'] ?>
          </p>
        </div>
        <div class="input">
          <label for="product[gender]">対象カテゴリー</label>
          <p><?php echo $product['gender'] ?>
          </p>
        </div>
        <div class="input">
          <div class="input back">
            <a href="./products_lists.php">キャンセル</a>
          </div>
          <button type="submit" class="submit">削除</button>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo h(setToken()) ?>">
      </fieldset>
    </form>
  </div>
</body>

</html>