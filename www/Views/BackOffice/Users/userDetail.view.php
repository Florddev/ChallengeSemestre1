<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Détail de l'utilisateur</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Détail utilisateur</p>
    </div>
</div>

<section>
    <div class="user-details">
        <p>ID: <?= htmlspecialchars($user['id']) ?></p>
        <p>Login: <?= htmlspecialchars($user['login']) ?></p>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
        <p>Compte validé: <?= htmlspecialchars($user['validate']) ? 'Vérifié' : 'En cours' ?></p>
        <p>Role: <?= htmlspecialchars($user['role']) ?></p>
        <p>Status: <?= htmlspecialchars($user['status']) ? 'Inactif' : 'Actif' ?></p>
        <br>
        <a class="btn btn-primary" href="/dashboard/users">Retour à la liste</a>
    </div>
</section>