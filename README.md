# WispBlog - Challenge Semestre N°1

Repository de développement du projet **WispBlog** qui est un Framework de Gestion de Contenu (CMF) de Blog. 

>**Mais qu'elle est la différence entre un CMS et un CMF ?** <br>
Un Content Manager System (CMS) permet de créer et d'animer un site web sans avoir des connaissances en programmation informatique (Exemple: `Worldpress`) tandis que le Content Manager Framework (CMF) offre la possibilité de développer des projets sur mesure à partir d'une base de code existante.

## Initialisation du projet :

Pour initialiser le projet, ouvrez un terminal, et rendez-vous au dossier source du projet. Vous devez ensuite exécuter la commande `docker compose up -d ` pour lancer le docker compose en arrière plan grâce au `-d`. 

> **Note:** Docker doit bien évidement être téléchargé au préalable sur votre machine.

### Serveur Web:

Une fois le docker compose executé, le serveur web sera automatiquement lancé. Lorsque que le serveur web sera en cours d'exécution, vous pouvez y accéder à l'adresse suivante :

```
http://localhost
```

### Serveur BDD :

Comme pour le serveur web, le serveur BDD sera lancé automatiquement après l'exécution du docker compose. Ici, le serveur BDD est un serveur utilisant PostgreSQL. Pour travailler avec la base de données PostgreSQL, vous devez suivre les étapes suivantes :

1. Ouvrez une session Postgres en utilisant la commande `docker compose exec db bash` pour ouvrir le bash.
2. Connectez-vous à l'instance de PostgreSQL en utilisant la commande `psql -U postgres`.
3. Exécutez le fichier SQL complet en utilisant la commande `\i script.sql`.

Voici quelques informations utiles pour travailler avec PostgreSQL :

- Utilisez la commande `\connect` pour changer de base de données.
- Utilisez la commande `\dt` pour afficher la liste de toutes les tables de la base de données.
- Utilisez la commande `\d nom_de_la_table` pour afficher la liste des colonnes de la table ciblée.

## Information sur le projet:

### Design:
Pour visualiser le design du projet, vous pouvez accéder au lien Figma juste [ici](https://www.figma.com/file/TWv480eH55eiJMJbC41IIV/Untitled?type=design&node-id=0%3A1&mode=design&t=od5gfMRphHzuv8Om-1) !
Voici la palette de couleurs utilisée dans le projet :

- `#12192c`
- `#192440`
- `#063454`
- `#009ef7`
- `#f5f8fa`
- `#ffffff`

Vous pouvez trouver plus d'informations sur la palette de couleurs [ici](https://coolors.co/12192c-192440-063454-009ef7-f5f8fa-ffffff).

![image](https://github.com/Florddev/ChallengeSemestre1/assets/107536197/4a727b5e-1285-435b-8dd5-a519aec6e0f0)

### Modèle conceptuel de données (MCD):

Voici le model conceptuel de donnée du projet: 

![mcd](https://user-images.githubusercontent.com/107536197/277777129-f86189ab-b513-4cdc-87f4-e254bed400c7.png)

### GitHub:

Le code source du projet est disponible sur GitHub à l'adresse suivante : [Clique ici !](https://github.com/Florddev/ChallengeSemestre1)