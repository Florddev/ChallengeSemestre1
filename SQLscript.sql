DROP TABLE IF EXISTS user, role, article, category, comment, like_users_articles, pages, settings CASCADE;

CREATE TABLE `user` (
    `id_user`       INT AUTO_INCREMENT,
    `login`         VARCHAR(50) NOT NULL,    
    `email`         VARCHAR(320) NOT NULL,
    `password`      VARCHAR(255) NOT NULL,
    `validate`      BOOLEAN DEFAULT 0,
    `id_role`       INT DEFAULT 0,
    `status`        TINYINT DEFAULT 0,
    `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    DATETIME NULL,
	PRIMARY KEY (id_user),
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);

CREATE TABLE `role` (
    `id_role`       INT AUTO_INCREMENT,
    `label`         VARCHAR(50) NOT NULL,
    `priority`      INT DEFAULT 0,
    PRIMARY KEY (id_role)
);

CREATE TABLE `article` (
    `id_article`        INT AUTO_INCREMENT,
    `title`             VARCHAR(170) NOT NULL,
    `content`           TEXT NOT NULL,
    `keywords`          TEXT NOT NULL,
    `picture_url`       VARCHAR(255) NULL,
    `id_category`       INT NOT NULL,
    `created_at`        DATETIME DEFAULT CURRENT_TIMESTAMP,
    `id_creator`        INT NOT NULL,
    `updated_at`        DATETIME NULL,
    `id_updator`        INT NULL,
    PRIMARY KEY (id_article),
    FOREIGN KEY (id_category) REFERENCES category(id_category),
    FOREIGN KEY (id_creator) REFERENCES user(id_user),
    FOREIGN KEY (id_updator) REFERENCES user(id_user)
);

CREATE TABLE `like_users_articles` (
    `id_article`    INT NOT NULL,
    `id_user`       INT NOT NULL,
    PRIMARY KEY (`id_article`),
    PRIMARY KEY (`id_user`)
);

CREATE TABLE `category` (
    `id_category`   INT AUTO_INCREMENT,
    `label`         VARCHAR(50),
    PRIMARY KEY (`id_category`)
);

CREATE TABLE `comment` (
    `id_comment`            INT AUTO_INCREMENT,
    `id_article`            INT,
    `id_comment_response`   INT,
    `id_user`               INT,
    `content`               TEXT NOT NULL,
    `created_at`            DATETIME DEFAULT CURRENT_TIMESTAMP,
    `valid`                 BOOLEAN DEFAULT 0,
    `validate_at`           DATETIME NULL,
    `id_validator`          INT NULL,
    PRIMARY KEY (id_comment),
    FOREIGN KEY (id_article) REFERENCES article(id_article),
    FOREIGN KEY (id_comment_response) REFERENCES comment(id_comment),
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_validator) REFERENCES user(id_user)
);
-- Illustration des réponses:
-- (id) (id_reponse) Content
-- (1) (null) Mon com 1
--      (2) (1) Réponse
--          (4) (2) Réponse 3
--      (3) (1) Réponse 2


-- Pages
CREATE TABLE `pages` (
    `id_page`           INT AUTO_INCREMENT,
    `url`               VARCHAR(50) NOT NULL,
    `title`             VARCHAR(255) NOT NULL,
    `content`           TEXT NOT NULL,
    `metaDescription`   TEXT NOT NULL,
    `created_at`        DATETIME DEFAULT CURRENT_TIMESTAMP,
    `id_creator`        INT NOT NULL,
    `updated_at`        DATETIME NULL,
    `id_updator`        INT NULL,
    PRIMARY KEY (`id_page`),
    FOREIGN KEY (`id_creator`) REFERENCES user(id_user),
    FOREIGN KEY (`id_updator`) REFERENCES user(id_user)
);

CREATE TABLE `settings` (
    `id_setting`    INT AUTO_INCREMENT,
    `key`           TEXT NOT NULL,
    `value`         TEXT NOT NULL,
    PRIMARY KEY (`id_setting`)
);

-- Menu 


INSERT INTO role VALUES (
    (default, 'Admin',      3),
    (default, 'Author',     2),
    (default, 'Moderator',  1),
    (default, 'User',       0)
);

INSERT INTO category VALUES (
    (default, 'Musique'),
    (default, 'Sport'),
    (default, 'Art')
);
