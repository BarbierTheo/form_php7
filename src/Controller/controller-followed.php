<?php
session_start();
include_once '../../config.php';
include_once '../Model/model-follows.php';


$followed = Follows::alreadyFollow($_SESSION['user_id'], $_GET['user']);


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Si l'user n'est pas déjà follow, donc on follow
if (!$followed) {

        $sql = "INSERT INTO `76_favorites` (`user_id`, `fav_id`) VALUES (" . $_SESSION['user_id'] . ", " . $_GET['user'] . ")";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        echo ("followed") ;
        

        // Si l'user est déjà follow, donc on unfollow
} else if($followed) {

        $sql = "DELETE FROM `76_favorites` WHERE `user_id` = " . $_SESSION['user_id'] . " AND `fav_id` = " . $_GET['user'];

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        echo ("unfollowed") ;
        
}
