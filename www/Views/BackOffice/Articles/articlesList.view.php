<div class="header-articles-dashboard">
    <div class="header-articles-dashboard-left">
        <h1><span>Articles</span> Dashboard</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-articles-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Articles</p>
    </div>
</div>

<section>
    <div class="create-article-button-container" style="margin-bottom: 20px; text-align: right;">
        <a href="/dashboard/articles/categories/" class="btn btn-primary btn-line">Gérer les catégories</a>
        <a href="/dashboard/articles/create" class="btn btn-primary">Créer un article</a>
    </div>
    <div class="table-container">
        <div class="title-table-container">
            <h2>Article Table</h2>
            <p>Use a class <code>Article</code> to CRUD.</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Mots clés</th>
                    <th>Catégorie</th>
                    <th>Créateur</th>
                    <th>Créé le</th>
                    <!-- <th>ID Modificateur</th>
                    <th>Modifié le</th> -->
                    <th>Publié le</th>
                    <th>Voir</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td class='bold'><?php echo $article['id']; ?></td>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['keywords']; ?></td>
                    <td><?php echo $article['category_name']; ?></td>
                    <td><?php echo $article['creator_name']; ?></td>
                    <td><?php echo $article['created_at']; ?></td>
                    <!-- <td><?php echo $article['id_updator']; ?></td>
                    <td><?php echo $article['updated_at']; ?></td> -->
                    <td><?php echo $article['published_at']; ?></td>
                    <td><a href="/article/<?php echo $article['encode_title']; ?>" style="text-decoration: none;"><i class="ri-eye-line"></i></a></td>
                    <td><a href="/dashboard/articles/builder/<?php echo $article['id']; ?>" style="text-decoration: none;"><i class='ri-edit-line edit'></i></a></td>
                    <td><a href="/dashboard/articles/delete/<?php echo $article['id']; ?>" style="text-decoration: none;"><i class='ri-delete-bin-6-line delete'></i></a></td>
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