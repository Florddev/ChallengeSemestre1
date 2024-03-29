<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1><span>Utilisateurs</span> Dashboard</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-users-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Utilisateurs</p>
    </div>
</div>

<section>
    <div class="create-user-button-container" style="margin-bottom: 20px; text-align: right;">
        <a href="/dashboard/users/create" class="btn btn-primary">Créer un utilisateur</a>
    </div>
    <div class="table-container">
        <div class="title-table-container">
            <h2>User Table</h2>
            <p>Use a class <code>User</code> to CRUD.</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Voir</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class='bold'><?php echo $user['id']; ?></td>
                    <td><?php echo $user['login']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo htmlspecialchars($roleNames[$user['role']]); ?></td>
                    <td><?php echo htmlspecialchars($statusNames[$user['status']]); ?></td>
                    <td><a href="/dashboard/users/show/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class="ri-eye-line"></i></a></td>
                    <td><a href="/dashboard/users/edit/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class='ri-edit-line edit'></i></a></td>
                    <td><a href="/dashboard/users/delete/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class='ri-delete-bin-6-line delete'></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>