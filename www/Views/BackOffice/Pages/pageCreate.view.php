<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Créer une nouvelle page</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Pages / Création</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormCreatePage, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/pages">Annuler</a>
</section>
