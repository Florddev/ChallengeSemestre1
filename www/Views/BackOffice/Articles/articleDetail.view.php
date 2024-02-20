<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Détail de l'article</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Détail article</p>
    </div>
</div>

<section>
    <div class="article-details">
        <p>ID: <?= htmlspecialchars($article['id']) ?></p>
        <p>Titre: <?= htmlspecialchars($article['title']) ?></p>
        <p>Contenu: <?= htmlspecialchars($article['content']) ?></p>
        <p>Mots clés: <?= htmlspecialchars($article['keywords']) ?></p>
        <p>URL de l'image: <?= htmlspecialchars($article['picture_url']) ?></p>
        <p>ID Catégorie: <?= htmlspecialchars($article['id_category']) ?></p>
        <p>ID Créateur: <?= htmlspecialchars($article['id_creator']) ?></p>
        <p>Créé le: <?= htmlspecialchars($article['created_at']) ?></p>
        <p>ID Modificateur: <?= htmlspecialchars($article['id_updator']) ?></p>
        <p>Modifié le: <?= htmlspecialchars($article['updated_at']) ?></p>
        <p>Publié le: <?= htmlspecialchars($article['published_at']) ?></p>
        <br>
        <a class="btn btn-primary" href="/dashboard/articles">Retour à la liste</a>
    </div>
</section>