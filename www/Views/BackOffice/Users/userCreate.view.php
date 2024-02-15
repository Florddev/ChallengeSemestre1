<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Créer un nouvel utilisateur</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Création utilisateur</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormUserCreate, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/users">Annuler</a>
</section>
