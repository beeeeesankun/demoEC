<header class="header">
  <?php echo '<h2>' . $h2Txt . '</h2>'; ?>
  <div class="flex">
    <p>ようこそ<?php echo h($login_user['name'])?>さん</p>
    <form action="logout.php" method="POST" class="logout">
      <input type="submit" name="logout" value="ログアウト" class="button">
    </form>
  </div>
</header>
<style>
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #ff7052;
    color: #fff;
    padding: 0 20px;
  }

  .flex {
    display: flex;
    align-items: center;
  }

  .logout {
    margin: 0 0 0 20px;
  }

  .button {
    display: inline-block;
    border-radius: 5%;
    font-size: 10pt;
    text-align: center;
    cursor: pointer;
    padding: 10px 20px;
    background: rgba(255, 112, 82, 0.8);
    color: #ffffff;
    line-height: 1em;
    transition: .3s;
    box-shadow: 3px 3px 3px #666666;
  }

  .button:hover {
    box-shadow: none;
    opacity: .75;
  }
</style>