<?php
include_once '../../config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: controller-profile.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['login'])) {
        if (empty($_POST['login'])) {
            $errors['login'] = "Rentrez votre pseudo ou votre mail";
        }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = "Rentrez votre mot de passe";
        }
    }

    if (!empty($_POST['login']) && !empty($_POST['password'])) {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM 76_users WHERE user_pseudo = :login OR user_mail = :login;";


        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':login', $_POST['login'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            $errors['connexion'] = 'Identifiant ou mot de passe inccorect';
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                unset($_SESSION['user_password']);
                header('Location: controller-profile.php');
                exit;
            } else {
                $errors['connexion'] = "Identifiant ou mot de passe incorrect";
            }
        }
    }
}

include_once '../View/view-connexion.php';
