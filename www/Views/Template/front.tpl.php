<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <style id="customClass"></style>
    <title>Ma page</title>
</head>
<body>
    <?php include $this->viewName;?>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/dist/js/utils.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/dist/js/globalPage.js"></script>
    <script> _(document).ready(loadPage); </script>
</body>
</html>