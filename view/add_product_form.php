<?php
session_start();
require_once '../functions/function.php';
require_once '../classes/UserLogic.php';
require_once '../classes/Product.php';
$result = UserLogic::checkLogin();
if (!$result) {
    header('location:login_form.php');
    return;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/product.css">
  <title>商品登録画面</title>
</head>

<body>
  <div class="wrapper">
    <?php if (isset($login_err)) :?>
    <span><?php echo $login_err ;?></span>
    <?php endif; ?>
    <form class="sign-in" action="../model/register.php" method="POST">
      <fieldset>
        <legend class="legend">商品登録</legend>
        <div class="input">
          <label for="productName">商品名</label>
          <input name="productName" type="text" placeholder="商品名" required="">
        </div>
        <div class="input">
          <label for="price">価格</label>
          <input name="price" type="text" placeholder="価格" required="">
        </div>
        <div class="input">
          <label for="stock">在庫数</label>
          <input name="stock" type="text" placeholder="在庫数" required="">
        </div>
        <div class="input">
          <label for="pass">商品画像</label>
          <input name="pass" type="file" placeholder="商品画像" required="">
        </div>
        <div class="input">
          <label for="productName">商品カテゴリー</label>
          <select name="select-box">
            <option value="アウター">アウター</option>
            <option value="ボトムス">ボトムス</option>
            <option value="セーター">セーター</option>
            <option value="シャツ">シャツ</option>
            <option value="インナー">インナー</option>
            <option value="グッズ">グッズ</option>
          </select>
        </div>
        <div class="input">
          <label for="productName">対象カテゴリー</label>
          <select name="select-box">
            <option value="woman">woman</option>
            <option value="man">man</option>
            <option value="kids">kids</option>
          </select>
        </div>
        <div class="input">
          <div class="input back">
            <a href="./mypage.php">キャンセル</a>
          </div>
          <button type="submit" class="submit">登録する</button>
        </div>
        <input type="hidden" name="csrf_token" value="<?php echo h(setToken()) ?>">

      </fieldset>
    </form>

  </div>
</body>

</html>