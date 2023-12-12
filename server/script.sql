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
    "status" SMALLINT DEFAULT 0,
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
   FOREIGN KEY ("id_article") REFERENCES "user"("id"),
   FOREIGN KEY ("id_user") REFERENCES "article"("id")
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