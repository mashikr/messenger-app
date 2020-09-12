<?php

require_once '../classes/Database.php';
$db = new Database();
require_once '../includes/functions.php';

if(isset($_POST['receiver'])) {
    if (unSeenMsg($_SESSION['user_id'], $_POST['receiver'])) {
        fetchMessages($_POST['receiver']);
    } else {
        echo false;
    }
    
}

if(isset($_POST['rec'])) {
   
    fetchMessages($_POST['rec']);
    
}

if (isset($_POST['chat'])) {
    searchChat($_POST['chat'], $_POST['chat']);
}