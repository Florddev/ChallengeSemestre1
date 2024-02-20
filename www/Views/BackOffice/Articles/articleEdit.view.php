<div class="header-articles-dashboard">
    <div class="header-articles-dashboard-left">
        <h1>Éditer l'article</h1>
    </div>
    <div class="header-articles-dashboard-right">
        <p><span>/ Dashboard </span>/ Édition article</p>
    </div>
</div>

<section>
    <?php $this->includeComponent("form", $configFormArticleEdit, $errorsForm);?>
    <br>
    <a class="btn btn-danger" href="/dashboard/articles">Annuler</a>
</section>