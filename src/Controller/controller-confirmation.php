<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: controller-profile.php');
    exit;
}





include_once '../View/view-confirmation.php' ?>
