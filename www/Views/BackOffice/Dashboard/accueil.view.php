<div class="header-main-dashboard">
    <div class="header-main-dashboard-left">
        <h1><span>Accueil</span> Dashboard</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-main-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Accueil </p>
    </div>
</div>

<div class="stats-container">
  <div class="stat-card pink">
    <div class="stat-icon">
        <i class="ri-user-follow-line"></i>
    </div>
    <div class="stat-info">
      <h3>Nombre d'Inscrits</h3>
      <p><?php echo $countUsersValidated; ?> / utilisateurs</p>
    </div>
  </div>
  <div class="stat-card purple">
    <div class="stat-icon">
        <i class="ri-user-add-line"></i>
    </div>
    <div class="stat-info">
      <h3>Utilisateurs en attente</h3>
      <p><?php echo $countUsersUnvalidated; ?> / utilisateurs</p>
    </div>
  </div>
  <div class="stat-card yellow">
    <div class="stat-icon">
        <i class="ri-news-line"></i>
    </div>
    <div class="stat-info">
      <h3>Nombre d'Articles</h3>
      <p><?php echo $countArticles; ?> / articles</p>
    </div>
  </div>
  <div class="stat-card blue">
    <div class="stat-icon">
        <i class="ri-chat-1-line"></i>
    </div>
    <div class="stat-info">
      <h3>Nb. de Commentaires</h3>
      <p><?php echo $countComments; ?> / commentaires</p>
    </div>
  </div>
</div>

<div class="charts-container">
    <div class="chart-days-visite">
        <h3>Nombre de nouveaux utilisateurs par mois</h3>
        
        <canvas id="visitsChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Récupérer le contexte du canvas
        var ctx = document.getElementById('visitsChart').getContext('2d');

        // Données pour le graphique
        var labels = <?php echo json_encode($lastmonths); ?>;
        var data = <?php echo json_encode($userCountsByMonths); ?>;
        

        // Configuration du graphique
        var config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre utilisateurs inscrits',
                    data: data,
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 205, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                      'rgb(255, 99, 132)',
                      'rgb(255, 159, 64)',
                      'rgb(255, 205, 86)',
                      'rgb(75, 192, 192)',
                      'rgb(54, 162, 235)',
                      'rgb(153, 102, 255)',
                      'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1.5
                }]
            }
        };

        // Création du graphique
        
        var myChart = new Chart(ctx, config);
    });
</script>
    </div>
          <div class="stats-container">
            <div class="stat-card pink">
              <div class="stat-icon">
                  <i class="ri-pages-line"></i>
              </div>
              <div class="stat-info">
                <h3>Nombre de pages</h3>
                <p><?php echo $countPages; ?> / pages</p>
              </div>
            </div>
          </div>
    </div>
</div>
