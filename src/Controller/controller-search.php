<?php

include_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}

// var_dump($_GET['pseudo']);

if (isset($_GET['pseudo'])) {
    $searchName = $_GET['pseudo'] . "%";
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `pic_name`, `post_private` FROM `76_posts`
        NATURAL JOIN `76_pictures`  
        NATURAL JOIN `76_users`
        WHERE `user_pseudo` LIKE :pseudo;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pseudo', $searchName, PDO::PARAM_STR);

    $stmt->execute();

    $searchPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $pdo = '';

    var_dump($searchPosts);

}






include_once '../View/view-search.php';
