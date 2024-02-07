<div class="sign-container">
    <div class="sign-header">
        <h3>LOGO</h3>
        <p>Content</p>
    </div>
    <div class="sign-body">
        <h2>Créez votre compte</h2>
        <p class="small">Rejoignez nous !</p>
        <?php $this->includeComponent("form", $configFormRegister, $errorsForm);?>
        <hr>
        <p style="text-align: center">
            Vous avez déjà un compte ? <br> <a href="/login">Se connecter</a>
        </p>

    </div>
</div>