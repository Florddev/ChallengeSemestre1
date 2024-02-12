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

        


                <?php $this->includeComponent("form", $configSettingsForm); ?>

            </form>
        </main>

    </div>

</div>
