<?php

require_once '../classes/Database.php';

$db = new Database();

if (isset($_POST['email'])) {
    $db->query('SELECT * FROM `users` WHERE `email` = :email');
    $db->bind(':email', $_POST['email']);

    if ( $db->result()) {
        echo true;
    } else {
        echo false;
    }
}