<?php
include_once '../../config.php';
session_start();

if (!isset($_SESSION['user_id']) OR $_GET['post'] == "") {
    header('Location: controller-connexion.php');
    exit;
}


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include '../../helpers/functionpost.php';

// Requête pour récupérer l'image et l'ID du user
$sql = "SELECT `user_id`, `pic_name`, `post_id` FROM `76_posts`
        NATURAL JOIN 76_pictures 
        NATURAL JOIN 76_users 
        WHERE `post_id` = " . $_GET['post'];

$stmt = $pdo->prepare($sql);

$stmt->execute();

$postToDelete = $stmt->fetch(PDO::FETCH_ASSOC);


// On vérifie que le user est bien le propriétaire du post
if ($_SESSION['user_id'] != $postToDelete['user_id']) {
    header("Location: controller-index.php");
    exit;
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // On supprime le post qui supprimera le reste en cascade
        $sql = "DELETE FROM `76_posts` 
        WHERE post_id = " . $_GET['post'];

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        header('location: controller-index.php');
        exit;
    }
}

include_once '../View/view-deletepost.php';
