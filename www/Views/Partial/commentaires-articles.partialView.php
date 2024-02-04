Commentaires de mon article: <b><?= $data["title"] ?></b>

<br><br>
Données de l'article:
<pre><?= print_r($data) ?></pre>

<!--

Les données récupéré proviennent de la fonction setDataToArticle dans le controller Article qui contient les données
de l'utilisateur créateur en les récupérant via $data["Creator"], récupérer les données de la catégorie de l'article
avec $data["Category"]

Il faudrais compléter la fonction setDataToArticle dans www/Controllers/BackOffice/Articles.php concernant les commentaires
en créant le model "Comment" pour la table "comment" de la BDD

-->