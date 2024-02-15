<div class="sign-container">
    <div class="sign-header">
        <h3>LOGO</h3>
        <p>Content</p>
    </div>
    <div class="sign-body">
        <h2>Se connecter</h2>
        <p class="small">Connectez vous à votre compte</p>
        <?php $this->includeComponent("form", $configFormLogin, $errorsForm);?>
        <hr>
        <p style="text-align: center">
            Vous n'avez pas encore de compte ? <br> <a href="/register">Créer un compte</a>
        </p>

    </div>
</div>