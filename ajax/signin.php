<?php

require_once 'emailcheck.php';

if (isset($_GET['email'])) {
    $db->query('SELECT * FROM `users` WHERE `email` = :email');
    $db->bind(':email', $_GET['email']);
    $user = $db->result();

    if (password_verify($_GET['password'], $user['password'])) {
        echo true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['image'] = $user['image'];
    } else {
        echo false;
    }
}
