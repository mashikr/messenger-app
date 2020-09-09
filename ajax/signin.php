<?php

require_once 'emailcheck.php';

if (isset($_GET['email'])) {
    $db->query('SELECT * FROM `users` WHERE `email` = :email');
    $db->bind(':email', $_GET['email']);
    $user = $db->result();

    if (password_verify($_GET['password'], $user['password'])) {
        echo true;
    } else {
        echo false;
    }
}
