<?php
session_start();
include_once '../../config.php';
include_once '../Model/model-comments.php';


$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "DELETE FROM `76_comments` WHERE com_id = " . $_GET['comment'];

$stmt = $pdo->prepare($sql);
$stmt->execute();

echo "delete";
