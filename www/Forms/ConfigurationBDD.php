<?php
namespace App\Forms;
class ConfigurationBDD
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                "attrs"=> [
                    "method"=>"POST",
                    "action"=>"/",
                    "class"=>"form form-floating",
                    "id"=>"form-begin-to-install",
                ],
                "submit"=>"Valider"
             ],
            "inputs"=>[
                "db_configuration"=>[
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"hidden"
                    ],
                ],
                "db_name"=>[
                    "label"=>"Nom de la base de données",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "minlen"=>3,
                    "maxlen"=>50,
                    "initOnError"=>true
                ],
                "db_user"=>[
                    "label"=>"Identifiant",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "initOnError"=>true
                ],
                "db_password"=>[
                    "label"=>"Mot de passe",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"password",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>false,
                    ],
                    "verify"=>false,
                    "initOnError"=>false
                ],
                "db_host"=>[
                    "label"=>"Adresse de la base de données",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                    ],
                    "initOnError"=>true
                ],
                "db_port"=>[
                    "label"=>"Port de la base de données",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"number",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "required"=>true,
                        "min"=>0,
                        "max"=>65535,
                    ],
                    "initOnError"=>true
                ],
                "db_type"=>[
                    "label"=>"Type de base de données",
                    "balise"=>"select",
                    "attrs"=> [
                        "class"=>"form-field",
                        "required"=>true,
                    ],
                    "options"=> [
                        ""=>[
                            "attrs"=> [
                                "value"=>"",
                                "selected"=>"",
                                "disabled"=>"",
                                "hidden"=>"",
                            ]
                        ],
                        "MySQL"=>[
                            "attrs"=> [
                                "value"=>"mysql"
                            ]
                        ],
                        "PostgreSQL"=>[
                            "attrs"=> [
                                "value"=>"pgsql",
                            ]
                        ],
                        "SQL Server"=>[
                            "attrs"=> [
                                "value"=>"sqlsrv",
                            ]
                        ],
                        "Oracle"=>[
                            "attrs"=> [
                                "value"=>"oci",
                            ]
                        ],
                    ],
                    "initOnError"=>true
                ],
                "db_prefix"=>[
                    "label"=>"Prefix des tables",
                    "balise"=>"input",
                    "attrs"=> [
                        "type"=>"text",
                        "class"=>"form-field" ,
                        "placeholder"=>"",
                        "value"=>"wisp_",
                        "required"=>false,
                    ],
                    "initOnError"=>true
                ],
            ]
        ];
    }
}