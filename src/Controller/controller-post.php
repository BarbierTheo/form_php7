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

if (isset($_GET['post']) and $existantPost) {

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

$errors = [];

function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['newComment'])) {
        if (empty($_POST['newComment'])) {
            $errors['newComment'] = "Rentrez un commentaire";
        } else if (strlen(safeInput($_POST['newComment'])) <= 3) {
            $errors['newComment'] = "Le commentaire doit faire au moins 3 caractères";
        }
    }

    if (empty($errors)) {

        $sql = "INSERT INTO `76_comments` (`com_text`, `post_id`, `user_id`) VALUES
            ('" . ($_POST['newComment']) . "', " .  $_GET['post'] . ", " . $_SESSION['user_id'] . " )";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // var_dump($sql);
    }
}



















include_once '../View/view-post.php';
