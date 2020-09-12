<?php

require_once '../classes/Database.php';

$db = new Database();

if (isset($_POST['email'])) {
    $db->query('SELECT * FROM `users` WHERE `email` = :email');
    $db->bind(':email', $_POST['email']);
    $user = $db->result();

    if (password_verify($_POST['password'], $user['password'])) {
        echo true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['image'] = $user['image'];
    } else {
        echo false;
    }
}
