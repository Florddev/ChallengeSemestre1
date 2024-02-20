<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Éditer la catégorie</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Édition catégorie</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormCategoryEdit, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/articles/categories">Annuler</a>
</section>