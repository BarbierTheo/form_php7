<?php

session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-connexion.php');
    exit;
}

include_once '../../public/index.php';