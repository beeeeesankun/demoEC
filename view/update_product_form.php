<?php
ini_set('display_errors', true);
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions/function.php';

if (!UserLogic::checkLogin()) {
    kick();
}


$id =  filter_input(INPUT_POST, 'id');

echo '<pre>';
var_dump($id);
echo '</pre>';
