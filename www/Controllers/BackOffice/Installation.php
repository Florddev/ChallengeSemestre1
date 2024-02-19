<?php

namespace App\Controllers\BackOffice;

use App\Core\Verificator;
use App\Core\View;
use App\Enums\Role;
use App\Enums\Status;
use App\Forms\BeginInstallation;
use App\Forms\ConfigurationBDD;
use App\Forms\FinishInstallation;
use App\Forms\UserInsert;
use App\Forms\UserLogin;
use App\Models\Pages;
use App\Models\Settings;
use App\Models\User;

class Installation
{
    public const CONFIG_FILE = "wisp_configs.php";
    private bool $configs_exist = false;
    private bool $configs_complet = false;
    private bool $configs_admin_created = true;

    public function __construct()
    {
        $this->configs_exist = file_exists(self::CONFIG_FILE);
    }

    public function SiteIsAlreadyInstalled(): bool
    {
        if ($this->configs_exist) {
            require self::CONFIG_FILE;

            if (
                defined('DB_NAME') && defined('DB_USER') && defined('DB_PASSWORD') &&
                defined('DB_HOST') && defined('DB_PORT') && defined('DB_TYPE') &&
                defined('DB_PREFIX')
            ) {
                $this->configs_complet = true;

                $dsn = $this->getDsnFromDbType(DB_TYPE);

                try {
                    $pdo = new \PDO($dsn, DB_USER, DB_PASSWORD);

                    // Préparation de la requête SQL
                    switch (DB_TYPE) {
                        case "mysql":
                            $sql = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_type = 'BASE TABLE'";
                            break;
                        case "pgsql":
                            $sql = "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = 'public' AND table_type = 'BASE TABLE'";
                            break;
                        case "sqlsrv":
                            $sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE'";
                            break;
                        case "oci":
                            $sql = "SELECT COUNT(*) FROM user_tables";
                            break;
                        default:
                            throw new \Exception("Type de base de données non pris en charge : " . DB_TYPE);
                    }

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(); // Exécution de la requête préparée
                    $result = $stmt->fetchColumn(); // Récupération du résultat

                    if(!($result > 0)){
                        $this->createTables($pdo, DB_PREFIX);
                        return false;
                    } else {
                        $users = User::populateAllBy([]);
                        if(empty($users)){
                            $this->configs_admin_created = false;
                            return false;
                        }
                        return true;
                    }
                } catch (\PDOException $e) {
                    // Logguer l'erreur ou retourner un code d'erreur spécifique
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getDsnFromDbType(string $dbType): string
    {
        $dsn = null;
        switch (DB_TYPE) {
            case "mysql":
                $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME; break;
            case "pgsql":
                $dsn = "pgsql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT; break;
            case "sqlsrv":
                $dsn = "sqlsrv:Server=".DB_HOST.";Database=".DB_NAME; break;
            case "oci":
                $dsn = "oci:dbname=//".DB_HOST.":".DB_PORT."/".DB_NAME; break;
        }
        return $dsn;
    }

    private function createTables(\PDO $pdo, string $prefix)
    {
        // Liste des tables à vérifier/créer
        $tablesToCreate = $this->getSqlTable($prefix);

        foreach ($tablesToCreate as $table => $query) {
            // Vérifier si la table existe
            $sqlCheck = "SELECT COUNT(*) FROM information_schema.tables WHERE table_name = ?";
            $stmtCheck = $pdo->prepare($sqlCheck);
            $stmtCheck->execute([$table]);
            $tableExists = (bool) $stmtCheck->fetchColumn();

            if (!$tableExists) {
                // Créer la table si elle n'existe pas
                $pdo->exec($query["query"]);

//                if(!empty($query["insert"])) {
//                    sleep(5);
//                    $dsn = $this->getDsnFromDbType(DB_TYPE);
//                    try {
//                        $pdo2 = new \PDO($dsn, DB_USER, DB_PASSWORD);
//                        $pdo2->exec($query["insert"]);
//                    } catch (\PDOException $e) {
//                        echo "Erreur de connexion à la base de données : " . $e->getMessage();
//                    }
//                }
            }
        }
    }

    public function InstallWebSite(): void {
        if(isset($_REQUEST["db_configuration"]) || !$this->configs_admin_created){
            if(isset($_REQUEST["db_configuration"])){
                $this->InstallBDD();
            }
            $this->CreateAdministrator();
            return;
        } if(isset($_REQUEST["begin_to_install"]) || $this->configs_complet){
            $config = (new ConfigurationBDD())->getConfig();
            $configBDD = new View("BackOffice/Installation/configuration_bdd", 'install');
            $configBDD->assign("configBDDForm", $config);
        } else {
            $config = (new BeginInstallation())->getConfig();
            $beginInstall = new View("BackOffice/Installation/welcome", 'install');
            $beginInstall->assign("welcomeForm", $config);
        }
    }

    private function CreateAdministrator(): void
    {
        $config = (new FinishInstallation())->getConfig();

        $errors = [];

        if(isset($_REQUEST["finish_installation"])){
            if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"])
            {
                $verification = new Verificator();
                if($verification->checkForm($config, $_REQUEST, $errors))
                {
                    $newUser = new User();
                    $newUser->setLogin($_REQUEST["login"]);
                    $newUser->setEmail($_REQUEST["email"]);
                    $newUser->setPassword($_REQUEST["password"]);
                    $newUser->setStatus(Status::Validated->value);
                    $newUser->setRole(Role::Admin->value);
                    $newUser->save();

                    $siteNameSetting = new Settings();
                    $siteNameSetting->setKey("site:name");
                    $siteNameSetting->setValue($_REQUEST["site_name"]);
                    $siteNameSetting->save();

                    $siteNavbar = new Settings();
                    $siteNavbar->setKey("site:navbar");
                    $siteNavbar->setValue("");
                    $siteNavbar->save();

                    $siteFooter = new Settings();
                    $siteFooter->setKey("site:footer");
                    $siteFooter->setValue("");
                    $siteFooter->save();

                    $this->InsertDefaultData();
                    $this->InsertDefaultSettings();

                    $beginInstall = new View("BackOffice/Installation/installation_finished", 'install');
                    $beginInstall->assign("loginCreated", $_REQUEST["login"]);
                    return;
                }
            }
        }

        $createUser = new View("BackOffice/Installation/create_user", 'install');
        $createUser->assign("createUser", $config);
        $createUser->assign("errorsForm", $errors);
    }

    private function InsertDefaultData(): void
    {
        $page = new Pages();
        $page->setUrl("/");
        $page->setTitle("Accueil");
        $page->setContent('<div class="container editable sortable-element" data-sortable="true" style="height: 100vh;" draggable="false"><div class="container editable sortable-element align-horizontal-start align-vertical-center" data-sortable="true" style="padding-right: 0px;" draggable="false"><div class="row editable sortable-element" data-sortable="true" style="display: flex; justify-content: space-between; align-items: center; padding-left: 0px; padding-right: 0px;" draggable="false"><div class="col-sm-8 editable sortable-element" data-sortable="true" draggable="false" style="width: 50%;"><p class="editable editable-text" draggable="false" contenteditable="false" style="text-transform: uppercase; font-size: 14px; color: rgb(110, 112, 118); font-weight: 500; letter-spacing: 1.5px;">centre de ressource</p><div class="editable editable-text" draggable="false" contenteditable="false" style="font-size: 64px; font-weight: 800; color: rgb(38, 38, 58); text-transform: none;">WispBlog - CMF,&nbsp;<div>développement web et outils technologiques</div></div></div><div class="col-sm-4 editable sortable-element" data-sortable="true" draggable="false" style="width: 50%;"><div class="editable image-container" draggable="false" style="max-height: 100%; margin-left: auto; margin-right: 0px;"><img src="https://cdn.dribbble.com/users/3873964/screenshots/14092691/media/d825b72de91e141ce5a66875adbe006d.gif" alt="myimage" draggable="false"></div></div></div></div></div><div class="container editable sortable-element" data-sortable="true" draggable="false" style="padding: 0px;"></div><div class="container editable sortable-element" data-sortable="true" draggable="false" style="padding: 0px;"></div>');
        $page->setMetaDescription("Meta description");
        $page->setIdCreator(1);
        $page->save();
    }

    private function InsertDefaultSettings(): void 
    {
        $settingsCssPrimary = new Settings(); 
        $settingsCssPrimary->setKey("css:primary");
        $settingsCssPrimary->setValue("#FF0000");
        $settingsCssPrimary->save();

        $settingsCssSecondary = new Settings();
        $settingsCssSecondary->setKey("css:secondary");
        $settingsCssSecondary->setValue("#00FF00");
        $settingsCssSecondary->save();

        $settingsCssTercery = new Settings();
        $settingsCssTercery->setKey("css:tercery");
        $settingsCssTercery->setValue("#0000FF");
        $settingsCssTercery->save();

        $settingsCssMainFont1 = new Settings();
        $settingsCssMainFont1->setKey("css:main-font1");
        $settingsCssMainFont1->setValue("Plus Jakarta Sans");
        $settingsCssMainFont1->save();

        $settingsCssMainRadius = new Settings();
        $settingsCssMainRadius->setKey("css:main-radius");
        $settingsCssMainRadius->setValue("6px");
        $settingsCssMainRadius->save();

        $settingsCssTransitionDuration = new Settings();
        $settingsCssTransitionDuration->setKey("css:transition-duration");
        $settingsCssTransitionDuration->setValue("0.3s");
        $settingsCssTransitionDuration->save();
    }

    private function InstallBDD(): void {
        $config = (new ConfigurationBDD())->getConfig();
        $errors = [];
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["attrs"]["method"])
        {
            $verification = new Verificator();
            if($verification->checkForm($config, $_REQUEST, $errors))
            {
                $configs_file = fopen(self::CONFIG_FILE, "w");
                fwrite($configs_file, "<?php \n");
                foreach ($_REQUEST as $key=>$value){
                    if($key !== "db_configuration"){
                        fwrite($configs_file, "define('".strtoupper($key)."', '$value'); \n");
                    }
                }
                fclose($configs_file);
            }
        }
        //print_r($errors);
    }


    private function getSqlTable(string $prefix): array
    {
        return [
            $prefix."category"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'category" (
                        "id" SERIAL PRIMARY KEY,
                        "label" VARCHAR(50)
                    );'
            ],

            $prefix."settings"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'settings" (
                        "id" SERIAL,
                        "key" VARCHAR(50),
                        "value" TEXT NOT NULL,
                        PRIMARY KEY(id, key)
                    );'
            ],

            $prefix."user"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'user" (
                        "id" SERIAL PRIMARY KEY,
                        "login" VARCHAR(50) NOT NULL,
                        "email" VARCHAR(320) NOT NULL,
                        "password" VARCHAR(255) NOT NULL,
                        "role" SMALLINT DEFAULT 4,
                        "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        "updated_at" TIMESTAMP NULL,
                        "status" SMALLINT DEFAULT 1,
                        "validation_token" VARCHAR(32) NULL,
                        "reset_token" VARCHAR(255) NULL
                    );'
            ],

            $prefix."article"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'article" (
                        "id" SERIAL PRIMARY KEY,
                        "title" VARCHAR(170) NOT NULL,
                        "content" TEXT NOT NULL,
                        "keywords" TEXT NOT NULL,
                        "picture_url" VARCHAR(255) NULL,
                        "id_category" INT NOT NULL,
                        "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        "id_creator" INT NOT NULL,
                        "updated_at" TIMESTAMP NULL,
                        "id_updator" INT NULL,
                        "published_at" TIMESTAMP DEFAULT NULL,
                        FOREIGN KEY ("id_category") REFERENCES "'.$prefix.'category"("id"),
                        FOREIGN KEY ("id_creator") REFERENCES "'.$prefix.'user"("id"),
                        FOREIGN KEY ("id_updator") REFERENCES "'.$prefix.'user"("id")
                    );'
            ],

            $prefix."like_users_articles"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'like_users_articles" (
                        "id_article" INT NOT NULL,
                        "id_user" INT NOT NULL,
                        PRIMARY KEY ("id_article", "id_user"),
                        FOREIGN KEY ("id_article") REFERENCES "'.$prefix.'article"("id"),
                        FOREIGN KEY ("id_user") REFERENCES "'.$prefix.'user"("id")
                    );'
            ],

            $prefix."comment"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'comment" (
                        "id" SERIAL PRIMARY KEY,
                        "id_article" INT,
                        "id_comment_response" INT,
                        "id_user" INT,
                        "content" TEXT NOT NULL,
                        "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        "valid" BOOLEAN DEFAULT FALSE,
                        "validate_at" TIMESTAMP NULL,
                        "id_validator" INT NULL,
                        FOREIGN KEY ("id_article") REFERENCES "'.$prefix.'article"("id"),
                        FOREIGN KEY ("id_comment_response") REFERENCES "'.$prefix.'comment"("id"),
                        FOREIGN KEY ("id_user") REFERENCES "'.$prefix.'user"("id"),
                        FOREIGN KEY ("id_validator") REFERENCES "'.$prefix.'user"("id")
                    );'
            ],

            $prefix."pages"=>[
                "query"=>'
                    CREATE TABLE "'.$prefix.'pages" (
                        "id" SERIAL PRIMARY KEY,
                        "url" VARCHAR(50) NOT NULL,
                        "title" VARCHAR(255) NOT NULL,
                        "content" TEXT NOT NULL,
                        "meta_description" TEXT NOT NULL,
                        "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        "id_creator" INT NOT NULL,
                        "updated_at" TIMESTAMP NULL,
                        "id_updator" INT NULL,
                        FOREIGN KEY ("id_creator") REFERENCES "'.$prefix.'user"("id"),
                        FOREIGN KEY ("id_updator") REFERENCES "'.$prefix.'user"("id")
                    );'
            ]
        ];
    }
}