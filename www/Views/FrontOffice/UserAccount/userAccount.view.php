<div class="sign-container">
    <div class="sign-header">
        <h3>LOGO</h3>
        <p>Gestion du compte</p>
    </div>
    <div class="sign-body">
        <h2>Votre compte</h2>
        <p class="small">Gérez les paramètres de votre compte <?= $user['login'] ?></p>
        <ul class="account-links">
            <li><a href="/change-password">Modifier mon mot de passe</a></li>
            <li><a href="/deactivate-account">Désactiver mon compte</a></li>
            <li><a href="/delete-account">Supprimer mon compte</a></li>
        </ul>
    </div>
</div>