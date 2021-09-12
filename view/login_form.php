<?php

session_start();
require_once '../classes/UserLogic.php';
$err = $_SESSION;

$result = UserLogic::checkLogin();
if ($result) {
    header('location:mypage.php');
    return;
}
if (isset($_GET['reload'])) {
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <form class="login" action="../model/login.php" method="POST">
    <fieldset>
      <legend class="legend">Login</legend>
      <div class="input">
        <input name="email" type="email" placeholder="Email" required />
        <span><img src="../uploads/icon/email.png" alt=""></span>
      </div>
      <div class="input">
        <input name="password" type="password" placeholder="Password" required />
        <span><img src="../uploads/icon/password.png" alt=""></span>
      </div>
      <?php if (isset($err['msg'])) :?>
      <div class="err-mes">
        <?php echo $err['msg'] ;?>
      </div>
      <?php endif; ?>
      <button type="submit" class="submit">
        <div class="thinright"></div>
      </button>
    </fieldset>
    <div class="feedback">
      login successful <br />
      redirecting...
    </div>
  </form>
  <form action="#" method="get" id="reload">
    <input type="hidden" name="reload" value="true">
  </form>
  <style>
    .thinright {
      position: relative;
    }

    .thinright::before {
      content: "";
      display: block;
      position: absolute;
      top: 0px;
      left: 10px;
      width: 20px;
      height: 2px;
      background: #FF7052;
    }

    .thinright::after {
      content: "";
      display: block;
      position: absolute;
      top: -6px;
      left: 15px;
      width: 10px;
      height: 10px;
      border: 2px solid;
      transform: rotate(-135deg);
      border-color: transparent transparent #FF7052 #FF7052;
    }

    .submit:focus .thinright::before,
    .submit:hover .thinright::before {
      background: #fff;
    }

    .submit:focus .thinright::after,
    .submit:hover .thinright::after {
      border-color: transparent transparent #fff #fff;
    }

    * {
      -ms-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      border: 0;
    }

    html,
    body {
      width: 100%;
      height: 100%;
      background: #eee;
      font-family: 'Open Sans', sans-serif;
      font-weight: 200;
    }

    .login {
      position: relative;
      top: 50%;
      width: 250px;
      display: table;
      margin: -150px auto 0 auto;
      background: #fff;
      border-radius: 4px;
    }

    .legend {
      position: relative;
      width: 100%;
      display: block;
      background: #FF7052;
      padding: 15px;
      color: #fff;
      font-size: 20px;
    }

    .legend:after {
      content: "";
      background-image: url(http://simpleicon.com/wp-content/uploads/multy-user.png);
      background-size: 100px 100px;
      background-repeat: no-repeat;
      background-position: 152px -16px;
      opacity: 0.06;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: absolute;
    }

    .input {
      position: relative;
      width: 90%;
      margin: 15px auto;
    }

    .input span {
      position: absolute;
      display: block;
      color: #d4d4d4;
      left: 8px;
      top: 5px;
      font-size: 20px;
    }

    .input span img {
      width: 25px;
      opacity: 1;
      transition: opacity 300ms ease;
    }

    .input input:focus+span img {
      opacity: 0;
    }

    .input input {
      width: 100%;
      padding: 10px 5px 10px 40px;
      display: block;
      border: 1px solid #EDEDED;
      border-radius: 4px;
      transition: 0.2s ease-out;
      color: #a1a1a1;
    }

    .input input:focus {
      padding: 10px 5px 10px 10px;
      outline: 0;
      border-color: #FF7052;
    }

    .submit {
      width: 45px;
      height: 45px;
      display: block;
      margin: 0 auto -15px auto;
      background: #fff;
      border-radius: 100%;
      border: 1px solid #FF7052;
      color: #FF7052;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0px 0px 0px 7px #fff;
      transition: 0.2s ease-out;
    }

    .submit:hover,
    .submit:focus {
      background: #FF7052;
      color: #fff;
      outline: 0;
    }

    .feedback {
      position: absolute;
      bottom: -70px;
      width: 100%;
      text-align: center;
      color: #fff;
      background: #2ecc71;
      padding: 10px 0;
      font-size: 12px;
      display: none;
      opacity: 0;
    }

    .feedback:before {
      bottom: 100%;
      left: 50%;
      border: solid transparent;
      content: "";
      height: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
      border-color: rgba(46, 204, 113, 0);
      border-bottom-color: #2ecc71;
      border-width: 10px;
      margin-left: -10px;
    }

    .err-mes {
      color: #666;
      width: 80%;
      margin: 10px auto;
      font-size: 90%;
    }
  </style>
  <script>
    if (window.performance.navigation.type === 1) {
      const el = document.getElementById('reload');
      el.submit();
    }
  </script>
</body>

</html>