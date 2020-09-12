<?php

require_once '../classes/Database.php';

$db = new Database();

if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password'])) {
    $db->query('INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)');
    $db->bind(':name', $_POST['name']);
    $db->bind(':email', $_POST['email']);
    $db->bind(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));

    if ($db->execute()) {
        echo true;
    } else {
        echo false;
    }
}
