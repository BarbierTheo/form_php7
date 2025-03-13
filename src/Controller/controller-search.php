<?php

include_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si l'URL contient un utilisateur
if (isset($_GET['pseudo'])) {
    $searchName = $_GET['pseudo'] . "%";
    $sql = "SELECT `pic_name`, `post_private`, `user_id`, `post_id` FROM `76_posts`
        NATURAL JOIN `76_pictures`  
        NATURAL JOIN `76_users`
        WHERE `user_pseudo` LIKE :pseudo
        ORDER BY post_timestamp DESC;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pseudo', $searchName, PDO::PARAM_STR);
    $stmt->execute();
    $searchPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = '';

} else {
// Si l'URL ne contient pas d'utilisateur
    $sql = "SELECT `pic_name`, `user_id`, `post_id` FROM `76_posts`
        NATURAL JOIN `76_pictures`  
        NATURAL JOIN `76_users`
        WHERE `post_private` = 0
        ORDER BY post_timestamp DESC;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $searchPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = '';

}

include_once '../View/view-search.php';
