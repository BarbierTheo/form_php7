<?php


/**
 * Permet de savoir si une publication a déjà été liké par l'utilisateur connecté
 * 
 * @param INT $post_id l'ID du post
 * @return boolean $like Vrai si liké par l'utilisateur connecté
 * 
 */
function alreadyLiked($post_id, $pdo)
{

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
function showLikes($post_id, $pdo)
{

    $sql = "SELECT count(like_id) as `likes`
            FROM 76_likes
            WHERE post_id = " . $post_id;

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $countLikes = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo = '';
    return $countLikes;
}

/**
 * Permet de compter les commentaires d'une publication
 * 
 * @param INT $post_id l'ID du post
 * @return INT $countComment Nombres de commentaires sur le post
 * 
 */
function showComments($post_id, $pdo)
{

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
function showAllComments($post_id, $pdo)
{

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
 * Récupère tous les utilisateurs qui ont liké un post
 * 
 * @param INT $post_id l'ID du post
 * @return array $likesFunction Tableau de tous les likes
 * 
 */
function showAllLikes($post_id, $pdo)
{
    $sql = "SELECT `user_pseudo`, `user_avatar`, `user_id` FROM `76_likes` NATURAL JOIN `76_users` WHERE `post_id` = " . $post_id;

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $likesFunction = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = '';
    return $likesFunction;
}

/**
 * Vérifie si le user connecté follow l'utilisateur 
 * 
 * @param INT $user_id l'ID de l'utilisateur connecté
 * @param INT $user_id2 l'ID de l'utilisateur follow ou non
 * @return boolean $followed Résultat du follow si vide non follow
 * 
 */
function alreadyFollow($user_id, $user_id2, $pdo)
{
    if ($user_id == $user_id2) {
        $followed = true;
    } else {
        $sql = "SELECT * FROM `76_favorites` WHERE `user_id` = " . $user_id . " AND `fav_id` = " . $user_id2 . ";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $follow = $stmt->fetch(PDO::FETCH_ASSOC);
        $follow == null ? $followed = false : $followed = true;
    }
    $pdo = '';
    return $followed;
}
