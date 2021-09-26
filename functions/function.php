<?php
/**
 * XSS:エスケープ処理
 *
 * @param string $str 処理する文字列
 * @return string 処理された文字列
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * CSRF対策
 * @param void
 * @return string $csrf_token
 */
function setToken()
{
    //トークンの生成
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    return $csrf_token;
}

/**
 * 呼ばれたら弾く
 * @param void
 * @return void
 */
function kick()
{
    $_SESSION['msg'] = '不正なリクエストです。<br>ユーザー登録をしてログインしてください。';
    header('location:login_form.php');
    return;
}
