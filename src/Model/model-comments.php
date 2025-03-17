<?php

class Comments
{

    /**
     * Permet de compter les commentaires d'une publication
     * 
     * @param INT $post_id l'ID du post
     * @return INT $countComment Nombres de commentaires sur le post
     * 
     */
    public static function showComments($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT count(com_id) as `comments`
        FROM 76_comments
        WHERE post_id = " . $post_id;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $countComment = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = '';
        return $countComment;
    }

    /**
     * Récupère tous les commentaires d'un post et leurs utilisateurs
     * 
     * @param INT $post_id l'ID du post
     * @return array $allComments Tableau de tous les commentaires
     * 
     */
    public static function showAllComments($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `com_text`, `user_id`, `post_id`, `com_id`, `user_pseudo`
        FROM 76_comments
        NATURAL JOIN 76_users
        WHERE post_id = " . $post_id  . " ORDER BY com_timestamp";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = '';
        return $allComments;
    }

    /**
     * Récupère un commentaire unique d'un post
     * 
     * @param INT $post_id l'ID du post
     * @param INT $com_id l'ID du commentaire
     * @return $comment Commentaire sélectionné
     * 
     */
    public static function showOneComment($post_id, $com_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `com_text`, `user_id`, `post_id`, `com_id`, `user_pseudo`
        FROM 76_comments
        NATURAL JOIN 76_users
        WHERE post_id = " . $post_id  . " AND com_id = " . $com_id . ";";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $comment = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = '';
        return $comment;
    }
}
