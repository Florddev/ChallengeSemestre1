<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <script src="/assets/dist/js/sortable.js"></script>
    <title>Page builder</title>
</head>

<body>

    <div class="page-builder">
        <header class="page-builder-header">
            <section class="page-builder-header-start">
                <h1>Wisp - Accueil</h1>
                <p>https://wisp.com</p>
            </section>
            <section class="page-builder-header-mid">
                <div class="header-mid-start"></div>
                <div class="header-mid-center">
                    <ul class="editor-responsive">
                        <li class="active"><i class="ri-computer-fill"></i></li>
                        <li><i class="ri-tablet-line"></i></li>
                        <li><i class="ri-smartphone-line"></i></li>
                    </ul>
                    <ul class="editor-size">
                        <li>1440 <span>px</span></li>
                        <li><span>/</span></li>
                        <li>60 <span>%</span></li>
                    </ul>
                </div>
                <div class="header-mid-end">
                    <i class="ri-arrow-go-back-fill active"></i>
                    <i class="ri-arrow-go-forward-fill"></i>
                </div>
            </section>
            <section class="page-builder-header-end">
                <ul class="header-end-list">
                    <li><i class="ri-save-line"></i></li>
                    <li><i class="ri-play-line"></i></li>
                    <li><button class="btn btn-primary btn-small">Publier</button></li>
                    <li><i class="ri-shield-user-line"></i></li>
                </ul>
            </section>
        </header>
        <main class="page-builder-main">
            <div class="main-components-toggler left">
                <input type="checkbox" id="left-toggler" onchange="closeShutters(this, 'componentsShutter')">
                <label for="left-toggler"><i class="ri-arrow-left-line"></i></label>
            </div>
            <div class="main-components-toggler right">
                <input type="checkbox" id="right-toggler" onchange="closeShutters(this, 'editorShutter')">
                <label for="right-toggler"><i class="ri-arrow-right-line"></i></label>
            </div>

            <section class="page-builder-main-components" id="componentsShutter">
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
                                <!--
                                <div class="components">
                                    <label>Navbar centré</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar2.svg"></i>
                                    </div>
                                </div>
                                <div class="components" data-partial-src="/Views/Partial/Editor/components/navbar1.html">
                                    <label>Navbar replié</label>
                                    <div class="components-view">
                                        <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar3.svg"></i>
                                    </div>
                                </div>
                                -->
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
            <section class="page-builder-main-editor">
                <div class="editor-container" editor-mode="pc">
                    <div class="editor-content">
                        <!--
                        <div class="navbar" nav-is-fixed="true">
                            <nav class="nav container">
                                <a class="nav__logo" href="#">Wisp' Blog</a>
                                <div class="nav__menu" data-modal="search">
                                    <ul class="nav__list sortable-element">
                                        <li class="nav__item editable"><a class="nav__link" href="#">Accueil</a></li>
                                        <li class="nav__item editable"><a class="nav__link" href="#">A&nbsp;propos</a>
                                        </li>
                                        <li class="nav__item editable"><a class="nav__link" href="#">Blog</a></li>
                                        <li class="nav__item editable"><a class="nav__link" href="#">Contact</a>
                                        </li>
                                    </ul>
                                    <div class="nav__close" data-modal-toggle="nav-menu">
                                        <i class="ri-close-line"></i>
                                    </div>
                                </div>
                                <div class="nav__actions">
                                    <i class="ri-search-line nav__search" data-modal-trigger="search"></i>
                                    <i class="ri-user-line nav__login" data-modal-trigger="login"></i>
                                    <div class="nav__toggle" data-modal-toggle="nav-menu">
                                        <i class="ri-menu-line"></i>
                                    </div>
                                </div>
                            </nav>
                            <div class="search" data-modal="search">
                                <form class="search__form" action="">
                                    <i class="ri-search-line search__icon"></i>
                                    <input class="search__input" type="search" placeholder="Que recherchez vous ?">
                                </form>
                                <i class="ri-close-line search__close" data-modal-toggle="search"></i>
                            </div>
                            <div class="login" data-modal="login">
                                <form class="login__form" action="">
                                    <h2 class="login__title">Connexion</h2>
                                    <div class="login__group">
                                        <div class="login__item">
                                            <label class="login__label" for="email">Email</label>
                                            <input class="login__input" type="email" placeholder="Entrez votre email"
                                                   id="email">
                                        </div>
                                        <div class="login__item">
                                            <label class="login__label" for="password">Password</label>
                                            <input class="login__input" type="password"
                                                   placeholder="Entrez votre mot de passe" id="password">
                                        </div>
                                    </div>
                                    <div class="login__register">
                                        <p class="login__signup">
                                            Avez-vous un compte ? <a href="#">S'enregistrer</a>
                                        </p>
                                        <a class="login__forgot" href="#">Mot de passe oublié</a>
                                        <button class="btn btn-primary btn-lg" type="button">Se connecter</button>
                                    </div>
                                </form>
                                <i class="ri-close-line login__close" data-modal-toggle="login"></i>
                            </div>
                        </div>
                        -->

                        <div class="main sortable-container editable" editable-popup="false"></div>

                    </div>
                </div>
            </section>
            <section class="page-builder-main-tools" id="editorShutter">
                <div class="btn-multiple">
                    <div class="btn-multiple-child">
                        <input type="radio" name="toolbar" id="toolbar-1" checked>
                        <label for="toolbar-1">Style</label>
                    </div>
                    <div class="btn-multiple-child">
                        <input type="radio" name="toolbar" id="toolbar-2">
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
                <div class="edit-form">
                    <ul class="edit-form-inputs fluid">
                        <li class="edit-form-toggler">
                            <input id="align-horizontal-left" type="radio" name="align-horizontal" value="visible"
                                checked />
                            <label for="align-horizontal-left">
                                <i data-plugin="svg" data-svg-src="/assets/images/svg/flex-align/align-left-line.svg"></i>
                            </label>
                        </li>
                        <li class="edit-form-toggler">
                            <input id="align-horizontal-mid" type="radio" name="align-horizontal" value="hidden" />
                            <label for="align-horizontal-mid">
                                <i data-plugin="svg"
                                    data-svg-src="/assets/images/svg/flex-align/align-horizontal-center-line.svg"></i>
                            </label>
                        </li>
                        <li class="edit-form-toggler">
                            <input id="align-horizontal-right" type="radio" name="align-horizontal" value="scroll" />
                            <label for="align-horizontal-right">
                                <i data-plugin="svg" data-svg-src="/assets/images/svg/flex-align/align-right-line.svg"></i>
                            </label>
                        </li>
                        <li class="edit-form-toggler">
                            <input id="align-vertical-top" type="radio" name="align-vertical" value="auto" />
                            <label for="align-vertical-top">
                                <i data-plugin="svg" data-svg-src="/assets/images/svg/flex-align/align-top-line.svg"></i>
                            </label>
                        </li>
                        <li class="edit-form-toggler">
                            <input id="align-vertical-mid" type="radio" name="align-vertical" value="auto" />
                            <label for="align-vertical-mid">
                                <i data-plugin="svg"
                                    data-svg-src="/assets/images/svg/flex-align/align-vertical-center-line.svg"></i>
                            </label>
                        </li>
                        <li class="edit-form-toggler">
                            <input id="align-vertical-bot" type="radio" name="align-vertical" value="auto" />
                            <label for="align-vertical-bot">
                                <i data-plugin="svg" data-svg-src="/assets/images/svg/flex-align/align-bottom-line.svg"></i>
                            </label>
                        </li>
                    </ul>
                </div>
                <hr>


                <div class="accordion editor-accordion">
                    <input type="checkbox"/>
                    <label class="accordion-label">
                        <span>Dimension</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel"
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
                    <div class="accordion-panel"
                         id="editStyle-typo"
                         data-plugin="partial"
                         data-partial-src="/Views/Partial/Editor/editorTools-typo.html">
                    </div>
                    <hr>
                </div>
            </section>
        </main>
    </div>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/src/js/components/accordion.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/src/js/components/navtab.js"></script>
    <script src="/assets/dist/js/pageBuilder.js"></script>
    <script src="/assets/dist/js/draggableInput.js"></script>
    <script>
        // Fonction pour charger le contenu du fichier SVG
        function loadSVG(url) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);  // Le troisième paramètre indique une requête synchrone
            xhr.send();

            if (xhr.status === 200) {
                return xhr.responseText;
            } else {
                console.error("Erreur de chargement du fichier SVG");
                return null;
            }
        }

        _('[data-plugin="svg"]').forEach(e => {
            _(e).html(loadSVG(_(e).attr("data-svg-src")));
        });
    </script>
</body>

</html>