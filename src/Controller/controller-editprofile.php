<?php
include_once "../../config.php";
include_once "../Model/model-users.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-connexion.php');
    exit;
}


$errors = [];

$regexname = "/[a-zñÑ\-\_0-9áéíóúÁÉÍÓÚ]{3,20}/i";

function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Changement du thème
    if (isset($_POST['theme'])) {
        $_SESSION['theme'][0] = $_POST['theme'];
    }

    // Vérification du pseudo
    if (isset($_POST['pseudo'])) {
        if (!preg_match($regexname, $_POST['pseudo'])) {
            $errors['pseudo'] = 'Caractères non autorisé';
        }
        if (strlen($_POST['pseudo']) < 4 or empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'Le pseudo doit faire au moins 4 caractères';
        }
        if (strlen($_POST['pseudo']) >= 25) {
            $errors['pseudo'] = 'Le pseudo doit faire 25 caractères maximum';
        }
        if (Users::checkPseudoExist($_POST['pseudo']) and $_POST['pseudo'] != $_SESSION['user_pseudo']) {
            $errors['pseudo'] = 'Le pseudo est déjà utilisé';
        }
    }


    // Vérification de la description
    if (strlen($_POST['description']) > 250) {
        $errors['description'] = 'La description doit faire moins de 250 caractères';
    }

    // Vérification de l'image
    if (isset($_POST['profilepicture'])) {
    }


    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si aucune erreur sur l'input de description
    if (empty($errors['description'])) {

        // On édite la description
        if (isset($_POST['description'])) {

            $sql = "UPDATE `76_users` 
                SET `user_description` = :description
                WHERE `user_id` = :user_id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

            $stmt->execute();
        }
    }

    // Si aucune erreur sur l'input de description
    if (empty($errors['pseudo'])) {

        // On édite le pseudo 
        if ($_POST['pseudo'] != $_SESSION['user_pseudo']) {

            $sql = "UPDATE `76_users` 
            SET `user_pseudo` = :pseudo
            WHERE `user_id` = :user_id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':pseudo', safeInput($_POST['pseudo']), PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

            if ($stmt->execute())
                $_SESSION['user_pseudo'] = safeInput($_POST['pseudo']);
        }
    }



    // Si aucune erreur
    if (empty($errors) AND !empty($_FILES['profilepicture'])) {

        // On édite la photo
        $pic_name = uniqid() . '_' . basename($_FILES["profilepicture"]["name"]);
        $sql_directory = "users/" . $_SESSION['user_id'] . "/" . $pic_name;

        $sql = "UPDATE `76_users` 
        SET `user_avatar` = :avatar
        WHERE `user_id` = :user_id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':avatar', $sql_directory, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            // nous allons cibler le repertoire image de l'utilisateur
            $user_directory = '../../assets/img/users/' . $_SESSION['user_id'] . '/';

            // on va enregistrer notre image avec le même nom que celle dans notre bdd
            move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $user_directory . $pic_name);
        }
    }


    $pdo = '';
    header('Location: controller-profile.php');
    exit;
}


// var_dump($errors);
// var_dump($_FILES);
// var_dump($_POST);
include_once "../View/view-editprofile.php";
