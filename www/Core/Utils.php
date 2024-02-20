<?php

namespace App\Core;

class Utils
{

    // public static function convertDate($dateOrigine, string $format = "j F Y") {
    //     setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

    //     // Essayez de créer un objet DateTime à partir de la date d'origine
    //     $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s.u", $dateOrigine);

    //     // Si la création avec l'heure échoue, essayez sans milliseconds
    //     if ($dateTime === false) {
    //         $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $dateOrigine);
    //     }
    //     // Si la création avec l'heure échoue, essayez sans heure
    //     if ($dateTime === false) {
    //         $dateTime = \DateTime::createFromFormat("Y-m-d", $dateOrigine);
    //     }

    //     // Si la création sans heure échoue, retournez une erreur
    //     if ($dateTime === false) {
    //         return "Erreur de conversion de la date.";
    //     }

    //     // Formater la date dans le format souhaité
    //     $dateFormatee = $dateTime->format($format);

    //     return $dateFormatee;
    // }

    // public static function convertDate($dateOrigine, string $format = "j F Y") {
    //     setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr_FR@euro', 'fr.UTF-8', 'fr_FR', 'fr');
    
    //     // Crée un objet DateTime à partir du format spécifié
    //     $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $dateOrigine);
    
    //     // Vérifie si la conversion a réussi
    //     if ($dateTime === false) {
    //         // Gère l'échec de la conversion
    //         return "Erreur de conversion de la date.";
    //     }
    
    //     // Formate la date selon le format souhaité
    //     return $dateTime->format($format);
    // }

    public static function convertDate($dateOrigine, string $format = "j F Y") {
        setlocale(LC_TIME, 'fr_FR.UTF8', 'fr_FR.UTF-8', 'fr_FR@euro', 'fr.UTF-8', 'fr_FR', 'fr');
        
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $dateOrigine);
        
        if ($dateTime === false) {
            return "Erreur de conversion de la date.";
        }
        
        // Tableau de correspondance des mois en anglais vers français
        $moisFrancais = [
            'January' => 'Janvier', 'February' => 'Février', 'March' => 'Mars',
            'April' => 'Avril', 'May' => 'Mai', 'June' => 'Juin',
            'July' => 'Juillet', 'August' => 'Août', 'September' => 'Septembre',
            'October' => 'Octobre', 'November' => 'Novembre', 'December' => 'Décembre'
        ];
        
        // Formatage de la date en anglais
        $dateEnAnglais = $dateTime->format($format);
        
        // Remplacement des mois anglais par les mois français
        $dateEnFrancais = str_replace(array_keys($moisFrancais), array_values($moisFrancais), $dateEnAnglais);
        
        return $dateEnFrancais;
    }

    public static function url_encode($string){
        return urlencode(mb_convert_encoding(strtolower($string), 'UTF-8'));
    }

    public static function url_decode($string){
        return mb_convert_encoding(urldecode(strtolower($string)), 'ISO-8859-1');
    }

}