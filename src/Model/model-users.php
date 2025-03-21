<?php

class Users
{

    public static function checkPseudoExist($pseudo)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM `76_users` WHERE `user_pseudo` = :pseudo";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;
        $pdo = '';

        return $found;
    }
    public static function showProfile($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_avatar`, `user_pseudo`, `user_description` FROM `76_users` WHERE `user_id` = " . $_SESSION['user_id'];
        $stmt = $pdo->query($sql);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
        return $profile;

    }
}
