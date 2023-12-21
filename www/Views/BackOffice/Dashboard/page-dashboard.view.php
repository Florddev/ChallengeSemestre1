<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface du Tableau de Bord</title>
    <link rel="stylesheet" type="text/css" href="../assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
</head>
<body class="dashboard-grid">
    <!-- Barre latérale comme contenu complémentaire -->
    <aside class="sidebar">
        <div class="header-sidebar">
            <h2>Wisp' <span>Blog</span></h2>
        </div>
        <ul class="nav-sidebar">
            <li class="actived">
                <i class="ri-home-2-fill"></i>
                Dashboard
            </li>
            <li>
                <i class="ri-building-2-fill"></i>
                Page Builder
            </li>
            <li>
                <i class="ri-database-2-fill"></i>
                Collections
            </li>
            <li>
                <i class="ri-settings-3-fill"></i>
                Admin
            </li>
            <li>
                <i class="ri-user-3-fill"></i>
                Profile
            </li>
        </ul>
    </aside>

    <!-- En-tête du tableau de bord -->
    <header class="dashboard-header">
        <div class="dashboard-header-left">
            <p>Pages / Main Dashboard</p>
            <h1>Main Dashboard</h1>
        </div>
        <div class="dashboard-header-right">
                <div class="search-bar">
                    <i class="ri-search-line search__icon"></i>
                    <input class="input-search-bar" type="text" placeholder="Search...">
                </div>
                <i class="ri-notification-line"></i>
                <i class="ri-information-line"></i>
                <i class="ri-moon-fill"></i>
                <img class="user-icon" src="../assets/images/user.png" alt="User" />
        </div>
        <!-- Autre contenu de l'en-tête -->
    </header>

    <!-- Conteneur principal pour le contenu du tableau de bord -->
    <main class="dashboard-container">
        <div class="info-cards">
                    <div class="info-card">
                        <p>item 1</p>
                    </div>
                    <div class="info-card">
                        <p>item 2</p>
                    </div>
                    <div class="info-card">
                        <p>item 3</p>
                    </div>
                    <div class="info-card">
                        <p>item 4</p>
                    </div>
                    <div class="info-card">
                        <p>item 5</p>
                    </div>
                    <div class="info-card">
                        <p>item 6</p>
                    </div>
                </div>

        <div class="graph-container">
            <div class="graph">
                <img class="user-icon" src="../assets/images/graph.png" alt="graph" />
            </div>
            <div class="graph">
                <img class="user-icon" src="../assets/images/graph.png" alt="graph" />
            </div>
        </div>

        <div class="container-data">
            <div class="check-data">
                <h2>data 1</h2>
            </div>
  
            <div class="datas">
                <div class="daily-traffic">
                    <h2>data 2</h2>
                </div>
      
                <div class="pie-chart">
                    <h2>data 3</h2>
                </div>
            </div>
        </div>

        <div class="container-data">

            <div class="datas">
                <div class="daily-traffic">
                    <h2>data 4</h2>
                </div>
      
                <div class="pie-chart">
                    <h2>data 5</h2>
                </div>
            </div>

            <div class="check-data">
                <h2>data 6</h2>
            </div>
  
        </div>

    </main>

    <footer class="dashboard-footer">
        <p>©2023 Wisp' UI. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

