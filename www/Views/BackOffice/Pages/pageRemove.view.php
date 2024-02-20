<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Suppression de page</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Pages / Suppression</p>
    </div>
</div>

<section>

    <div class="delete-confirmation-container">
        <h2>Êtes-vous sûr de vouloir supprimer cette page ?</h2>
        <p>Titre : <strong><?= $page->getTitle() ?></strong></p>
        <p>Url : <strong><?= $page->getUrl() ?></strong></p>

        <div class="delete-confirmation-actions">
            <?php $this->includeComponent("form", $configFormRemovePage, $errorsForm);?>
            <br>
            <a class="btn btn-danger" href="/dashboard/pages">Annuler</a>
        </div>
    </div>
</section>
