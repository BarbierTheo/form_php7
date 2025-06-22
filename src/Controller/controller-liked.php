<?php
session_start();
include_once '../../config.php';
include_once '../Model/model-likes.php';


// Si l'user a déjà liké, alors on supprime le like
if (Likes::alreadyLiked($_GET['post'])) {
    $state = Likes::deleteLike($_GET['post'], $_SESSION['user_id']);

    // Si l'user n'a pas liké, alors on like
} else {
    $state = Likes::addLike($_GET['post'], $_SESSION['user_id']);
}

echo $state;