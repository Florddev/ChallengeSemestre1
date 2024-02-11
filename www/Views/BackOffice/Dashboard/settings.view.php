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
            <form method="post">

                <?php foreach ($variablesCss as $variableCss) : ?>
                    <div class="setting-input">
                        <label><?= str_replace('css:', '', $variableCss->getKey()) ?></label>
                        <input type="text" name="values[<?= $variableCss->getKey() ?>]" value="<?= $variableCss->getValue() ?>">
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="save-button">Enregistrer</button>

            </form>
        </main>

    </div>

</div>
