<?php
session_start();
ini_set('display_errors', true);
require_once '../classes/UserLogic.php';

$err_mes = [];
$_SESSION = [];

if (!$email = filter_input(INPUT_POST, 'email')) {
    $err_mes['email'] = '※メールアドレスを記入してください。';
}
if (!$password = filter_input(INPUT_POST, 'password')) {
    $err_mes['password'] = '※パスワードを記入してください。';
}

if (count($err_mes) > 0) {
    $_SESSION = $err_mes;
    header('location:../view/login_form.php');
    return;
}

$result = UserLogic::login($email, $password);
if ($result) {
    header('location:../view/mypage.php');
} else {
    header('location:../view/login_form.php');
}
