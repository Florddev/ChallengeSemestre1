-- Supprimer les tables avec CASCADE
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS "article" CASCADE;
DROP TABLE IF EXISTS "category" CASCADE;
DROP TABLE IF EXISTS "comment" CASCADE;
DROP TABLE IF EXISTS "like_users_articles" CASCADE;
DROP TABLE IF EXISTS "pages" CASCADE;
DROP TABLE IF EXISTS "settings" CASCADE;

-- Créer la table "category"
CREATE TABLE "category" (
    "id" SERIAL PRIMARY KEY,
    "label" VARCHAR(50)
);

-- Créer la table "settings"
CREATE TABLE "settings" (
    "key" VARCHAR(50) PRIMARY KEY,
    "value" TEXT NOT NULL
);

-- Créer la table "user"
CREATE TABLE "user" (
    "id" SERIAL PRIMARY KEY,
    "login" VARCHAR(50) NOT NULL,
    "email" VARCHAR(320) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    "validate" BOOLEAN DEFAULT FALSE,
    "role" VARCHAR(20) DEFAULT 0,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP NULL,
    "status" SMALLINT DEFAULT 0
);

-- Créer la table "article"
CREATE TABLE "article" (
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
    FOREIGN KEY ("id_category") REFERENCES "category"("id"),
    FOREIGN KEY ("id_creator") REFERENCES "user"("id"),
    FOREIGN KEY ("id_updator") REFERENCES "user"("id")
);

-- Créer la table "like_users_articles"
CREATE TABLE "like_users_articles" (
   "id_article" INT NOT NULL,
   "id_user" INT NOT NULL,
   PRIMARY KEY ("id_article", "id_user"),
   FOREIGN KEY ("id_article") REFERENCES "article"("id"),
   FOREIGN KEY ("id_user") REFERENCES "user"("id")
);

-- Créer la table "comment"
CREATE TABLE "comment" (
    "id" SERIAL PRIMARY KEY,
    "id_article" INT,
    "id_comment_response" INT,
    "id_user" INT,
    "content" TEXT NOT NULL,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "valid" BOOLEAN DEFAULT FALSE,
    "validate_at" TIMESTAMP NULL,
    "id_validator" INT NULL,
    FOREIGN KEY ("id_article") REFERENCES "article"("id"),
    FOREIGN KEY ("id_comment_response") REFERENCES "comment"("id"),
    FOREIGN KEY ("id_user") REFERENCES "user"("id"),
    FOREIGN KEY ("id_validator") REFERENCES "user"("id")
);

-- Créer la table "pages"
CREATE TABLE "pages" (
    "id" SERIAL PRIMARY KEY,
    "url" VARCHAR(50) NOT NULL,
    "title" VARCHAR(255) NOT NULL,
    "content" TEXT NOT NULL,
    "metaDescription" TEXT NOT NULL,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "id_creator" INT NOT NULL,
    "updated_at" TIMESTAMP NULL,
    "id_updator" INT NULL,
    FOREIGN KEY ("id_creator") REFERENCES "user"("id"),
    FOREIGN KEY ("id_updator") REFERENCES "user"("id")
);

-- Insérer des données dans la table "category"
INSERT INTO "category" ("label") VALUES
('Musique'),
('Sport'),
('Art');

INSERT INTO "user" ("login", "email", "password") VALUES
('Admin', 'admin@wisp.fr', '$$Azerty123!');

