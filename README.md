# ChallengeSemestre1 - Groupe 8

Repository du challenge semestriel du groupe N°8

## Initialisation :

### Docker:

Pour initialiser le projet, vous devez exécuter la commande `docker compose up -d` pour lancer le docker compose. Une fois que le serveur web est en cours d'exécution, vous pouvez accéder à l'adresse suivante :

```
localhost:8080
```

### PostgreSQL :

Pour travailler avec la base de données PostgreSQL, vous devez suivre les étapes suivantes :

1. Ouvrez une session Postgres en utilisant la commande `docker compose exec db bash` pour ouvrir le bash.
2. Connectez-vous à l'instance de PostgreSQL en utilisant la commande `psql -U postgres`.
3. Exécutez le fichier SQL complet en utilisant la commande `\i front_office.sql`.

Voici quelques informations utiles pour travailler avec PostgreSQL :

- Utilisez la commande `\connect` pour changer de base de données.
- Utilisez la commande `\dt` pour afficher la liste de toutes les tables de la base de données.
- Utilisez la commande `\d nom_de_la_table` pour afficher la liste des colonnes de la table ciblée.

# GitHub:

Le code source du projet est disponible sur GitHub à l'adresse suivante : https://github.com/Florddev/ChallengeSemestre1

# Thème:

Le projet a pour objectif de créer un template de Blog réutilisable. Vous pouvez contribuer au projet en proposant des améliorations, des fonctionnalités ou en signalant des problèmes sur GitHub.

# Figma:

Pour visualiser le design du projet, vous pouvez accéder au lien Figma suivant : https://www.figma.com/file/TWv480eH55eiJMJbC41IIV/Untitled?type=design&node-id=0%3A1&mode=design&t=od5gfMRphHzuv8Om-1

## Palette de couleurs:

Voici la palette de couleurs utilisée dans le projet :

- `#12192c`
- `#192440`
- `#063454`
- `#009ef7`
- `#f5f8fa`
- `#ffffff`

Vous pouvez trouver plus d'informations sur la palette de couleurs [ici](https://coolors.co/12192c-192440-063454-009ef7-f5f8fa-ffffff).

## Modèle conceptuel de données:

Le modèle conceptuel de données du projet est disponible sur GitHub à l'adresse suivante : [https://github.com/Florddev/ChallengeSemestre1/assets/107536197/6fce4a50-bb6a-44d5-b34d-369b965cd4a5](https://user-images.githubusercontent.com/107536197/277777129-f86189ab-b513-4cdc-87f4-e254bed400c7.png)

!https://user-images.githubusercontent.com/107536197/277777129-f86189ab-b513-4cdc-87f4-e254bed400c7.png