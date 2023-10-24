# ChallengeSemestre1 - Groupe 8
Repository du challenge semestriel du groupe N°8

## Mise en place du workspace avec docker :
Executer le `docker-compose.yml` pour installer tout l'espace de travail grâce à la commande
```
docker compose up -d
``` 

### Serveur Web:
Le serveur web se situe sur le port `80`. L'adresse du serveur web est alors :
```
http://localhost
```

### Serveur BDD:
Le serveur BDD est un serveur postgreSQL qui est situé sur le port `5432`. Pour ouvrir la session du serveur postgres, utiliser:
```
docker compose exec db bash
``` 
Vous pouvez ensuite vous connecter à la BDD avec la commande
```
psql -U postgres
``` 
Une fois connecté, exécutez le script SQL pour ajouter toutes les tables de l'application Web avec
```
\i front_office.sql
```
### Infos utiles:
- Le `\connect` permet de switch une base de donnée à une autre.
- La commande `\dt` permet de voir la liste de toutes les tables de la BDD.
- Et `\d nom_de_la_table` permet de voir la liste de colonnes de la table ciblé.


## Informations sur le projet
### Thème:
Le projet aura pour but de créer un template de Blog réutilisable et configurable a souhait.

### Palette de couleur utilisé: 
Lien `https://coolors.co/192440-063454-009ef7-f5f8fa-ffffff`

![image](https://github.com/Florddev/ChallengeSemestre1/assets/107536197/4a727b5e-1285-435b-8dd5-a519aec6e0f0)

### Model conceptuel de données:
![scriptDiagram](https://github.com/Florddev/ChallengeSemestre1/assets/107536197/f86189ab-b513-4cdc-87f4-e254bed400c7)

