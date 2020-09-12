<?php

require_once '../classes/Database.php';

$db = new Database();
if (isset($_POST['msg'])) {
    $msg = htmlspecialchars($_POST['msg']);
    $receiver = $_POST['receiver'];
    
    $db->query('INSERT INTO `messages`(`sender`, `receiver`, `message`, `type`) VALUES (:sender, :receiver, :msg, :type)');
    $db->bind(':sender', $_SESSION['user_id']);
    $db->bind(':receiver', $receiver);
    $db->bind(':msg', $msg);
    $db->bind(':type', 'text');

    if ($db->execute()) {
        echo true;
    } else {
        echo false;
    }
}

if (isset($_FILES['image'])) {
    $type = explode("/",$_FILES['image']['type']);

    if ($type[0] == 'image') {
        $file_name = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        
        if (move_uploaded_file($file, "../asset/img/$file_name")) {
            $db->query('INSERT INTO `messages`(`sender`, `receiver`, `message`, `type`) VALUES (:sender, :receiver, :msg, :type)');
            $db->bind(':sender', $_SESSION['user_id']);
            $db->bind(':receiver', $_POST['id']);
            $db->bind(':msg', $file_name);
            $db->bind(':type', 'image');

            if ($db->execute()) {
                echo true;
            } else {
                echo false;
            }

        }
    } else {
        echo "invalid";
    }
}

if (isset($_FILES['file'])) {
    $type = explode("/",$_FILES['file']['type']);
    $type2 = explode(".",$_FILES['file']['name']);
    $type2 = end($type2);

    if ($type2 == 'pdf') {
        $type = 'pdf';
    } else if ($type[0] == 'audio') {
        $type = 'audio';
    } else if ($type[0] == 'video') {
        $type = 'video';
    } else if ($type2 == 'doc' || $type2 == 'docx') {
        $type = 'doc';
    } else if ($type2 == 'ppt' || $type2 == 'pptx') {
        $type = 'ppt';
    }  else if ($type2 == 'xlsx') {
        $type = 'excel';
    }  else if ($type2 == 'txt') {
        $type = 'txt';
    } else {
        echo 'invalid';
        return;
    }


    $file_name = $_FILES['file']['name'];
    $file = $_FILES['file']['tmp_name'];
    
    if (move_uploaded_file($file, "../asset/$type/$file_name")) {
        $db->query('INSERT INTO `messages`(`sender`, `receiver`, `message`, `type`) VALUES (:sender, :receiver, :msg, :type)');
        $db->bind(':sender', $_SESSION['user_id']);
        $db->bind(':receiver', $_POST['id']);
        $db->bind(':msg', $file_name);
        $db->bind(':type', $type);

        if ($db->execute()) {
            echo true;
        } else {
            echo false;
        }
    }
}

if (isset($_POST['emoji'])) {
    $msg = $_POST['emoji'];
    $receiver = $_POST['receiver'];
    
    $db->query('INSERT INTO `messages`(`sender`, `receiver`, `message`, `type`) VALUES (:sender, :receiver, :msg, :type)');
    $db->bind(':sender', $_SESSION['user_id']);
    $db->bind(':receiver', $receiver);
    $db->bind(':msg', $msg);
    $db->bind(':type', 'emoji');

    if ($db->execute()) {
        echo true;
    } else {
        echo false;
    }
}