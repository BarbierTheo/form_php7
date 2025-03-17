<?php

class Likes
{

    /**
     * Récupère tous les utilisateurs (pseudo, avatar et ID) qui ont liké un post
     * 
     * @param INT $post_id l'ID du post
     * @return array $likesFunction Tableau de tous les likes
     * 
     */
    public static function showAllLikes(INT $post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user_pseudo`, `user_avatar`, `user_id` FROM `76_likes` NATURAL JOIN `76_users` WHERE `post_id` = " . $post_id;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $likesFunction = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = '';
        return $likesFunction;
    }




    /**
     * Permet de savoir si une publication a déjà été liké par l'utilisateur connecté
     * 
     * @param INT $post_id l'ID du post
     * @return boolean $like Vrai si liké par l'utilisateur connecté
     * 
     */
    public static function alreadyLiked($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM 76_likes
        WHERE user_id = " . $_SESSION["user_id"] . " AND post_id = " . $post_id;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $like = true;
        } else {
            $like = false;
        }

        $pdo = '';
        return $like;
    }

    /**
     * Permet de compter les likes d'une publication
     * 
     * @param INT $post_id l'ID du post
     * @return INT $countLikes Nombres de likes sur le post
     * 
     */
    public static function showLikes($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(like_id) as `likes`
            FROM 76_likes
            WHERE post_id = " . $post_id;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $countLikes = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = '';
        return $countLikes;
    }
}
