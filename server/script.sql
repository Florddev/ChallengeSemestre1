-- Supprimer les tables avec CASCADE
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS "role" CASCADE;
DROP TABLE IF EXISTS "article" CASCADE;
DROP TABLE IF EXISTS "category" CASCADE;
DROP TABLE IF EXISTS "comment" CASCADE;
DROP TABLE IF EXISTS "like_users_articles" CASCADE;
DROP TABLE IF EXISTS "pages" CASCADE;
DROP TABLE IF EXISTS "settings" CASCADE;

-- Créer la table "role"
CREATE TABLE "role" (
    "id_role" SERIAL PRIMARY KEY,
    "label" VARCHAR(50) NOT NULL,
    "priority" INT DEFAULT 0
);

-- Créer la table "category"
CREATE TABLE "category" (
    "id" SERIAL PRIMARY KEY,
    "label" VARCHAR(50)
);

-- Créer la table "like_users_articles"
CREATE TABLE "like_users_articles" (
    "id_article" INT NOT NULL,
    "id_user" INT NOT NULL,
    PRIMARY KEY ("id_article", "id_user")
);

-- Créer la table "settings"
CREATE TABLE "settings" (
    "key" VARCHAR(50) PRIMARY KEY,
    "value" TEXT NOT NULL
);

-- Créer la table "user"
CREATE TABLE "user" (
    "id_user" SERIAL PRIMARY KEY,
    "login" VARCHAR(50) NOT NULL,
    "email" VARCHAR(320) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    "validate" BOOLEAN DEFAULT FALSE,
    "id_role" INT DEFAULT 0,
    "status" SMALLINT DEFAULT 0,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP NULL,
    FOREIGN KEY ("id_role") REFERENCES "role"("id_role")
);

-- Créer la table "article"
CREATE TABLE "article" (
    "id_article" SERIAL PRIMARY KEY,
    "title" VARCHAR(170) NOT NULL,
    "content" TEXT NOT NULL,
    "keywords" TEXT NOT NULL,
    "picture_url" VARCHAR(255) NULL,
    "id_category" INT NOT NULL,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "id_creator" INT NOT NULL,
    "updated_at" TIMESTAMP NULL,
    "id_updator" INT NULL,
    FOREIGN KEY ("id_category") REFERENCES "category"("id_category"),
    FOREIGN KEY ("id_creator") REFERENCES "user"("id_user"),
    FOREIGN KEY ("id_updator") REFERENCES "user"("id_user")
);

-- Créer la table "comment"
CREATE TABLE "comment" (
    "id_comment" SERIAL PRIMARY KEY,
    "id_article" INT,
    "id_comment_response" INT,
    "id_user" INT,
    "content" TEXT NOT NULL,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "valid" BOOLEAN DEFAULT FALSE,
    "validate_at" TIMESTAMP NULL,
    "id_validator" INT NULL,
    FOREIGN KEY ("id_article") REFERENCES "article"("id_article"),
    FOREIGN KEY ("id_comment_response") REFERENCES "comment"("id_comment"),
    FOREIGN KEY ("id_user") REFERENCES "user"("id_user"),
    FOREIGN KEY ("id_validator") REFERENCES "user"("id_user")
);

-- Créer la table "pages"
CREATE TABLE "pages" (
    "id_page" SERIAL PRIMARY KEY,
    "url" VARCHAR(50) NOT NULL,
    "title" VARCHAR(255) NOT NULL,
    "content" TEXT NOT NULL,
    "metaDescription" TEXT NOT NULL,
    "created_at" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "id_creator" INT NOT NULL,
    "updated_at" TIMESTAMP NULL,
    "id_updator" INT NULL,
    FOREIGN KEY ("id_creator") REFERENCES "user"("id_user"),
    FOREIGN KEY ("id_updator") REFERENCES "user"("id_user")
);

-- Insérer des données dans la table "role"
INSERT INTO "role" ("label", "priority") VALUES
    ('Admin', 3),
    ('Author', 2),
    ('Moderator', 1),
    ('User', 0);

-- Insérer des données dans la table "category"
INSERT INTO "category" ("label") VALUES
    ('Musique'),
    ('Sport'),
    ('Art');