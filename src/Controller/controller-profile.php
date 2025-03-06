<?php

session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_SESSION['user_id'];


$stmt = $pdo->query($sql);

$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

// var_dump($allPosts);

include_once '../View/view-profile.php';
