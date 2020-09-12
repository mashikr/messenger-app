<?php

require_once '../classes/Database.php';

$db = new Database();

if (isset($_POST['name'])) {
    $db->query('UPDATE `users` SET `name`= :name WHERE `id` = :id');
    $db->bind(':name', $_POST['name']);
    $db->bind(':id', $_SESSION['user_id']);

    if ($db->execute()) {
        $_SESSION['name'] = $_POST['name'];
        echo true;
    } else {
        echo false;
    }
}

if (isset($_POST['password'])) {
    $db->query('SELECT * FROM `users` WHERE `id` = :id');
    $db->bind(':id', $_SESSION['user_id']);
    $user = $db->result();

    if (password_verify($_POST['password'], $user['password'])) {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $db->query('UPDATE `users` SET `password`= :password WHERE `id` = :id');
        $db->bind(':password', $password);
        $db->bind(':id', $_SESSION['user_id']);

        if ($db->execute()) {
            echo true;
        } else {
            echo false;
        }
       
    } else {
        echo 'invalid';
    }
}

if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $type = explode("/",$_FILES['image']['type']);

    if ($type[0] == 'image') {
        if (move_uploaded_file($file, "../asset/img/$file_name")) {
            $db->query('UPDATE `users` SET `image`= :image WHERE `id` = :id');
            $db->bind(':image', $file_name);
            $db->bind(':id', $_SESSION['user_id']);

            if ($db->execute()) {
                if ($_SESSION['image']) {
                    unlink('../asset/img/'.$_SESSION['image']);
                }
                $_SESSION['image'] = $file_name;
                echo json_encode(array('status' => true, 'image' => $file_name));
            } else {
                echo false;
            }
        } else {
            echo 'wrong';
        }
    } else {
        echo "invalid";
    }

    
}