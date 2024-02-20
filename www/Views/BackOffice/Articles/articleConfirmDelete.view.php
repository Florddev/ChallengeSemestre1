<div class="header-articles-dashboard">
    <div class="header-articles-dashboard-left">
        <h1>Confirmer la suppression</h1>
    </div>
    <div class="header-articles-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Confirmer la suppression de l'article</p>
    </div>
</div>

<section>
    <div class="delete-confirmation-container">
        <h2>Êtes-vous sûr de vouloir supprimer cet article ?</h2>
        <p>Titre : <strong><?php echo htmlspecialchars($article['title']); ?></strong></p>
        
        <div class="delete-confirmation-actions">
            <?php $this->includeComponent("form", $configFormArticleDelete, $errorsForm);?>
            <br>
            <a href="/dashboard/articles" class="btn btn-danger">Annuler</a>
        </div>
    </div>
</section>