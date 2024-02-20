<div class="main" editable-popup="false" id="page-content" style="background-color: white; padding-top: 5rem">

    <?= $site_navbar ?>

    <div class="container" style="max-width: 1120px; padding-top: 100px; padding-bottom: 50px;">
        <div style="color: rgb(110, 112, 118); text-transform: uppercase; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
            Catégorie: <span id="currentCategory"><?= $currentArticle["Category"]->getLabel() ?></span>
        </div>
        <div id="article-title" class="editable editable-text" editable-popup="false" style="font-size: 64px; font-weight: 800; margin-top: 30px; margin-bottom: 30px;" data-sortable="true">
            <?= $currentArticle["title"] ?>
        </div>
        <div style="color: rgb(110, 112, 118); text-transform: none; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
            <?= $currentArticle["Creator"]->getLogin() ?>, <?=  $currentArticle["datePublication"] ?>
        </div>
    </div>
    <div class="container" style="max-width: 1120px; padding-bottom: 50px;">
        <div class="editable image-container" editable-popup="false" style="width: 100%; height: 474px;" data-sortable="true">
            <img src="<?= $currentArticle["picture_url"] ?>" alt="myimage" id="article-main-image">
        </div>
    </div>
    <div class="container" style="max-width: 1120px;" style="max-width: 1120px;">
        <div class="editable editable-text" editable-popup="false" style="line-height: 25px; color: rgb(110, 112, 118); font-size: 16px; max-width: 1120px;" data-sortable="true" id="article-content">
            <?= $currentArticle["content"] ?>
        </div>
    </div>
    <div class="container">
        <?php $this->partial("commentaires-articles", $currentArticle); ?>
    </div>

    <?= $site_footer ?>

</div>