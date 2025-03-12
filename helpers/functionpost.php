<?php



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

function showAllComments($post_id, $pdo)
{

    $sql = "SELECT `com_text`, `user_id`, `post_id`, `com_id`, `user_pseudo`
        FROM 76_comments
        NATURAL JOIN 76_users
        WHERE post_id = " . $post_id;

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = '';
    return $allComments;
}
