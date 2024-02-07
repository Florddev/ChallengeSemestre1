
<div class="row center-container">
    <div class="col-lg-6">
        <h1>Installation CMF</h1>
        <p style="text-align: justify">Bienvenue sur Wisp. Avant de vous lancer, nous avons besoin de certaines informations sur votre base de données. Il va falloir réunir les informations suivantes pour continuer.</p>
        <ul style="list-style: decimal">
            <li>Nom de la base de données</li>
            <li>Nom d'utilisateur de la base de données</li>
            <li>Mot de passe de l'utilisateur</li>
            <li>Adresse & port de la base de données</li>
            <li>Préfixe de table (si vous souhaitez avoir plusieurs Blog Wisp sur une même base de données)</li>
        </ul>
        <p style="text-align: justify">Vous devriez normalement avoir reçu ces informations de la part de votre hébergeur. Si vous ne les avez pas, il vous faudra contacter votre hébergeur afin de continuer.</p>
        <p style="text-align: justify"><i>Nous allons utiliser ces informations pour créer le fichier <strong>wisp-config.php</strong>. Si pour une raison ou pour une autre la création automatique du fichier ne fonctionne pas, ne vous inquétez pas. Vous pouvez aussi simplement ouvrir <strong>wisp-config-sample.php</strong> dans un éditeur de texte, y remplir vos informations et l'enregistrer sous le nom de <strong>wisp-config.php</strong>.</i></p>
        <?php $this->includeComponent("form", $welcomeForm);?>
    </div>
    <div class="col-lg-6">
        <img src="/assets/images/install_start.jpg" alt="start_to_install">
    </div>
</div>
