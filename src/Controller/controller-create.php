<?php
include_once '../../config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: controller-index.php');
    exit;
}

$errors = [];
$classicregex = "/^[^#%^&*\][;}{=+\\|><\`~]*$/";

function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['description'])) {
        if (!preg_match($classicregex, $_POST['description'])) {
            $errors['description'] = "Caractères non valide";
        }
    }
    if ($_FILES['pic']['error'] == 4) {
        $errors['pic'] = "Veuillez choisir une photo";
    }

    var_dump($_FILES);

    if (empty($errors)) {
        // Direction du fichier et rename
        $target_dir = "../../assets/img/users/" . $_SESSION["user_id"] . "/";
        $newName = uniqid() . "_" . basename($_FILES["pic"]["name"]);
        $target_file = $target_dir . $newName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (is_dir($target_dir)) {
            echo "Le dossier existe déjà.";
        } else {
            mkdir($target_dir);
        }


        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["pic"]["tmp_name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ajout du post à la base de données
        $sql = "INSERT INTO `76_posts` (`post_description`, `post_timestamp`, `user_id`) VALUES
                    (:description,
                     :date,
                     :user_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
        $stmt->bindValue(':date', time(), PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        $stmt->execute();

        $post_id = $pdo->lastInsertId();

        // Ajout de l'image à la base de données
        $sql = "INSERT INTO `76_pictures` (`pic_name`,`post_id`) VALUES
            (:pic_name, :post_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':pic_name', htmlspecialchars($newName), PDO::PARAM_STR);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: controller-profile.php");
            exit;
        }

        $pdo = '';
    }
}



include_once '../View/view-create.php';
