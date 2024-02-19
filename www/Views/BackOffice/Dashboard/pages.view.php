<div class="header-main-dashboard">
    <div class="header-main-dashboard-left">
        <h1><span>Accueil</span> Pages</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-main-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Pages</p>
    </div>
</div>


<section>
    <div class="create-user-button-container" style="margin-bottom: 20px; text-align: right;">
        <a href="/dashboard/pages/create" class="btn btn-primary">Créer une nouvelle page</a>
    </div>
    <div class="table-container">
        <div class="title-table-container">
            <h2>Pages</h2>
            <p>Liste des <code>Pages</code> du site.</p>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Url</th>
                <th>Date de creation</th>
                <th>Créé par</th>
                <th>Date de modification</th>
                <th>Modifié par</th>
                <th>Voir</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($pages as $page): ?>
                <tr>
                    <td class='bold'><?= $page["id"]; ?></td>
                    <td><?= $page["title"]; ?></td>
                    <td><?= $page["url"] ?></td>
                    <td><?= $page["formated_created"] ?></td>
                    <td><?= $page["Creator"]->getLogin() ?></td>
                    <td><?= empty($page["updated_at"]) ? $page["updated_at"] : '' ?></td>
                    <td><?= !empty($page["Updator"]) ? $page["Updator"]->getLogin() : '' ?></td>
                    <td><a href="<?= $page["url"] ?>" style="text-decoration: none;"><i class="ri-eye-line"></i></a></td>
                    <td><a href="/dashboard/builder/<?= $page["title_url"] ?>" style="text-decoration: none;"><i class='ri-edit-line edit'></i></a></td>
                    <td><a href="/dashboard/pages/delete/<?= $page["id"] ?>" style="text-decoration: none;"><i class='ri-delete-bin-6-line delete'></i></a></td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</section>