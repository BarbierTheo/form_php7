<?php

require_once '../../config.php';

$regexname = "/^[a-z ,.'-]+$/i";
$classicregex = "/^(?=.{3,20}$)(?![_.-])(?!.*[_.-]{2})[a-zA-Z0-9_-]+([^._-])$/";
$dateregex = "/^((19\d{2})|(20\d{2}))-(((02)-(0[1-9]|[1-2][0-9]))|(((0(1|[3-9]))|(1[0-2]))-(0[1-9]|[1-2][0-9]|30))|((01|03|05|07|08|10|12)-(31)))$/";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // var_dump($_POST);
    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = "Rentrez un nom";
        } else if (!preg_match($regexname, $_POST['lastname'])) {
            $errors['lastname'] = "Caractères non valide";
        }
    }

    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Rentrez un prénom";
        } else if (!preg_match($regexname, $_POST['firstname'])) {
            $errors['firstname'] = "Caractères non valide";
        }
    }

    if (isset($_POST['pseudo'])) {
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = "Rentrez un prénom";
        } else if (!preg_match($classicregex, $_POST['pseudo'])) {
            $errors['pseudo'] = "Choisissez un pseudo en 3 et 20 caractères, sans caractères trop particuliers";
        }
    }

    if (isset($_POST['birthdate'])) {
        if (empty($_POST['birthdate'])) {
            $errors['birthdate'] = "Rentrez votre date de naissance";
        } else if (!preg_match($dateregex, $_POST['birthdate'])) {
            $errors['birthdate'] = "Date invalide";
        }
    }

    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) {
            $errors['mail'] = "Rentrez votre adresse mail";
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Adresse mail invalide";
        }
    }

    if (isset($_POST['password1'])) {
        if (empty($_POST['password1'])) {
            $errors['password1'] = "Rentrez votre mot de passe";
        }
    }

    if (isset($_POST['password2'])) {
        if (empty($_POST['password2'])) {
            $errors['password2'] = "Confirmez votre mot de passe";
        } else if ($_POST['password1'] != $_POST['password2']) {
            $errors['password1'] = "Mot de passe non similaire";
            $errors['password2'] = "Mot de passe non similaire";
        }
    }

    if (!isset($_POST['genre'])) {
        $errors['genre'] = "Acceptez les conditions d'utilisations";
    }

    if (!isset($_POST['conditions'])) {
        $errors['conditions'] = "Acceptez les conditions d'utilisations";
    }

    if (empty($errors)) {
        // connexion BDD
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        // options avancées
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // requête SQL création users avec marqueur nominatifs
        $sql = "INSERT INTO
                `76_users` (
                    `user_gender`,
                    `user_lastname`,
                    `user_firstname`,
                    `user_pseudo`,
                    `user_birthdate`,
                    `user_mail`,
                    `user_password`
                ) VALUES (
                    :gender,
                    :lastname,
                    :firstname,
                    :pseudo,
                    :birthdate,
                    :mail,
                    :password
                )";


        function safeInput($string){
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }


        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':gender', safeInput($_POST['genre']), PDO::PARAM_STR);
        $stmt->bindValue(':lastname', safeInput($_POST['lastname']), PDO::PARAM_STR);
        $stmt->bindValue(':firstname', safeInput($_POST['firstname']), PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', safeInput($_POST['pseudo']), PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', safeInput($_POST['birthdate']), PDO::PARAM_STR);
        $stmt->bindValue(':mail', safeInput($_POST['mail']), PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($_POST['password1'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        if($stmt->execute()){
            header("Location: controller-confirmation.php");
            exit;
        }
    }
}

include_once '../View/view-inscription.php';
