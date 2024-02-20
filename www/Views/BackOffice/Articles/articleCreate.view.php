<div class="header-articles-dashboard">
    <div class="header-articles-dashboard-left">
        <h1>Créer un nouvel article</h1>
    </div>
    <div class="header-articles-dashboard-right">
        <p><span>/ Dashboard </span>/ Création article</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormArticleCreate, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/articles">Annuler</a>
</section>
