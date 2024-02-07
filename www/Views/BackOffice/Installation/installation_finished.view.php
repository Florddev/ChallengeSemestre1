<div class="row center-container">
    <div class="col-lg-6">
        <h1>Félicitations !</h1>
        <p>L'installation de votre site c'est déroulé à merveille !! Connectez vous avec votre compte et commencez à construire le site internet de vos rêves !</p>
        <br>
        <div action="/" method="post" class="form form-fluid">
            <div class="form-group">
                <label for="name3" class="form-label">Identifiant</label>
                <div class="form-field-group">
                    <input type="text" placeholder="Email" name="name3" id="name3" class="form-field" value="<?= $loginCreated ?>" readonly />
                    <div class="form-field-icon left">
                        <i class="ri-shield-user-fill"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name3" class="form-label">Mot de passe</label>
                <div class="form-field-group">
                    <input type="text" placeholder="Votre mot de passe choisi" name="name3" id="name3" class="form-field" readonly />
                    <div class="form-field-icon left">
                        <i class="ri-lock-2-fill"></i>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="/login" class="btn btn-primary">Se connecter</a>
    </div>
    <div class="col-lg-6">
        <img src="/assets/images/install_end.jpg" alt="start_to_install">
    </div>
</div>