<?php

session_start();
require_once '../../config.php';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupère l'avatar et la description de l'utilisateur contenu dans l'URL
$sql = "SELECT `user_avatar`, `user_description` FROM `76_users` WHERE `user_id` = " . $_GET['user'];
$stmt = $pdo->query($sql);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);



// Récupère le pseudo de l'utilisateur pour vérifier qu'il existe bien
$sql = "SELECT `user_pseudo` FROM `76_users` WHERE `user_id` = " . $_GET['user'];
$stmt = $pdo->query($sql);
$userExist = $stmt->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['user_id']) or !isset($_GET['user']) or !$userExist) {
    header('Location: controller-index.php');
    exit;
}

if ($_SESSION['user_id'] == $_GET['user']) {
    header('Location: controller-profile.php');
    exit;
}

// Récupère toutes les informations des posts de l'utilisateur contenu dans l'URL
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_GET['user'] . " ORDER BY post_timestamp DESC";
$stmt = $pdo->query($sql);
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Récupère le nombre de publications, de follows et de followers de l'utilisateur contenu dans l'URL
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

include_once '../View/view-otherprofile.php';
