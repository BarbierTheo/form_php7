<?php

session_start();
require_once '../../config.php';
include_once '../../helpers/functionpost.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-connexion.php');
    exit;
}


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Requête pour chacun des posts qui s'affichera dans l'index
$sql = "SELECT `post_timestamp`, `post_description`, `pic_name`, `user_pseudo`,`user_id`, `post_id`, `user_avatar`  FROM `76_posts`
        NATURAL JOIN 76_pictures 
        NATURAL JOIN 76_users 
        WHERE `user_id` in (
        (SELECT group_concat(fav_id) from `76_favorites` 
        WHERE `user_id` = " . $_SESSION['user_id'] . " 
        GROUP BY `user_id`), " . $_SESSION['user_id'] . " )
        ORDER BY post_timestamp DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);


include_once '../../public/index.php';
