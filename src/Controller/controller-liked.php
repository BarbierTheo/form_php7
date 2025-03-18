<?php

include_once '../../config.php';

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT count(*) FROM `76_favorites`
        WHERE user_id = 15 AND fav_id = 17";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$liked = $stmt->fetch(PDO::FETCH_ASSOC);


echo json_encode($liked);
