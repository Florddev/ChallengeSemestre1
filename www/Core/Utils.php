<?php

namespace App\Core;

class Utils
{

    public static function convertDate($dateOrigine, string $format = "j F Y") {
        setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

        // Essayez de créer un objet DateTime à partir de la date d'origine
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s.u", $dateOrigine);

        // Si la création avec l'heure échoue, essayez sans milliseconds
        if ($dateTime === false) {
            $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $dateOrigine);
        }
        // Si la création avec l'heure échoue, essayez sans heure
        if ($dateTime === false) {
            $dateTime = \DateTime::createFromFormat("Y-m-d", $dateOrigine);
        }

        // Si la création sans heure échoue, retournez une erreur
        if ($dateTime === false) {
            return "Erreur de conversion de la date.";
        }

        // Formater la date dans le format souhaité
        $dateFormatee = $dateTime->format($format);

        return $dateFormatee;
    }

    public static function url_encode($string){
        return urlencode(mb_convert_encoding(strtolower($string), 'UTF-8'));
    }

    public static function url_decode($string){
        return mb_convert_encoding(urldecode(strtolower($string)), 'ISO-8859-1');
    }

}