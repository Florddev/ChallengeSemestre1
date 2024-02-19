<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/assets/dist/js/sortable.js"></script>
    <title>Template Back</title>
</head>
<body>
    <div class="page-wrapper back-office">
        <div class="page-wrapper-header">
            <div class="page-wrapper-header-left nav-dashboard-left">
                <h2>Wisp's</h2>
                <input type="checkbox" id="sidebar-toggle" onchange="closeShutters(this, 'template-back-navbar-container')" style="display: none">
                <label for="sidebar-toggle" style="cursor: pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-center font-primary" id="sidebar-toggle"><line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line></svg>
                </label>
            </div>
            <div class="page-wrapper-header-center nav-dashboard-right">
                <i class="ri-fullscreen-line"></i>
                <i class="ri-notification-4-line"></i>
                <i class="ri-moon-line"></i>
                <i class="ri-user-3-line"></i>
                <i class="ri-settings-4-line"></i>
                <div class="profil-user">
                    <img src="https://media.istockphoto.com/id/1175286242/vector/screaming-mans-face-in-profile-head-of-a-guy-in-stress-on-the-side-aggression-and-irritation.jpg?s=612x612&w=0&k=20&c=xH3SNF8hMM3oxi8B6S4yVBa2djOT0BZVjV9s1KZm56g=" alt="">
                </div>
            </div>
        </div>

        <div class="page-wrapper-body">
            <section class="sidebar  wrappe-sidebar" id="template-back-navbar-container">
                <div class="items-sidebar">
                    <a href="/dashboard">
                        <div class="item-sidebar">
                            <i class="ri-home-3-line"></i>
                            <h2>General</h2>
                        </div>
                    </a>
                    <a href="/dashboard/articles">
                        <div class="item-sidebar">
                                <i class="ri-news-line"></i>
                                <h2>Articles</h2>
                        </div>
                    </a>
                    <a href="/dashboard/pages">
                        <div class="item-sidebar">
                            <i class="ri-file-copy-2-line"></i>
                            <h2>Pages</h2>
                        </div>
                    </a>
                    <a href="/dashboard">
                        <div class="item-sidebar">
                            <i class="ri-database-2-line"></i>
                            <h2>Tables</h2>
                        </div>
                    </a>
                    <a href="/dashboard">
                        <div class="item-sidebar">
                        <i class="ri-bar-chart-2-line"></i>
                            <h2>Charts</h2>
                        </div>
                    </a>
                    <a href="/dashboard/users">
                        <div class="item-sidebar">
                            <i class="ri-user-settings-line"></i>
                            <h2>Utilisateurs</h2>
                        </div>
                    </a>
                    <a href="/dashboard/settings">
                        <div class="item-sidebar">
                            <i class="ri-settings-4-line"></i>
                            <h2>Paramètres</h2>
                        </div>
                    </a>
                </div>
                <div class="list-liens-sidebar">
                    <div>
                        <h3>Dashboard</h3>
                        <ul>
                            <li class="active">
                                Accueil
                            </li>
                            <li>
                                Mes articles
                            </li>
                            <li>
                                Liste utilisateurs
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="page-wrapper-body-container">
                <?php include $this->viewName;?>
            </section>
<!--            <div class="sidebar-toggler sidebar-toggler-left">-->
<!--                <input type="checkbox" id="navbar-toggler" onchange="closeShutters(this, 'template-back-navbar-container')">-->
<!--                <label for="navbar-toggler"><i class="ri-arrow-left-line"></i></label>-->
<!--            </div>-->
        </div>
    </div>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/dist/js/utils.js"></script>
    <script src="/assets/src/js/components/accordion.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/src/js/components/navtab.js"></script>
    <script src="/assets/dist/js/globalPage.js"></script>
    <script src="/assets/dist/js/cercleProgression.js"></script>
    <script src="/assets/dist/js/isActiveClass.js"></script>
    <script src="/assets/dist/js/pageBuilder.js"></script>
    <script src="/assets/dist/js/articleManager.js"></script>
    <script src="/assets/dist/js/draggableInput.js"></script>
    <script src="/assets/dist/js/settingsCss.js"></script>
    <script>
        _(document).ready(evt => {
            _('[data-plugin="svg"]').forEach(e => _(e).html(loadSVG(_(e).attr("data-svg-src"))));
        });

        //let modePreview = <?php //= $inPreview ?>//;
        //if(modePreview) {
        //    _('[data-sortable="true"]').forEach(e => _(e).attr("data-sortable", "false"));
        //}
    </script>
</body>
</html>