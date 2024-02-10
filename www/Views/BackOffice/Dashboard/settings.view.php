<!-- Ajoutez la classe "page-settings-container" au conteneur principal -->
<div class="page-settings-container">

    <!-- Section d'en-tête -->
    <div class="header-articles-dashboard">
        <div class="header-articles-dashboard-left">
            <h1><span>Paramètres</span> Dashboard</h1>
            <h2>ADMIN PANEL</h2>
        </div>
        <div class="header-articles-dashboard-right">
            <i class="ri-home-3-line"></i>
            <p><span>/ Dashboard </span>/ Paramètres</p>
        </div>
    </div>

    <div class="job-board">

        <main class="job-listings">

            <?php foreach ($variablesCss as $variableCss) : ?>
                <div class="setting-input">
                    <label for="name"><?= $variableCss->getKey() ?></label>
                    <input type="text" id="name" name="name" placeholder="Nom" value="<?= $variableCss->getValue() ?>">
                </div>
            <?php endforeach; ?>

            <button class="save-button">Enregistrer</button>

        </main>

    </div>

</div>
