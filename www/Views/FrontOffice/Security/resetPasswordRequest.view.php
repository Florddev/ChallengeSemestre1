<div class="password-reset-container">
    <div class="password-reset-header">
        <h3>LOGO</h3>
        <p>Demande de réinitialisation de mot de passe</p>
    </div>
    <div class="password-reset-body">
        <h2>Réinitialiser votre mot de passe</h2>
        <p class="small">Entrez votre email pour recevoir un lien de réinitialisation</p>
        <?php $this->includeComponent("form", $configFormResetPasswordRequest, $errorsForm);?>
    </div>
</div>