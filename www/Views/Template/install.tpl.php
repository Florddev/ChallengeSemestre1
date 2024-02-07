<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <title>Installation...</title>
    <style>
        .install_container {
            max-width: 1500px;
            margin: 0 auto;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            & h1 {
                font-weight: 900;
                font-size: 5rem;
                margin: 20px 0;
            }

            & img {
                margin: auto;
            }

            & ul {
                margin-left: 40px;
            }
        }

        .center-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="install_container">
        <?php include $this->viewName;?>
    </div>
<!--    <script src="/assets/dist/js/wispQuery.js"></script>-->
<!--    <script src="/assets/src/js/components/navbar.js"></script>-->
<!--    <script src="/assets/dist/js/globalPage.js"></script>-->
<!--    <script> _(document).ready(loadPage); </script>-->
</body>
</html>