<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Page 404</title>
</head>
<body style="margin: 0; padding: 0; display: flex; height: 100vh;">

    <!-- Partie gauche avec le texte et le bouton -->
    <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: #f0f0f0; padding: 20px;">
        <p style="text-align: center; font-size: 45px;color:#3498db;font-weight:bold;">Erreur 404</p>
        <p style="text-align: center; font-size: 18px;">Désolé, la page que vous avez demandée est introuvable.</p>
        <a href="/" style="text-decoration: none; margin-top: 20px; padding: 15px; background-color: #3498db; color: #ffffff; font-size: 18px;">Accueil</a>
    </div>

    <!-- Partie droite avec l'image plus petite centrée verticalement -->
    <div style="flex: 2; overflow: hidden; display: flex; justify-content: center; align-items: center; padding: 20px;">
        <img src="/assets/images/404.jpg" alt="Page 404" style="width: 75%; height: auto; object-fit: cover;">
    </div>

</body>
</html>
