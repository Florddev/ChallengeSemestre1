<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Confirmer la suppression</h1>
    </div>
    <div class="header-users-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Confirmer la suppression de l'utilisateur</p>
    </div>
</div>

<section>
    <div class="delete-confirmation-container">
        <h2>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</h2>
        <p>Utilisateur : <strong><?php echo htmlspecialchars($user['login']); ?></strong></p>
        <p>Email : <strong><?php echo htmlspecialchars($user['email']); ?></strong></p>
        
        <div class="delete-confirmation-actions">
            <form action="/dashboard/users/delete/<?php echo $user['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <button type="submit" class="confirm-delete">Confirmer</button>
            </form>
            <a href="/dashboard/users" class="cancel-delete">Annuler</a>
        </div>
    </div>
</section>