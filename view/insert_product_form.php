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
    <form enctype="multipart/form-data" class="sign-in" action="../model/insert_product.php" method="POST">
      <fieldset>
        <legend class="legend">商品登録</legend>
        <div class="input">
          <label for="product[name]">商品名</label>
          <input name="product[name]" type="text" placeholder="商品名" required>
        </div>
        <div class="input">
          <label for="product[price]">価格</label>
          <input name="product[price]" type="text" placeholder="価格" min="0" class="half" required>
        </div>
        <div class="input">
          <label for="product[stock]">在庫数</label>
          <input name="product[stock]" type="text" placeholder="在庫数" min="0" max="50" class="half" required>
        </div>
        <div class="input">
          <label for="image">商品画像</label>
          <input name="image" type="file" placeholder="商品画像" accept="image/*" required>
          <!-- <input name="MAX_FILE_SIZE" type="hidden" value="1048576" /> -->
        </div>
        <div class="input">
          <label for="product[category]">商品カテゴリー</label>
          <select name="product[category]" required>
            <option hidden value="">商品カテゴリーを選択してください</option>
            <option value="アウター">アウター</option>
            <option value="ボトムス">ボトムス</option>
            <option value="セーター">セーター</option>
            <option value="シャツ">シャツ</option>
            <option value="インナー">インナー</option>
            <option value="グッズ">グッズ</option>
          </select>
        </div>
        <div class="input">
          <label for="product[gender]">対象カテゴリー</label>
          <select name="product[gender]" required>
            <option hidden value="">対象カテゴリーを選択してください</option>
            <option value="woman">Woman</option>
            <option value="man">Man</option>
            <option value="kids">Kids</option>
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
  <script src="../js/transform_half.js"></script>
</body>

</html>