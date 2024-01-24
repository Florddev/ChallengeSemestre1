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
    <div class="table-container">
        <div class="title-table-container">
            <h2>User Table</h2>
            <p>Use a class <code>User</code> to CRUD.</p>
        </div>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Rôle</th>
            <th>Status</th>
            <th>Editer</th>
          </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            echo "<tr>";
            echo "<td class='bold'>" . $i . "</td>";
            echo "<td>Alexander</td>";
            echo "<td>Orton</td>";
            echo "<td>@mdorton</td>";
            echo "<td>Author</td>";
            echo "<td>
            <p class='verifed'>
            Vérifié
            </p>
            </td>";
            echo "<td><i class='ri-delete-bin-6-line delete'></i><i class='ri-edit-line edit'></i></td>";
            echo "</tr>";
        }
        ?>
        <?php
        for ($i = 1; $i <= 1; $i++) {
            echo "<tr>";
            echo "<td class='bold'>" . $i . "</td>";
            echo "<td>Alexander</td>";
            echo "<td>Orton</td>";
            echo "<td>@mdorton</td>";
            echo "<td>User</td>";
            echo "<td>
            <p class='pending'>
            En cours
            </p>
            </td>";
            echo "<td><i class='ri-delete-bin-6-line delete'></i><i class='ri-edit-line edit'></i></td>";
            echo "</tr>";
        }
        ?>
        <?php
        for ($i = 1; $i <= 2; $i++) {
            echo "<tr>";
            echo "<td class='bold'>" . $i . "</td>";
            echo "<td>Alexander</td>";
            echo "<td>Orton</td>";
            echo "<td>@mdorton</td>";
            echo "<td>Admin</td>";
            echo "<td>
            <p class='verifed'>
            Vérifié
            </p>
            </td>";
            echo "<td><i class='ri-delete-bin-6-line delete'></i><i class='ri-edit-line edit'></i></td>";
            echo "</tr>";
        }
        ?>
        <?php
        for ($i = 1; $i <= 1; $i++) {
            echo "<tr>";
            echo "<td class='bold'>" . $i . "</td>";
            echo "<td>Alexander</td>";
            echo "<td>Orton</td>";
            echo "<td>@mdorton</td>";
            echo "<td>User</td>";
            echo "<td>
            <p class='pending'>
            En cours
            </p>
            </td>";
            echo "<td><i class='ri-delete-bin-6-line delete'></i><i class='ri-edit-line edit'></i></td>";
            echo "</tr>";
        }
        ?>
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
