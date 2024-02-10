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

    <!-- Section des paramètres -->
    <div class="job-board">

        <main class="job-listings">

            <!-- Utilisez une boucle PHP pour générer les champs d'entrée -->
            <?php
            for ($i = 0; $i < 4; $i++) {
                ?>  
                <div class="setting-input">
                    <label for="name"><?= $result ?></label>
                    <input type="text" id="name" name="name" placeholder="Nom">
                </div>
                <?php
            }
            ?>

            <!-- Bouton "Enregistrer" -->
            <button class="save-button">Enregistrer</button>

        </main>

    </div>

</div>
