<?php

session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-connexion.php');
    exit;
}


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT `post_timestamp`, `post_description`, `pic_name`, `user_pseudo`,`user_id`, `post_id`  FROM `76_posts`
        NATURAL JOIN 76_pictures 
        NATURAL JOIN 76_users 
        WHERE `user_id` in (
            (SELECT group_concat(fav_id) from `76_favorites` 
            WHERE `user_id` = " . $_SESSION['user_id'] . " 
            GROUP BY `user_id`), " . $_SESSION['user_id'] . " )";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM 76_likes
        WHERE user_id = " . $_SESSION["user_id"] . " AND post_id = " . $allPosts[0]["post_id"];

$stmt = $pdo->prepare($sql);

$stmt->execute();

if ($stmt->fetch(PDO::FETCH_ASSOC)) {
    $like = true;
} else {
    $like = false;
}

$sql = "SELECT count(like_id) as `likes`
            FROM 76_likes
            WHERE post_id = " . $allPosts[0]["post_id"];

$stmt = $pdo->prepare($sql);

$stmt->execute();

$countLikes = $stmt->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT count(com_id) as `comments`
            FROM 76_comments
            WHERE post_id = " . $allPosts[0]["post_id"];

$stmt = $pdo->prepare($sql);

$stmt->execute();

$countComment = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT *
        FROM 76_comments
        NATURAL JOIN 76_users
        WHERE post_id = " . $allPosts[0]["post_id"];

$stmt = $pdo->prepare($sql);

$stmt->execute();

$allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdo = "";






// var_dump($allPosts);



include_once '../../public/index.php';
