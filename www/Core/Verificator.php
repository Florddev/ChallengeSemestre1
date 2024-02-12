<?php

namespace App\Core;

class Verificator {

    public function checkForm($config, $data, &$errors = []): bool {
        if(count($config["inputs"]) != count($data)){
            die("Tentative de Hack");
        } else {
            //CSRF => Important
            foreach ($config["inputs"] as $name=>$input){
                if(!isset($data[$name])){
                    die("Tentative de Hack");
                }



                // Vérification de la présence des champs requis
                if ($data[$name] == "" && isset($input['attrs']['required']) && $input['attrs']['required'] === 'true') {
                    $errors[$name][] = "Le champ $name est requis.";
                }
                // Vérification de la longueur minimale
                if (isset($input['minlen']) && strlen($data[$name]) < $input['minlen']) {
                    $errors[$name][] = "La longeur minimal doit être de " . $input['minlen'] . " caratères.";
                }
                // Vérification de la longueur maximale
                if (isset($input['maxlen']) && strlen($data[$name]) > $input['maxlen']) {
                    $errors[$name][] = "La longeur maximal doit être de " . $input['maxlen'] . " caratères.";
                }
                if (isset($input['confirm'])){
                    if($data[$input['confirm']] !== $data[$name]){
                        $errors[$name][] = "Les valeurs des deux champs ne correspondent pas.";
                    }
                }

                if(isset($input["attrs"]["type"])){
                    // Si c'est un email, vérifier que le format est correct
                    if($input["attrs"]["type"] == "email" && !self::checkEmail($data[$name])){
                        $errors[$name][]="Email incorrect";
                    }

                    if ($input["attrs"]["type"] == "password") {
                        if (!empty($data[$name])) {
                            // Si c'est un mot de passe, vérifier que le format est correct
                            if((!isset($input["verify"]) || $input["verify"]) && !self::checkPassword($data[$name])){
                                $errors[$name][]="Le mot de passe doit contenir au moins 8 caractères dont majuscule, minuscule et chiffre";
                            }
                        }
                    }
                }
                // Autres validations nécessaires (par exemple, email, confirmation de mot de passe, etc.)
                // ...
            }
        }
        return empty($errors);
    }

    public static function checkPassword(String $password): bool
    {
        return (
            strlen($password) >= 8 &&
            preg_match("#[a-z]#", $password) &&
            preg_match("#[A-Z]#", $password) &&
            preg_match("#[0-9]#", $password)
        );
    }

    public static function checkEmail(String $email): bool {
        return (filter_var($email, FILTER_VALIDATE_EMAIL));
    }
}