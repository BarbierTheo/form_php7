<?php

session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération de l'avatar et de la description du profil de l'utilisateur
$sql = "SELECT `user_avatar`, `user_description` FROM `76_users` WHERE `user_id` = " . $_SESSION['user_id'];
$stmt = $pdo->query($sql);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupération de tous les posts de l'utilisateur
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_SESSION['user_id'] . " ORDER BY post_timestamp DESC";
$stmt = $pdo->query($sql);
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupération du nombre de publications, de follows et de followers
$sql = "SELECT count(post_id) as `posts`,
            (SELECT count(user_id) FROM 76_favorites
            WHERE fav_id = " . $_SESSION['user_id'] . " GROUP BY fav_id) as `followers`,
            (SELECT count(fav_id) FROM 76_favorites
            WHERE user_id = " . $_SESSION['user_id'] . " GROUP BY user_id) as `follows`
        FROM 76_posts
        WHERE user_id = " . $_SESSION['user_id'] . "
        GROUP BY user_id";


$stmt = $pdo->query($sql);
$countProfile = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdo = '';

include_once '../View/view-profile.php';
