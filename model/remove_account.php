<?php
ini_set('display_errors', true);
require_once '../classes/UserLogic.php';
$arr = [];
$username = filter_input(INPUT_POST, 'removeUser');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

UserLogic::removeUser($username, $email, $password);
