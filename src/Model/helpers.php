<?php

class Safe
{
    /**
     *  Supprime les espaces autour du texte, et empêche l'injection de script
     * 
     * @return input|string Version nettoyé de l'input
     * 
     */
    public static function input($string): string
    {
        if (!empty($string)) {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }
        return '';
    }
}