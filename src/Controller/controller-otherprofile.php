<?php

session_start();
require_once '../../config.php';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_GET['user'];

$stmt = $pdo->query($sql);

$userExist = $stmt->fetch(PDO::FETCH_ASSOC);


if (!isset($_SESSION['user_id']) OR !isset($_GET['user']) OR !$userExist) {
    header('Location: controller-index.php');
    exit;
}

if ($_SESSION['user_id'] == $_GET['user']){
    header('Location: controller-profile.php');
    exit;
}


$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_GET['user'] . " ORDER BY post_timestamp DESC";


$stmt = $pdo->query($sql);

$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

// var_dump($allPosts);

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT count(post_id) as `posts`,
            (SELECT count(user_id) FROM 76_favorites
            WHERE fav_id = " . $_GET['user'] . " GROUP BY fav_id) as `followers`,
            (SELECT count(fav_id) FROM 76_favorites
            WHERE user_id = " . $_GET['user'] . " GROUP BY user_id) as `follows`,
            user_pseudo
            FROM 76_posts
            NATURAL JOIN 76_users
            WHERE user_id = " . $_GET['user'] . "
            GROUP BY user_id";


$stmt = $pdo->query($sql);

$countProfile = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

// var_dump($_GET);
// var_dump($countProfile);

include_once '../View/view-otherprofile.php';