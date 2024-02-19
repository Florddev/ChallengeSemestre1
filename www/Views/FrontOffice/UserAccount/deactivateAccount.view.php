<div class="sign-container">
    <div class="sign-header">
        <h3>LOGO</h3>
        <p>Désactivation de compte</p>
    </div>
    <div class="sign-body">
        <h2>Désactiver le compte</h2>
        <p class="small">Êtes-vous sûr de vouloir désactiver votre compte ? Cette action peut être réversible en contactant le support.</p>
        <?php $this->includeComponent("form", $configFormDeactivateAccount, $errorsForm); ?>
    </div>
</div>