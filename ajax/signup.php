<?php

require_once 'emailcheck.php';

if (isset($_GET['email'])) {
    $db->query('INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)');
    $db->bind(':name', $_GET['name']);
    $db->bind(':email', $_GET['email']);
    $db->bind(':password', password_hash($_GET['password'], PASSWORD_DEFAULT));

    if ($db->execute()) {
        echo true;
    } else {
        echo false;
    }
}
