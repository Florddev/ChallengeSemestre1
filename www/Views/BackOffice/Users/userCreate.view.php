<div class="header-users-dashboard">
    <div class="header-users-dashboard-left">
        <h1>Créer un nouvel utilisateur</h1>
    </div>
    <div class="header-users-dashboard-right">
        <p><span>/ Dashboard </span>/ Création utilisateur</p>
    </div>
</div>

<section>
    <form action="/dashboard/users/create" method="post" class="form-user">
    <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <label for="validate">Validé:</label>
        <input type="checkbox" id="validate" name="validate">

        <label for="role">Rôle:</label>
        <select id="role" name="role">
            <option value="3">Admin</option>
            <option value="2">Moderator</option>
            <option value="1">Author</option>
            <option value="0">User</option>
        </select>

        <label for="status">Statut:</label>
        <select id="status" name="status">
            <option value="1">Inactif</option>
            <option value="0">Actif</option>
        </select>

        <input type="submit" value="Créer">
    </form>
    <a href="/dashboard/users">Annuler</a>
</section>
