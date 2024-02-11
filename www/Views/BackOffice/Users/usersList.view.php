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
    <div class="create-user-button-container" style="margin-bottom: 20px; text-align: left;">
        <a href="/dashboard/users/create" class="create-user-button" style="padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">Créer un utilisateur</a>
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
                    <th>Validé</th>
                    <th>Rôle</th>
                    <th>Status</th>
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
                    <td><?php echo $user['validate']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <p class='<?php echo ($user['status'] === 1) ? 'verified' : 'pending'; ?>'>
                            <?php echo $user['status'] ?>
                        </p>
                    </td>
                    <td><a href="/dashboard/users/show/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class="ri-eye-line"></i></a></td>
                    <td><a href="/dashboard/users/edit/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class='ri-edit-line edit'></i></a></td>
                    <td><a href="/dashboard/users/delete/<?php echo $user['id']; ?>" style="text-decoration: none;"><i class='ri-delete-bin-6-line delete'></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <a href="#" class="page-link">Previous</a>
        <a href="#" class="page-link active">1</a>
        <a href="#" class="page-link">2</a>
        <a href="#" class="page-link">3</a>
        <a href="#" class="page-link">Next</a>
    </div>
</section>