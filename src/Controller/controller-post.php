<?php



include_once '../../config.php';
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

    $sql = "SELECT * FROM 76_likes
            WHERE user_id = " . $_SESSION["user_id"] . " AND post_id = " . $uniquePost["post_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $like = true;
    } else {
        $like = false;
    }

    $sql = "SELECT count(like_id) as `likes`
            FROM 76_likes
            WHERE post_id = " . $uniquePost["post_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $countLikes = $stmt->fetch(PDO::FETCH_ASSOC);


    $sql = "SELECT count(com_id) as `comments`
            FROM 76_comments
            WHERE post_id = " . $uniquePost["post_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $countComment = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT *
            FROM 76_comments
            NATURAL JOIN 76_users
            WHERE post_id = " . $uniquePost["post_id"];

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    header('Location: controller-index.php');
    exit;
}




















include_once '../View/view-post.php';
