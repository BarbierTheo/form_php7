<?php
include_once '../../config.php';
include_once '../Model/model-likes.php';
include_once '../Model/model-comments.php';
include_once '../Model/model-follows.php';
session_start();

if (!isset($_SESSION['user_id']) OR !is_numeric($_GET['post'])) {
    header('Location: controller-index.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['comment']) AND !Comments::showOneComment($_GET['post'], $_GET['comment'], $pdo)) {
    header("Location: controller-post.php?post=" . $_GET['post']);
    exit;
}

// Requête pour récupérer toutes les informations d'un post pour vérifier qu'il existe bien
$sql = "SELECT * FROM 76_posts
WHERE post_id = " . $_GET['post'];
$stmt = $pdo->prepare($sql);
$stmt->execute();
$existantPost = $stmt->fetch(PDO::FETCH_ASSOC);



if (isset($_GET['post']) AND $existantPost) {
    // Récupère toutes les informations du post contenu dans l'URL si il existe
    $sql = "SELECT post_description, pic_name, user_pseudo, post_timestamp, user_id, post_id, user_avatar FROM 76_posts
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


// Ajout d'un commentaire au post
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

    // Gestion des erreurs dans l'ajout du commentaires
    if (isset($_POST['newComment'])) {
        if (empty($_POST['newComment'])) {
            $errors['newComment'] = "Rentrez un commentaire";
        } else if (strlen(safeInput($_POST['newComment'])) <= 3) {
            $errors['newComment'] = "Le commentaire doit faire au moins 3 caractères";
        }
    }

    if (empty($errors)) {

        // Ajout du commentaire validé
        $sql = "INSERT INTO `76_comments` (`com_text`, `post_id`, `user_id`, `com_timestamp`) VALUES
            ('" . ($_POST['newComment']) . "', " .  $_GET['post'] . ", " . $_SESSION['user_id'] . ", " . time() . " )";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header('location: controller-post.php?post=' . $_GET['post']);
    }
}



















include_once '../View/view-post.php';
