<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Back</title>
</head>
<body>
    <div class="page-wrapper back-office">
        <div class="page-wrapper-header">
            <div class="page-wrapper-header-left">
                Header Left
            </div>
            <div class="page-wrapper-header-center">
                <p>Header Center </p>
            </div>
            <div class="page-wrapper-header-right">
                Header Right
            </div>
        </div>

        <div class="page-wrapper-body">
            <section class="sidebar" id="navbar-container">
                Fenetre gauche
            </section>
            <section class="page-wrapper-body-container">
                <?php include $this->viewName;?>
            </section>

            <div class="sidebar-toggler sidebar-toggler-left">
                <input type="checkbox" id="left-toggler" onchange="closeShutters(this, 'navbar-container')">
                <label for="left-toggler"><i class="ri-arrow-left-line"></i></label>
            </div>
        </div>
    </div>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/src/js/components/accordion.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/src/js/components/navtab.js"></script>
    <script src="/assets/dist/js/globalPage.js"></script>
</body>
</html>