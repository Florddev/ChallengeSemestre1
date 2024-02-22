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
    <div class="page-wrapper page-builder <?= $inPreview ? "inPreview" : null ?>">
        <header class="page-wrapper-header page-builder-header">
            <section class="page-wrapper-header-left page-builder-header-start">
                <input type="hidden" id="page-id" value="<?= $currentPage["id"] ?>">
                <h1>
<!--                    <label for="page-title">Wisp&nbsp;-&nbsp;</label>-->
                    <input id="page-title" type="text" value="<?= $currentPage["title"] ?>">
                </h1>
                <div class="page-url">
                    <label for="page-url"><?= $host ?>/</label>
                    <input id="page-url" type="text" value="<?= ltrim($currentPage["url"], "/") ?>">
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
                    <?php if(!$inPreview): ?>
                        <i class="ri-arrow-go-back-fill" id="state-undo"></i>
                        <i class="ri-arrow-go-forward-fill" id="state-redo"></i>
                    <?php endif; ?>
                </div>
            </section>
            <section class="page-wrapper-header-right page-builder-header-end">
                <ul class="header-end-list" <?php if($inPreview) echo "style='border:none; justify-content: end'" ?>>
                    <!--
                    <li onclick="savePage()"><i class="ri-save-line" id="save-page"></i></li>
                    <li><i class="ri-play-line"></i></li>
                    <li><button class="btn btn-primary btn-small">Publier</button></li>
                    <li><i class="ri-shield-user-line"></i></li>
                    -->

                    <?php if(!$inPreview): ?>
                        <li onclick="savePage()"><button class="btn btn-primary btn-line">Enregistrer</button></li>
                        <li><button class="btn btn-primary">Visualiser</button></li>
                    <?php else: ?>
                        <li onclick="editPage()"><button class="btn btn-primary">Editer la page</button></li>
                    <?php endif; ?>
                </ul>
            </section>
        </header>
        <main class="page-wrapper-body page-builder-main">
            <div class="sidebar-toggler sidebar-toggler-left">
                <input type="checkbox" id="builder-left-toggler" checked onchange="closeShutters(this, 'componentsShutter')">
                <label for="builder-left-toggler"><i class="ri-arrow-left-line"></i></label>
            </div>
            <div class="sidebar-toggler sidebar-toggler-right">
                <input type="checkbox" id="builder-right-toggler" checked onchange="closeShutters(this, 'editorShutter')">
                <label for="builder-right-toggler"><i class="ri-arrow-right-line"></i></label>
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
                            <div class="components-preview sortable-navigation-models">
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/navbar1.html">
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
                                <div class="components" data-partial-src="{{origin}}/login">
                                    <label>Form login</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Header2.svg"></i>
                                    </div>
                                </div>
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
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/header.html">
                                    <label>Header</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/heading.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/text.html">
                                    <label>Paragraph</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/paragraph.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/button.html">
                                    <label>Button</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/button.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/dropdown.html">
                                    <label>Dropdown</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/text.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/icon.html">
                                    <label>Icon</label>
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
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/link.html">
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
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/container.html">
                                    <label>Container</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/container.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/col2.html">
                                    <label>2 Colonnes</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/col2.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/col3.html">
                                    <label>3 Colonnes</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/col3.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/Components/col2_1-3.html">
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
            <section class="page-wrapper-body-container page-builder-main-editor">
                <div class="editor-container" editor-mode="pc">
                    <div class="editor-content">

                        <div class="editor-header sortable-navigation-container" id="page-header"><?= $site_navbar ?></div>
                        <div class="main sortable-container editable" editable-popup="false" id="page-content"><?= $currentPage["content"] ?></div>
                        <div class="editor-footer sortable-navigation-container" id="page-footer"><?= $site_footer ?></div>

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
                    <!--
                    <div class="btn-multiple-child">
                        <input type="radio" name="toolbar" id="toolbar-3">
                        <label for="toolbar-3">Global</label>
                    </div>
                    -->
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
                             id="editStyle-image"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-settings-image.html">
                        </div>
                        <hr>
                    </div>
                    <div class="accordion editor-accordion-settings" id="editor-setting-link">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Lien</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-link"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-settings-link.html">
                        </div>
                        <hr>
                    </div>
                    <div class="accordion editor-accordion-settings" id="editor-setting-icon">
                        <input type="checkbox" />
                        <label class="accordion-label">
                            <span>Icon</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </label>
                        <div class="accordion-panel editStyle-accordion"
                             id="editStyle-icon"
                             data-plugin="partial"
                             data-partial-src="/Views/Partial/Editor/editorTools-settings-icon.html">
                        </div>
                        <hr>
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