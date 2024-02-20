<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1><span>Categories</span> Dashboard</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-users-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Categories</p>
    </div>
</div>

<section>
    <div class="create-user-button-container" style="margin-bottom: 20px; text-align: right;">
        <a href="/dashboard/articles/categories/create" class="btn btn-primary">Créer une categorie</a>
    </div>
    <div class="table-container">
        <div class="title-table-container">
            <h2>Category Table</h2>
            <p>Use a class <code>Category</code> to CRUD.</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Label</th>
                    <th>Voir</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td class='bold'><?php echo $category['id']; ?></td>
                    <td><?php echo $category['label']; ?></td>
                    <td><a href="/dashboard/articles/categories/show/<?php echo $category['id']; ?>" style="text-decoration: none;"><i class="ri-eye-line"></i></a></td>
                    <td><a href="/dashboard/articles/categories/edit/<?php echo $category['id']; ?>" style="text-decoration: none;"><i class='ri-edit-line edit'></i></a></td>
                    <td><a href="/dashboard/articles/categories/delete/<?php echo $category['id']; ?>" style="text-decoration: none;"><i class='ri-delete-bin-6-line delete'></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>