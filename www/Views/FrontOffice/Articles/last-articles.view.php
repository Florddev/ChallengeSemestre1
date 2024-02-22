<div class="editable" data-plugin="partial" data-partial-src="<?= $lastArticleRoute ?>">
    <div class="container">
        <div class="row">
            <?php foreach ($Articles as $a): ?>
            <div class="col-sm-4">
                <article class="card">
                    <img src="<?= $a["picture_url"] ?>" alt="<?= $a["title"] ?>">
                    <div class="card-content">
                        <div class="badge badge-primary">Mise en avant</div>
                        <div class="badge"><?= $a["Category"]->getLabel() ?></div>
                        <h1><?= $a["title"] ?></h1>
                        <p class="card-text"><?= strip_tags($a["content"]) ?></p>
                        <small><?= $a["published_at_formated"] ?> - <?= $a["Creator"]->getLogin() ?></small>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>