<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Créer une nouvelle catégorie</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Création catégorie</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormCategoryCreate, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/articles/categories">Annuler</a>
</section>
