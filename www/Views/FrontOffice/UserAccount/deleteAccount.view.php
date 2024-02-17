<div class="sign-container">
    <div class="sign-header">
        <h3>LOGO</h3>
        <p>Suppression de compte</p>
    </div>
    <div class="sign-body">
        <h2>Supprimer le compte</h2>
        <p class="small">Attention : cette action est irréversible. Toutes vos données seront définitivement supprimées.</p>
        <?php $this->includeComponent("form", $configFormDeleteAccount, $errorsForm); ?>
        <hr>
        <p style="text-align: center">
            Cette action est définitive. Veuillez confirmer votre choix.
        </p>
    </div>
</div>