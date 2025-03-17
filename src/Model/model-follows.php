<?php 


class Follows {

    
    /**
     * Vérifie si le user connecté follow l'utilisateur 
     * 
     * @param INT $user_id l'ID de l'utilisateur connecté
     * @param INT $user_id2 l'ID de l'utilisateur follow ou non
     * @return boolean $followed Résultat du follow si false non follow, si true follow ou même ID
     * 
     */
    public static function alreadyFollow($user_id, $user_id2)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
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
    
}