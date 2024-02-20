<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <title>Page builder</title>
</head>

<body>
-->
    <div class="page-wrapper page-builder">
        <header class="page-wrapper-header page-builder-header">
            <section class="page-wrapper-header-left page-builder-header-start">
                <input type="hidden" id="article-id" value="<?= $currentArticle["id"] ?>">
                <h1>
                    <label for="page-title">Publication: </label>
                </h1>
                <div class="page-url">
                    <input type="date" id="article-publicationDate" value="<?= date_format(date_create($currentArticle["published_at"]), 'Y-m-d') ?>">
                </div>
            </section>
            <section class="page-wrapper-header-center page-builder-header-mid">
                <div class="header-mid-start"></div>
                <div class="header-mid-center">
                    <ul class="editor-responsive">
                        <li editor-mode="pc">
                            <input type="radio" id="editor-mode-pc" name="editor-mode-radio" checked>
                            <label for="editor-mode-pc"><i class="ri-computer-fill"></i></label>
                        </li>
                        <li editor-mode="pad">
                            <input type="radio" id="editor-mode-pad" name="editor-mode-radio">
                            <label for="editor-mode-pad"><i class="ri-tablet-line"></i></label>
                        </li>
                        <li editor-mode="phone">
                            <input type="radio" id="editor-mode-phone" name="editor-mode-radio">
                            <label for="editor-mode-phone"><i class="ri-smartphone-line"></i></label>
                        </li>
                    </ul>
                    <ul class="editor-size">
                        <li>
                            <input type="text" value="" id="editor-size" min="0" class="draggable-input">
                            <label for="editor-size"><span> px</span></label>
                        </li>
                        <li><span>/</span></li>
                        <li>
                            <!--<input type="text" value="100" id="editor-size-percent" min="0" max="100" class="draggable-input">-->
                            <select id="editor-size-percent">
                                <option value="100" selected>100</option>
                                <option value="90">90</option>
                                <option value="80">80</option>
                                <option value="70">70</option>
                                <option value="60">60</option>
                                <option value="50">50</option>
                                <option value="40">40</option>
                                <option value="30">30</option>
                                <option value="20">20</option>
                                <option value="10">10</option>
                            </select>
                            <label for="editor-size-percent"><span> %</span></label>
                        </li>
                    </ul>
                </div>
                <div class="header-mid-end">
                        <i class="ri-arrow-go-back-fill" id="state-undo"></i>
                        <i class="ri-arrow-go-forward-fill" id="state-redo"></i>
                </div>
            </section>
            <section class="page-wrapper-header-right page-builder-header-end">
                <ul class="header-end-list">
                    <!--
                    <li onclick="savePage()"><i class="ri-save-line" id="save-page"></i></li>
                    <li><i class="ri-play-line"></i></li>
                    <li><button class="btn btn-primary btn-small">Publier</button></li>
                    <li><i class="ri-shield-user-line"></i></li>
                    -->

                    <li onclick="saveArticle()"><button class="btn btn-primary btn-line">Enregistrer</button></li>
                    <li><a href="/article/<?= $currentArticle["encode_title"] ?>"><button class="btn btn-primary">Visiter l'article</button></li></a>
                </ul>
            </section>
        </header>
        <main class="page-wrapper-body page-builder-main">
            <div class="sidebar-toggler sidebar-toggler-right">
                <input type="checkbox" id="builder-right-toggler" checked onchange="closeShutters(this, 'editorShutter')">
                <label for="builder-right-toggler"><i class="ri-arrow-right-line"></i></label>
            </div>
            <!--
            <div class="sidebar-toggler sidebar-toggler-left">
                <input type="checkbox" id="builder-left-toggler" checked onchange="closeShutters(this, 'componentsShutter')">
                <label for="builder-left-toggler"><i class="ri-arrow-left-line"></i></label>
            </div>
            <section class="sidebar" id="componentsShutter">
                <div class="btn-multiple">
                    <div class="btn-multiple-child">
                        <input type="radio" name="choose-something" id="choose-something-1" data-tabnav-target="tabnav-test" checked>
                        <label for="choose-something-1">Layouts</label>
                    </div>
                    <div class="btn-multiple-child">
                        <input type="radio" name="choose-something" id="choose-something-2" data-tabnav-target="tabnav-test2">
                        <label for="choose-something-2">Elements</label>
                    </div>
                </div>
                <br>
                <div class="edit-form">
                    <div class="edit-form-inputs">
                        <i class="ri-search-line"></i>
                        <input type="text" placeholder="Rechercher" />
                    </div>
                </div>
                <hr>
                <div data-plugin="tabnav" id="tabnav-test">
                    <div class="accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Navigation</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel">
                            <div class="components-preview sortable-models">
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/navbar1.html">
                                    <label>Navbar</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar1.svg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Header</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel">
                            <div class="components-preview sortable-models">
                                <div class="components">
                                    <label>Header 1</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Header1.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/header2.html">
                                    <label>Header 2</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Header2.svg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Articles</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel">
                            <div class="components-preview sortable-models">
                                <div class="components" data-partial-src="{{origin}}/dashboard/builder/last-articles">
                                    <label>Derniers articles</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Frame2.svg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div data-plugin="tabnav" id="tabnav-test2">
                    <div class="accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Basics</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel">
                            <div class="components-preview sortable-models">
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/text.html">
                                    <label>Text</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/text.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/image.html">
                                    <label>Image</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/image.svg"></i>
                                    </div>
                                </div>
                                <div class="components">
                                    <label>Lien</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/link.svg"></i>
                                    </div>
                                </div>
                                <div class="components">
                                    <label>Map</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/map.svg"></i>
                                    </div>
                                </div>
                                <div class="components">
                                    <label>Video</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/video.svg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Grids</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel">
                            <div class="components-preview sortable-models">
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/container.html">
                                    <label>Container</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/container.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/col2.html">
                                    <label>2 Colonnes</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/col2.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/col3.html">
                                    <label>3 Colonnes</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/col3.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/col2_1-3.html">
                                    <label>2 Colonnes 1/3</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/col2_1-3.svg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </section>
            -->
            <section class="page-wrapper-body-container page-builder-main-editor">
                <div class="editor-container" editor-mode="pc">
                    <div class="editor-content">


                        <div class="main" editable-popup="false" id="page-content">

                            <?= $site_navbar ?>

                            <div class="container" style="max-width: 1120px; padding-top: 100px; padding-bottom: 50px;">
                                <?php if (isset($_SESSION['SucessComment'])): ?>
                                    <div class="alert alert-success" id="success-alert">
                                        <?= $_SESSION['SucessComment'] ?>
                                    </div>
                                    <?php unset($_SESSION['SucessComment']);?>
                                    <script>
                                        setTimeout(function() {
                                            document.getElementById('success-alert').style.display = 'none';
                                        }, 3500);
                                    </script>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['DeleteComment'])): ?>
                                    <div class="alert alert-success" id="delete-alert">
                                        <?= $_SESSION['DeleteComment'] ?>
                                    </div>
                                    <?php unset($_SESSION['DeleteComment']);?>
                                    <script>
                                        setTimeout(function() {
                                            document.getElementById('delete-alert').style.display = 'none';
                                        }, 3500);
                                    </script>
                                <?php endif; ?>
                                <div style="color: rgb(110, 112, 118); text-transform: uppercase; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
                                    Catégorie: <span id="currentCategory"><?= $currentArticle["Category"]->getLabel() ?></span>
                                </div>
                                <div id="article-title" class="editable editable-text" editable-popup="false" style="font-size: 64px; font-weight: 800; margin-top: 30px; margin-bottom: 30px;" data-sortable="true">
                                    <?= $currentArticle["title"] ?>
                                </div>
                                <div style="color: rgb(110, 112, 118); text-transform: none; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
                                    <?= $currentArticle["Creator"]->getLogin() ?>, <?= $currentArticle["datePublication"] ?>
                                </div>
                            </div>
                            <div class="container" style="max-width: 1120px; padding-bottom: 50px;">
                                <div class="editable image-container" editable-popup="false" style="width: 100%; height: 474px;" data-sortable="true">
                                    <img src="<?= $currentArticle["picture_url"] ?>" alt="myimage" id="article-main-image">
                                </div>
                            </div>
                            <div class="container" style="max-width: 1120px;">
                                <div class="editable editable-text" editable-popup="false" style="line-height: 25px; color: rgb(110, 112, 118); font-size: 16px; max-width: 1120px;" data-sortable="true" id="article-content">
                                    <?= $currentArticle["content"] ?>
                                </div>
                            </div>
                            <div class="container" style="max-width: 1120px;">
                                <?php $this->partial("commentaires-articles", ['article' => $currentArticle, 'view' => 'builder']); ?>
                            </div>

                            <?= $site_footer ?>

                        </div>
                    </div>
                </div>
            </section>

            <section class="sidebar page-builder-main-tools" id="editorShutter">
                <div class="btn-multiple">
                    <div class="btn-multiple-child">
                        <input type="radio" name="toolbar" id="toolbar-1" data-tabnav-target="tabnav-element-style" checked>
                        <label for="toolbar-1">Style</label>
                    </div>
                    <div class="btn-multiple-child">
                        <input type="radio" name="toolbar" id="toolbar-2" data-tabnav-target="tabnav-element-settings">
                        <label for="toolbar-2">Paramètres</label>
                    </div>
                </div>
                <br>
                <div data-plugin="tabnav" id="tabnav-element-style">
                    <div class="editor-accordion">
                        <div class="editStyle-accordion"
                             id="editStyle-align"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-align.html">

                        </div>
                    </div>
                    <div class="accordion editor-accordion">
                        <input type="checkbox"/>
                        <label class="accordion-label">
                            <span>Dimension</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-dimensions"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-dimensions.html">
                        </div>
                        <hr>
                    </div>
                    <div class="accordion editor-accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Typography</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-typo"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-typo.html">
                        </div>
                        <hr>
                    </div>
                    <div class="accordion editor-accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Decoration</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-decoration"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-decoration.html">
                        </div>
                        <hr>
                    </div>
                    <div class="accordion editor-accordion">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Position</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-position"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-positions.html">
                        </div>
                        <hr>
                    </div>
                </div>
                <div data-plugin="tabnav" id="tabnav-element-settings">
                    <div class="accordion editor-accordion-settings" id="editor-setting-image">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Image</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-dimensions"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-settings-image.html">
                        </div>
                    </div>
                    <hr>

                    <div class="edit-form-control">
                        <div class="edit-form w-100">
                            <label>Categorie</label>
                            <div class="edit-form-inputs">
                                <select name="category" id="article-category" onchange="_('#currentCategory').html(_(this).qs(`option[value='${this.value}']`).text)">
                                    <?php foreach ($Categories as $c): ?>
                                        <option value="<?= $c->getId() ?>" <?= $c->getLabel() == $currentArticle["Category"]->getLabel() ? "selected" : null ?>><?= $c->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <datalist id="global-color-data-list">
        <option value="var(--info)"></option>
        <option value="#1c1c2b"></option>
        <option value="#26263a"></option>
        <option value="#7239EA"></option>
        <option value="#a3aed0"></option>
        <option value="#eaebee"></option>
    </datalist>
<!--
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/src/js/components/accordion.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/src/js/components/navtab.js"></script>
    <script src="/assets/dist/js/globalPage.js"></script>

    <script src="/assets/dist/js/pageBuilder.js"></script>
    <script src="/assets/dist/js/draggableInput.js"></script>
    <script>
        _('[data-plugin="svg"]').forEach(e => _(e).html(loadSVG(_(e).attr("data-svg-src"))));
    </script>
</body>

</html>
-->