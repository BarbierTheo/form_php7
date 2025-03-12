<?php



include_once '../../config.php';
include_once '../../helpers/functionpost.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/index.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM 76_posts
WHERE post_id = " . $_GET['post'];

$stmt = $pdo->prepare($sql);

$stmt->execute();

$existantPost = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['post']) AND $existantPost) {

    $sql = "SELECT post_description, pic_name, user_pseudo, post_timestamp, user_id, post_id FROM 76_posts
            NATURAL JOIN 76_pictures
            NATURAL JOIN 76_users
            WHERE post_id = :pic_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pic_id', $_GET['post'], PDO::PARAM_STR);

    $stmt->execute();

    $uniquePost = $stmt->fetch(PDO::FETCH_ASSOC);

} else {
    header('Location: controller-index.php');
    exit;
}




















include_once '../View/view-post.php';
