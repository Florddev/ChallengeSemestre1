<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Détail de la catégorie</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Détail catégorie</p>
    </div>
</div>

<section>
    <div class="user-details">
        <p>ID: <?= htmlspecialchars($category['id']) ?></p>
        <p>Label: <?= htmlspecialchars($category['label']) ?></p>
        <br>
        <a class="btn btn-primary" href="/dashboard/categories">Retour à la liste</a>
    </div>
</section>