INSERT INTO "pages" ("url", "title", "content", "metaDescription", "id_creator")VALUES
(
    '/',
    'Accueil',
    '<div class="navbar editable" nav-is-fixed="true" style="" draggable="false"><nav class="nav container"><a class="nav__logo" href="#" draggable="false">Wisp'' Blog</a><div class="nav__menu" data-modal="search"><ul class="nav__li
    st sortable-element" data-sortable="true"><li class="nav__item editable"><a class="nav__link" href="#" draggable="false">Accueil</a></li><li class="nav__item editable"><a class="nav__link" href="#" draggable="false">A&nbsp;propos</a></li><li class="nav__item ed
    itable"><a class="nav__link" href="#" draggable="false">Blog</a></li><li class="nav__item editable"><a class="nav__link" href="#" draggable="false">Contact</a></li></ul><div class="nav__close" data-modal-toggle="nav-menu"><i class="ri-close-line"></i></div></di
    v><div class="nav__actions"><i class="ri-search-line nav__search" data-modal-trigger="search"></i><i class="ri-user-line nav__login" data-modal-trigger="login"></i><div class="nav__toggle" data-modal-toggle="nav-menu"><i class="ri-menu-line"></i></div></div></n
    av><div class="search" data-modal="search"><form class="search__form" action=""><i class="ri-search-line search__icon"></i><input class="search__input" type="search" placeholder="Que recherchez vous ?"></form><i class="ri-close-line search__close" data-modal-to
    ggle="search"></i></div><div class="login" data-modal="login"><form class="login__form" action=""><h2 class="login__title">Connexion</h2><div class="login__group"><div class="login__item"><label class="login__label" for="email">Email</label><input class="login_
    _input" type="email" placeholder="Entrez votre email" id="email"></div><div class="login__item"><label class="login__label" for="password">Password</label><input class="login__input" type="password" placeholder="Entrez votre mot de passe" id="password"></div></
    div><div class="login__register"><p class="login__signup"> Avez-vous un compte ? <a href="#" draggable="false">S''enregistrer</a></p><a class="login__forgot" href="#" draggable="false">Mot de passe oublié</a><button class="btn btn-primary btn-lg" type="button">S
    e connecter</button></div></form><i class="ri-close-line login__close" data-modal-toggle="login"></i></div></div><div class="container editable sortable-element" data-sortable="true" draggable="false" style="position: static; display: flex; justify-content: cen
    ter; align-items: center; padding: 0px; max-width: 100%;"><div class="editable image-container" draggable="false" style="width: 100%; height: 100vh; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;"><img src="https://www.hdcarwallpapers.com/wall
    s/jaguar_f_type_r_coupe_2020_4k_8-HD.jpg" alt="myimage" draggable="false"></div><p class="editable editable-text" draggable="false" style="position: absolute; font-size: 37px; color: rgb(255, 255, 255); font-weight: 800;" contenteditable="false">Profitez du pla
    isir</p></div><div class="container editable sortable-element" data-sortable="true" style="margin-top: 30px;" draggable="false"><div class="container editable sortable-element" data-sortable="true" draggable="false" style="text-align: center; padding-top: 30px;
     padding-bottom: 30px;"><p class="editable editable-text" style="font-size: 2rem; font-weight: 800; color: rgb(38, 38, 58);" draggable="false" contenteditable="false">Mes articles</p><p class="editable editable-text" draggable="false" contenteditable="false" st
    yle="color: rgb(114, 57, 234); font-size: 18px; font-weight: 100; margin-top: 5px;">Lorem ipsum dolor sit amet,&nbsp;<span style="background-color: var(--white); font-family: var(--main-font1);">consectetur&nbsp;</span><span style="background-color: var(--white
    ); font-family: var(--main-font1);">adipiscing elit.</span></p><div><div></div></div><p></p></div><div class="row editable sortable-element" data-sortable="true" style="margin-bottom: 0px; padding-top: 10px; padding-bottom: 0px;" draggable="false"><div class="c
    ol-lg-4 editable sortable-element" data-sortable="true" style="padding: 10px; margin-bottom: 10px; margin-top: 0px; background-color: rgb(255, 255, 255);" draggable="false"><div class="editable image-container" style="height: 180px; width: 100%; max-height: 180
    px; position: relative; border-top-left-radius: 6px; border-top-right-radius: 6px;" draggable="false"><img src="https://cdn.drivek.com/configurator-imgs/cars/fr/800/JAGUAR/F-TYPE/39056_COUPE-3-PORTES/jaguar-f-type-coupe-2019-front-side-1.jpg" alt="myimage" drag
    gable="false"></div><div class="row editable sortable-element" data-sortable="true" draggable="false" style="padding-left: 20px; padding-right: 20px; background-color: rgb(234, 235, 238);"><div class="col-sm-6 editable sortable-element" data-sortable="true" sty
    le=""><p class="editable editable-text" style="font-size: 23px; font-weight: 800; margin-top: 0px; margin-bottom: 0px;" draggable="false" contenteditable="false">Mon titre</p></div><div class="col-sm-6 editable sortable-element" data-sortable="true" style=""><p
     class="editable editable-text align-vertical-center align-horizontal-end" draggable="false" contenteditable="false" style="color: rgb(163, 174, 208); margin-top: 0px; font-size: 14px;">14/01/2024</p></div></div><div class="container editable sortable-element"
    data-sortable="true" style="padding: 0px 20px 20px; background-color: rgb(234, 235, 238); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;" draggable="false"><p class="editable editable-text" draggable="false" contenteditable="false" style="text
    -align: justify;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet gravida lectus, eu lobortis elit auctor sit amet. Nulla vulputate
     porttitor urna, et tempus diam dignissim et.</span></p></div></div><div class="col-lg-4 editable sortable-element" data-sortable="true" style="padding: 10px; margin-top: 0px; margin-bottom: 10px;" draggable="false"><div class="editable image-container" style="
    height: 180px; position: relative; width: 100%; border-top-left-radius: 6px; border-top-right-radius: 6px;" draggable="false"><img src="https://www.carscoops.com/wp-content/uploads/2022/11/Jaguar-F-Type-Shooting-Brake.jpg" alt="myimage" draggable="false"></div>
    <div class="row editable sortable-element" data-sortable="true" draggable="false" style="padding-left: 20px; padding-right: 20px; background-color: rgb(234, 235, 238);"><div class="col-sm-6 editable sortable-element" data-sortable="true" style=""><p class="edit
    able editable-text" style="font-size: 23px; font-weight: 800; margin-top: 0px; margin-bottom: 0px;" draggable="false" contenteditable="false">Mon titre</p></div><div class="col-sm-6 editable sortable-element" data-sortable="true" style=""><p class="editable edi
    table-text align-horizontal-end align-vertical-center" draggable="false" contenteditable="false" style="color: rgb(163, 174, 208); margin-top: 0px; font-size: 14px;">14/01/2024</p></div></div><div class="container editable sortable-element" data-sortable="true"
     style="padding: 0px 20px 20px; background-color: rgb(234, 235, 238); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;" draggable="false"><p class="editable editable-text" draggable="false" contenteditable="false" style="text-align: justify;"><s
    pan style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet gravida lectus, eu lobortis elit auctor sit amet. Nulla vulputate porttitor urna, et
    tempus diam dignissim et.</span></p></div></div><div class="col-lg-4 editable sortable-element" data-sortable="true" style="padding: 10px; margin-top: 0px; margin-bottom: 10px;" draggable="false"><div class="editable image-container" style="margin-top: 0px; pad
    ding-top: 0px; height: 180px; position: relative; width: 100%; border-top-left-radius: 6px; border-top-right-radius: 6px;" draggable="false"><img src="https://www.startech.de/wp-content/uploads/2015/01/startech-fahrzeug-gallery-jaguar-f-type-2015-02-1200x600.jp
    g" alt="myimage" draggable="false"></div><div class="row editable sortable-element" data-sortable="true" draggable="false" style="padding-left: 20px; padding-right: 20px; background-color: rgb(234, 235, 238);"><div class="col-sm-6 editable sortable-element" dat
    a-sortable="true" style=""><p class="editable editable-text" style="font-size: 23px; font-weight: 800; margin-top: 0px; margin-bottom: 0px;" draggable="false" contenteditable="false">Mon titre</p></div><div class="col-sm-6 editable sortable-element" data-sortab
    le="true"><p class="editable editable-text align-horizontal-end align-vertical-center" draggable="false" contenteditable="false" style="color: rgb(163, 174, 208); margin-top: 0px; font-size: 14px;">14/01/2024</p></div></div><div class="container editable sortab
    le-element" data-sortable="true" style="padding: 0px 20px 20px; background-color: rgb(234, 235, 238); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;" draggable="false"><p class="editable editable-text" draggable="false" contenteditable="false"
     style="text-align: justify; font-size: 16px;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet gravida lectus, eu lobortis elit auc
    tor sit amet. Nulla vulputate porttitor urna, et tempus diam dignissim et.</span></p></div></div></div></div><div class="container editable sortable-element" data-sortable="true" draggable="false" style="max-width: 100%; height: 258px; margin-top: 60px; backgro
    und-color: rgb(38, 38, 58); border-top-left-radius: 0px; border-top-right-radius: 0px;"><p class="editable editable-text align-horizontal-center align-vertical-center" draggable="false" contenteditable="false" style="max-width: 1220px; font-size: 29px; color: r
    gb(234, 235, 238); font-weight: 800; width: 100%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel augue id massa imperdiet fermentum. Vestibulum accumsan bibendum arcu nec commodo. Integer vel arcu vehicula, pretium nunc ut, accumsan mauri
    s.</p></div>',
    'Meta description de la page',
    1
);