<?php
session_start();

require_once '../classes/Database.php';

$db = new Database();

if (isset($_POST['key'])) {
    $key = filter_var($_POST['key'], FILTER_SANITIZE_STRING);
    $user_id = $_SESSION['user_id'];
    $db->query("SELECT id, name, image FROM `users` WHERE `name` OR `email` LIKE '$key%' AND id != $user_id");
    $users = $db->resultset();
    if ($users) {
        echo json_encode($users);
    } else {
        echo 'false';
    }    
}