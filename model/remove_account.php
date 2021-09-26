<?php
ini_set('display_errors', true);
require_once '../classes/UserLogic.php';
require_once '../classes/Message.php';

$username = filter_input(INPUT_POST, 'removeUser');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$result = UserLogic::removeUser($username, $email, $password);

$mes_h2 = 'Success';
$err_mes_h2 = 'Failed';
$mes_p = '削除が完了しました。';
$mes_a = '<a href="../view/mypage.php">戻る</a>';
$err_mes_a = '<a href="../view/remove_account_form.php">戻る</a>';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $titleTxt = !is_bool($result)?'Failed':'Success';
    echo '<title>' . $titleTxt . '</title>';
  ?>
</head>

<body>
  <?php if (!is_bool($result)):?>
  <?php Message::putMes($err_mes_h2, $result, $err_mes_a)?>
  <?php else:?>
  <?php Message::putMes($mes_h2, $mes_p, $mes_a)?>
  <?php endif ?>
</body>

</html>