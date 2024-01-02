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
            <section class="page-builder-main-components">
                <div class="btn-multiple">
                    <div class="btn-multiple-child">
                        <input type="radio" name="choose-something" id="choose-something-1" checked>
                        <label for="choose-something-1">Mise en page</label>
                    </div>
                    <div class="btn-multiple-child">
                        <input type="radio" name="choose-something" id="choose-something-2">
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
                <div class="accordion">
                    <input type="checkbox" />
                    <label class="accordion-label">
                        <span>Navigation</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel">
                        <div class="components-preview">
                            <div class="components">
                                <label>Navbar</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar1.svg"></i>
                                </div>
                            </div>
                            <div class="components">
                                <label>Navbar centré</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar2.svg"></i>
                                </div>
                            </div>
                            <div class="components">
                                <label>Navbar replié</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Navbar3.svg"></i>
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
                        <div class="components-preview">
                            <div class="components">
                                <label>Header 1</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Header1.svg"></i>
                                </div>
                            </div>
                            <div class="components">
                                <label>Header 2</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Header2.svg"></i>
                                </div>
                            </div>
                            <div class="components">
                                <label>Header 2</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/Frame2.svg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="accordion">
                    <input type="checkbox" />
                    <label class="accordion-label">
                        <span>Cards</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel">
                        <div class="components-preview">
                            <div class="components">
                                <label>Header 1</label>
                                <div class="components-view">
                                    <i data-plugin="svg" data-svg-src="/assets/images/svg/editor-layouts/card1.svg"></i>
                                </div>
                            </div>
                        </div>
                        <section class="sortable-models" style="padding: 0 30px;">
                            <h1 class="hoverable editable editable-text">Titre</h1>
                            <hr>
                            <p class="hoverable editable editable-text"> Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Quo
                                adipisci modi
                                voluptatem, officia inventore ea voluptas expedita veniam facilis excepturi aut
                                perspiciatis, magnam
                                quis eum quae voluptatum aspernatur dolor nisi?</p>
                        </section>
                    </div>
                </div>
                <hr>

            </section>
            <section class="page-builder-main-editor">
                <div class="editor-container" editor-mode="pc">
                    <div class="editor-content">
                        <div class="header">
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
                        </div>

                        <div class="main sortable-container editable"></div>

                    </div>

                </div>
            </section>
            <section class="page-builder-main-tools">
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
                                    data-svg-src="/assets/images/svg/flex-align/align-vertical-center-line.svg"></i>
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
                                    data-svg-src="/assets/images/svg/flex-align/align-horizontal-center-line.svg"></i>
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


                <div class="accordion">
                    <input type="checkbox" checked/>
                    <label class="accordion-label">
                        <span>Tests</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel" id="props-general">

                    </div>
                </div>

                <hr>
                <div class="accordion">
                    <input type="checkbox" />
                    <label class="accordion-label">
                        <span>Dimension</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel">
                        <div class="edit-mp">
                            <div class="edit-mp-mtop">
                                <input type="text" edit-mp-input="margin-top" value="Auto" />
                            </div>
                            <div class="edit-mp-mid">
                                <div class="edit-mp-mleft">
                                    <input type="text" edit-mp-input="margin-left" value="Auto" />
                                </div>
                                <div class="edit-mp-p">
                                    <div class="edit-mp-pleft">
                                        <input type="text" edit-mp-input="padding-left" value="0" />
                                    </div>
                                    <div class="edit-mp-pmid">
                                        <input type="text" edit-mp-input="padding-top" value="0" />
                                        <div class="edit-mp-center">
                                            <i class="ri-link"></i>
                                        </div>
                                        <input type="text" edit-mp-input="padding-bottom" value="0" />
                                    </div>
                                    <div class="edit-mp-pright">
                                        <input type="text" edit-mp-input="padding-right" value="0" />
                                    </div>
                                </div>
                                <div class="edit-mp-mright">
                                    <input type="text" edit-mp-input="margin-right" value="Auto" />
                                </div>
                            </div>
                            <div class="edit-mp-mbot">
                                <input type="text" edit-mp-input="margin-bottom" value="Auto" />
                            </div>
                        </div>
                        <br>
                        <div class="edit-form-control">
                            <div class="edit-form fluid">
                                <label>Width</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="Auto" />
                                    <select class="edit-unit">
                                        <option value="" selected>-</option>
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="edit-form fluid">
                                <label>Height</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="Auto" />
                                    <select class="edit-unit">
                                        <option value="" selected>-</option>
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="edit-form-control">
                            <div class="edit-form fluid">
                                <label>Min W</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="0" />
                                    <select class="edit-unit">
                                        <option value="px" selected>px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="edit-form fluid">
                                <label>Min H</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="0" />
                                    <select class="edit-unit">
                                        <option value="px" selected>px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="edit-form-control">
                            <div class="edit-form fluid">
                                <label>Max W</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="None" />
                                    <select class="edit-unit">
                                        <option value="" selected>-</option>
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="edit-form fluid">
                                <label>Max H</label>
                                <div class="edit-form-inputs">
                                    <input type="text" placeholder="None" />
                                    <select class="edit-unit">
                                        <option value="" selected>-</option>
                                        <option value="px">px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="edit-form-control">
                            <div class="edit-form fluid">
                                <label>Ratio</label>
                                <div class="edit-form-inputs">
                                    <input type="number" min="0" placeholder="Auto" />
                                </div>
                            </div>
                            <div class="edit-form fluid">
                                /
                                <div class="edit-form-inputs">
                                    <input type="number" min="0" placeholder="Auto" />
                                </div>
                            </div>
                        </div>
                        <div class="edit-form fluid">
                            <label>Overflow</label>
                            <ul class="edit-form-inputs">
                                <li class="edit-form-toggler">
                                    <input id="overflow-visible" type="radio" name="overflow" value="visible" checked />
                                    <label for="overflow-visible"><i class="ri-eye-fill"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="overflow-hidden" type="radio" name="overflow" value="hidden" />
                                    <label for="overflow-hidden"><i class="ri-eye-off-line"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="overflow-scroll" type="radio" name="overflow" value="scroll" />
                                    <label for="overflow-scroll"><i class="ri-line-height"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="overflow-auto" type="radio" name="overflow" value="auto" />
                                    <label for="overflow-auto">Auto</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="accordion">
                    <input type="checkbox" />
                    <label class="accordion-label">
                        <span>Typography</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </label>
                    <div class="accordion-panel">
                        <div class="edit-form-control">
                            <div class="edit-form w-100">
                                <label>Font family</label>
                                <div class="edit-form-inputs">
                                    <select>
                                        <option value="Arial" selected>Arial</option>
                                        <option value="Helvetica">Helvetica</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Courier New">Courier New</option>
                                        <option value="Verdana">Verdana</option>
                                        <option value="Trebuchet MS">Trebuchet MS</option>
                                        <option value="Impact">Impact</option>
                                        <option value="Comic Sans MS">Comic Sans MS</option>
                                        <option value="Arial, sans-serif">Arial, sans-serif</option>
                                        <option value="Helvetica, sans-serif">Helvetica, sans-serif</option>
                                        <option value="Georgia, serif">Georgia, serif</option>
                                        <option value="Times New Roman, serif">Times New Roman, serif</option>
                                        <option value="Courier New, monospace">Courier New, monospace</option>
                                        <option value="Verdana, sans-serif">Verdana, sans-serif</option>
                                        <option value="Trebuchet MS, sans-serif">Trebuchet MS, sans-serif</option>
                                        <option value="Impact, sans-serif">Impact, sans-serif</option>
                                        <option value="Comic Sans MS, cursive">Comic Sans MS, cursive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="edit-form-control">
                            <div class="edit-form w-50">
                                <label>Font size</label>
                                <div class="edit-form-inputs">
                                    <input type="number" value="45" />
                                    <select class="edit-unit">
                                        <option value="px" selected>px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                    </select>
                                </div>
                            </div>
                            <div class="edit-form w-50">
                                <label>Font weight</label>
                                <div class="edit-form-inputs">
                                    <select>
                                        <option value="100">Thin</option>
                                        <option value="200">Extra-Light</option>
                                        <option value="300">Light</option>
                                        <option value="400" selected>Normal</option>
                                        <option value="500">Medium</option>
                                        <option value="600">Semi-Bold</option>
                                        <option value="700">Bold</option>
                                        <option value="800">Extra-Bold</option>
                                        <option value="900">Ultra-Bold</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="edit-form-control">
                            <div class="edit-form">
                                <label>Letter spacing</label>
                                <div class="edit-form-inputs">
                                    <input type="number" value="16" />
                                    <select class="edit-unit">
                                        <option value="px" selected>px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                        <option value="vh">vh</option>
                                        <option value="vw">vw</option>
                                    </select>
                                </div>
                            </div>
                            <div class="edit-form">
                                <label>Line height</label>
                                <div class="edit-form-inputs">
                                    <input type="number" value="16" />
                                    <select class="edit-unit">
                                        <option value="px" selected>px</option>
                                        <option value="%">%</option>
                                        <option value="em">em</option>
                                        <option value="rem">rem</option>
                                        <option value="vh">vh</option>
                                        <option value="vw">vw</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="edit-form">
                            <label>Couleur</label>
                            <div class="edit-form-inputs">
                                <input type="color" value="#FFFFFF" />
                                <input type="text" value="#FFFFFF" />
                            </div>
                        </div>
                        <br>
                        <div class="edit-form">
                            <label>Align</label>
                            <ul class="edit-form-inputs">
                                <li class="edit-form-toggler">
                                    <input id="text-align-left" type="radio" name="text-align" value="visible"
                                        checked />
                                    <label for="text-align-left"><i class="ri-align-left"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="text-align-center" type="radio" name="text-align" value="hidden" />
                                    <label for="text-align-center"><i class="ri-align-center"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="text-align-right" type="radio" name="text-align" value="scroll" />
                                    <label for="text-align-right"><i class="ri-align-right"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="text-align-justify" type="radio" name="text-align" value="auto" />
                                    <label for="text-align-justify"><i class="ri-align-justify"></i></label>
                                </li>
                            </ul>
                        </div>
                        <div class="edit-form">
                            <label>Decoration</label>
                            <ul class="edit-form-inputs">
                                <li class="edit-form-toggler">
                                    <input id="text-decoration-none" type="radio" name="text-decoration" value="none"
                                        checked />
                                    <label for="text-decoration-none"><i class="ri-close-line"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="text-decoration-overline" type="radio" name="text-decoration"
                                        value="underline" />
                                    <label for="text-decoration-overline"><i class="ri-underline"></i></label>
                                </li>
                                <li class="edit-form-toggler">
                                    <input id="text-decoration-line-through" type="radio" name="text-decoration"
                                        value="line-through" />
                                    <label for="text-decoration-line-through"><i class="ri-strikethrough"></i></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </section>
        </main>
    </div>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/src/js/components/accordion.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
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