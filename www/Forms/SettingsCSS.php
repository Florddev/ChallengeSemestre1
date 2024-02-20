<?php

namespace App\Forms;

class SettingsCSS
{
    public function getConfig(): array
    {
        return [
            "config" => [
                "attrs" => [
                    "method" => "POST",
                    "action" => "/", 
                    "class" => "form form-floating",
                    "id" => "SettingsCSS",        
                      ],
                "submit" => "Valider"
            ],
            "inputs" => [
                "css:primary" => [
                    "label" => "Couleur principale",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "color",
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "initOnError" => true
                ],
                "css:secondary" => [
                    "label" => "Couleur secondaire",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "color",
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "initOnError" => true
                ],
                "css:tercery" => [
                    "label" => "Couleur tertiaire",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "color",
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "initOnError" => true
                ],
                "css:main-font1" => [
                    "label" => "Police principale",
                    "balise" => "select",
                    "attrs" => [
                        "class" => "form-field",
                        "required" => true,
                    ],
                    "options" => [
                        "" => [
                            "attrs" => [
                                "value" => "",
                                "selected" => "",
                                "disabled" => "",
                                "hidden" => "",
                            ],
                            "text" => "Sélectionnez une police",
                        ],
                        "Plus Jakarta Sans" => [
                            "attrs" => [
                                "value" => "Plus Jakarta Sans"
                            ],
                            "text" => "Plus Jakarta Sans",
                        ],
                        "Arial" => [
                            "attrs" => [
                                "value" => "Arial"
                            ],
                            "text" => "Arial",
                        ],
                        "Roboto" => [
                            "attrs" => [
                                "value" => "Roboto"
                            ],
                            "text" => "Roboto",
                        ],
                        "Helvetica" => [
                            "attrs" => [
                                "value" => "Helvetica"
                            ],
                            "text" => "Helvetica",
                        ],
                        "Times New Roman" => [
                            "attrs" => [
                                "value" => "Times New Roman"
                            ],
                            "text" => "Times New Roman",
                        ],
                    ],
                    "initOnError" => true
                ],                
                "css:main-radius" => [
                    "label" => "Radius",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "text", // Utilisation du type number
                        "class" => "form-field",
                        "required" => true,
                        "min" => 0, // Valeur minimale (ajustez selon vos besoins)
                        "max" => 50, // Valeur maximale (ajustez selon vos besoins)
                        "step" => 1, // Permet seulement les nombres entiers
                        "pattern" => ".*px$", 
                    ],
                    "initOnError" => true
                ],
                "css:transition-duration" => [
                    "label" => "Durée de transition",
                    "balise" => "input",
                    "attrs" => [
                        "type" => "text", 
                        "class" => "form-field",
                        "required" => true,
                        "min" => 0, 
                        "step" => 0.1, 
                        "max" => 10,
                        "pattern" => ".*s$", 
                    ],
                    "initOnError" => true
                ],
            ]
        ];
    }
}
