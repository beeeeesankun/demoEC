<header class="header">
  <h2>マイページ</h2>
  <div>
    <p>ようこそ<?php echo h($login_user['name'])?>さん</p>
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
</style>