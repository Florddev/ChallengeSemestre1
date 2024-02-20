<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Confirmer la suppression</h1>
    </div>
    <div class="header-users-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Confirmer la suppression de la catégorie</p>
    </div>
</div>

<section>
    <div class="delete-confirmation-container">
        <h2>Êtes-vous sûr de vouloir supprimer cette catégorie ?</h2>
        <p>Label : <strong><?php echo htmlspecialchars($category['label']); ?></strong></p>
        
        <div class="delete-confirmation-actions">
            <?php $this->includeComponent("form", $configFormCategoryDelete, $errorsForm);?>
            <br>
            <a href="/dashboard/articles/categories" class="btn btn-danger">Annuler</a>
        </div>
    </div>
</section>