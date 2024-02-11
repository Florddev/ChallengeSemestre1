<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Éditer l'utilisateur</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Édition utilisateur</p>
    </div>
</div>

<section>
    <form action="/dashboard/users/edit/<?= $user['id'] ?>" method="post" class="form-user">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?= $user['login'] ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>

        <label for="password">Mot de passe (laisser vide pour ne pas changer):</label>
        <input type="password" id="password" name="password">

        <label for="validate">Validé:</label>
        <input type="checkbox" id="validate" name="validate" <?= $user['validate'] ? 'checked' : '' ?>>

        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="3" <?= $user['role'] == 3 ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?= $user['role'] == 2 ? 'selected' : '' ?>>Moderator</option>
            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Author</option>
            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>User</option>
        </select>

        <label for="status">Statut:</label>
        <select id="status" name="status">
            <option value="1" <?= $user['status'] == 1 ? 'selected' : '' ?>>Inactif</option>
            <option value="0" <?= $user['status'] == 0 ? 'selected' : '' ?>>Actif</option>
        </select>
        
        <input type="submit" value="Mettre à jour">
    </form>
    <a href="/dashboard/users">Annuler</a>
</section>