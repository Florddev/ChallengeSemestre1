# ChallengeSemestre1 - Groupe 8
Repository du challenge semestriel du groupe N°8

## Initialisation :
### Docker:
Executer le docker compose avec `docker compose up -d`, l'adresse du serveur web sera alors :
```
localhost:8080
```

### PostgreSQL :
Pour lancer une session postgres utiliser `docker compose exec db bash` pour ouvrir dans le bash et ensuite `psql -U postgres` pour se connecter à l'instance de PostgreSQL
Utiliser `\i front_office.sql` pour exécuter le fichier SQL en entier

Infos utiles:
- Le `\connect` permet de switch une base de donnée à une autre.
- La commande `\dt` permet de voir la liste de toutes les tables de la BDD.
- Et `\d nom_de_la_table` permet de voir la liste de colonnes de la table ciblé.

## Thème:
Le projet aura pour but de créer un template de Blog réutilisable.

## Palette de couleur: 
Lien `https://coolors.co/192440-063454-009ef7-f5f8fa-ffffff`

![image](https://github.com/Florddev/ChallengeSemestre1/assets/107536197/4a727b5e-1285-435b-8dd5-a519aec6e0f0)

## Model conceptuel de données:
![front_office](https://github.com/Florddev/ChallengeSemestre1/assets/107536197/6fce4a50-bb6a-44d5-b34d-369b965cd4a5)
