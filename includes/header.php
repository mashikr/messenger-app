<?php 
session_start();
ob_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /messenger');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/img/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nova+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/profile.css">
    <title>Messenger | Profile</title>
</head>
<body>