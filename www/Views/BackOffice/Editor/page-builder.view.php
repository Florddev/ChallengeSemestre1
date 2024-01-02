<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <script src="/assets/dist/js/sortable.js"></script>
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: var(--secondary);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 6px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: var(--dark);
        }
        #hoverContent {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
            z-index: 10;
            display: none;
            max-width: 300px; /* Ajustez la largeur maximale selon vos besoins */
            padding: 10px;
        }


        .edit-mp input {
            width: 50px;
            text-align: center;
            background-color: transparent;
            border: 0;
            outline: none;
        }

        .edit-mp {
            width: fit-content;
            /* A adapter si besoin */
            position: relative;
            display: flex;
            flex-direction: column;
            border: 2px solid #f5f5f5;
            border-radius: 6px;
        }

        .edit-mp .edit-mp-mtop,
        .edit-mp .edit-mp-mbot {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 40px;
        }

        /*.edit-mp .edit-mp-mtop{
            align-items: start;
        }
        .edit-mp .edit-mp-mbot {
            align-items: end;
        }*/

        .edit-mp .edit-mp-mid {
            display: flex;
            justify-content: space-between;
        }

        .edit-mp .edit-mp-mright,
        .edit-mp .edit-mp-mleft {
            display: flex;
            align-items: center;
            padding: 0 5px;
        }

        .edit-mp-p {
            position: relative;
            padding: 10px 5px;
            display: flex;
            border-radius: 6px;
            justify-content: space-around;
            border: 2px solid dodgerblue;
        }

        .edit-mp-p::before,
        .edit-mp::before {
            color: grey;
            position: absolute;
            top: 5px;
            left: 5px;
            font-size: 10px;
            text-transform: uppercase;
        }

        .edit-mp::before {
            content: 'Margin';
        }

        .edit-mp-p::before {
            content: 'Padding';
        }

        .edit-mp-pleft,
        .edit-mp-pright {
            display: flex;
            align-items: center;
        }

        .edit-mp-pmid {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .edit-mp-center {
            display: flex;
            padding: 7.5px 20px;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 6px;
            margin: 5px 0;
            cursor: pointer;
        }

        .edit-mp-mleft:before,
        .edit-mp-mtop:before,
        .edit-mp-mright:before,
        .edit-mp-mbot:before {
            content: '';
            width: 8px;
            height: 8px;
            position: absolute;
            background-color: #f5f5f5;
        }

        .edit-mp-mleft:before {
            right: 100%;
            transform: translateX(3px);
        }

        .edit-mp-mtop:before {
            bottom: 100%;
            transform: translateY(3px);
        }

        .edit-mp-mright:before {
            left: 100%;
            transform: translateX(-3px);
        }

        .edit-mp-mbot:before {
            top: 100%;
            transform: translateY(-3px);
        }

        .edit-mp-pmid:before,
        .edit-mp-pleft:before,
        .edit-mp-pright:before,
        .edit-mp-pmid:after {
            content: '';
            width: 8px;
            height: 8px;
            position: absolute;
            background-color: dodgerblue;
        }

        .edit-mp-pmid:before {
            bottom: 100%;
            transform: translateY(3px);
        }

        .edit-mp-pmid:after {
            top: 100%;
            transform: translateY(-3px);
        }

        .edit-mp-pleft:before {
            right: 100%;
            transform: translateX(3px);
        }

        .edit-mp-pright:before {
            left: 100%;
            transform: translateX(-3px);
        }

        /*
                .accordion .sortable-models {
                    display: inline-block;
                    max-width: 200px !important;
                    max-height: 200px !important;
                }

                .accordion .sortable-models > * {
                    width: calc(100% - 200px);
                    height: calc(100% - 200px);
                }

         */

    </style>
</head>

<body>

    <div id="hoverContent"></div>

    <div id="editor-final-view">
        <div class="close">
            <i class="ri-eye-off-line"></i>
        </div>
        <div class="content">

        </div>
    </div>

    <header class="editor-header">
        <ul class="editor-mode">
            <li class="active" editor-mode="pc"><i class="ri-computer-line"></i> Computer</li>
            <li editor-mode="pad"><i class="ri-tablet-line" style="transform: rotate(90deg);"></i> Tablette</li>
            <li editor-mode="phone"><i class="ri-smartphone-line"></i> Phone</li>
        </ul>
        <a href="#">Whisp' Editor</a>
        <ul class="editor-actions">
            <li editor-action="edit"><i class="ri-edit-box-line"></i> Editer</li>
            <li editor-action="view"><i class="ri-eye-line"></i> Visualiser</li>
            <li editor-action="save"><i class="ri-save-line"></i> Sauvegarder</li>
            <li editor-action="clear"><i class="ri-delete-bin-6-line"></i> Supprimer</li>
        </ul>
    </header>
    <main class="editor-body">
        <section class="editor-toolbar">
            <div class="tabnav dark" id="tabset1">
                <ul class="tabs">
                    <li rel="props">Props</li>
                    <li rel="components">Components</li>
                    <li rel="style">Général</li>
                </ul>
                <div class="tab_container d_active" rel="props">
                    <div id="props" class="tab_content">
                        <div class="accordion dark">
                            <input id="props-general-accordion" type="checkbox" class="accordion-toggle"
                                   name="toggle" />
                            <label for="props-general-accordion"><i class="ri-add-line"></i> Général</label>
                            <section id="props-general">

                            </section>
                        </div>
                        <div class="accordion dark">
                            <input id="accordion-dimension" type="checkbox" class="accordion-toggle" name="toggle" />
                            <label for="accordion-dimension"><i class="ri-add-line"></i> Dimension</label>
                            <section>


                            </section>
                        </div>
                        <div class="accordion dark">
                            <input id="accordion-typographie" type="checkbox" class="accordion-toggle" name="toggle" />
                            <label for="accordion-typographie"><i class="ri-add-line"></i> Typography</label>
                            <section>


                            </section>
                        </div>
                        <div class="accordion dark">
                            <input id="accordion-decoration" type="checkbox" class="accordion-toggle" name="toggle" />
                            <label for="accordion-decoration"><i class="ri-add-line"></i> Decorations</label>
                            <section>


                            </section>
                        </div>
                    </div>
                    <div id="components" class="tab_content" rel="components">
                        <div class="accordion dark">
                            <input id="accordion-text" type="radio" class="accordion-toggle" name="toggle" />
                            <label for="accordion-text"><i class="ri-add-line"></i> Texte</label>
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
                        <div class="accordion dark">
                            <input id="accordion-colums" type="radio" class="accordion-toggle" name="toggle" />
                            <label for="accordion-colums"><i class="ri-add-line"></i> Columns</label>
                            <section class="sortable-models" style="padding: 0 30px;">
                                <div class="container editable sortable-element">
                                    <p class="editable editable-text">Container</p>
                                </div>
                                <hr>
                                <!-- <div class="row editable sortable-element">
                                    <div class="col-8 offset-2 editable sortable-element">
                                        <p class="editable editable-text">Container</p>
                                    </div>
                                </div>
                                <hr> -->
                                <div class="row editable sortable-element">
                                    <div class="col-sm-6 editable sortable-element">
                                        <p class="editable editable-text">Colonne 1</p>
                                    </div>
                                    <div class="col-sm-6 editable sortable-element">
                                        <p class="editable editable-text">Colonne 2</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row editable sortable-element">
                                    <div class="col-md-4 editable sortable-element">
                                        <p class="editable editable-text">Colonne 1</p>
                                    </div>
                                    <div class="col-md-4 editable sortable-element">
                                        <p class="editable editable-text">Colonne 2</p>
                                    </div>
                                    <div class="col-md-4 editable sortable-element">
                                        <p class="editable editable-text">Colonne 3</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="accordion dark">
                            <input id="accordion-headers" type="radio" class="accordion-toggle" name="toggle" />
                            <label for="accordion-headers"><i class="ri-add-line"></i> Headers</label>
                            <section class="sortable-models">
                                <section class="banner editable"
                                         style="background-image: url(/assets/images/banner.jpg);">
                                </section>
                                <hr>
                                <section class="banner banner-text editable"
                                         style="background-image: url(/assets/images/banner.jpg);">
                                    <p class="editable editable-text">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit.
                                        Perferendis
                                        similique error qui nobis delectus
                                        quod debitis ab ratione, architecto deleniti repellendus, eligendi aliquid
                                        non. Placeat
                                        necessitatibus
                                        eaque tempora laboriosam possimus.</p>
                                </section>
                            </section>
                        </div>
                        <div class="accordion dark">
                            <input id="accordion-cards" type="radio" class="accordion-toggle" name="toggle" />
                            <label for="accordion-cards"><i class="ri-add-line"></i> Cards</label>
                            <section class="sortable-models">
                                <article class="hoverable card sortable-element editable">
                                    <img src="/assets/images/card.jpg" class="editable" alt="cardImage"
                                         style="position: absolute;">
                                    <h1 class="editable editable-text">Card title</h1>
                                    <p class="editable editable-text">Lorem, ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Dicta nobis
                                        reprehenderit fugiat, omnis
                                        nesciunt dolorem alias corporis saepe.</p>
                                    <a href="#" class="editable editable-text btn btn-primary btn-sm">Button</a>
                                </article>
                            </section>
                            <section class="sortable-models">
                                <article class="hoverable card card-full sortable-element editable">
                                    <img src="/assets/images/card.jpg" alt="cardImage">
                                    <h1 class="editable editable-text">Card title</h1>
                                    <p class="editable editable-text">Lorem, ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Dicta nobis
                                        reprehenderit fugiat, omnis
                                        nesciunt dolorem alias corporis saepe.</p>
                                    <a href="#" class="editable editable-text btn btn-primary btn-sm">Button</a>
                                </article>
                            </section>
                        </div>
                    </div>
                    <div id="style" class="tab_content" rel="style">
                        <p>Parametres généraux de la page, titre, style de la navbar, couleurs du background et
                            couleurs local etc</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="editor-container">
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

                <div class="main sortable-container"></div>

            </div>
        </section>

    </main>
    <script src="/assets/dist/js/wispQuery.js"></script>
    <script src="/assets/src/js/components/tabnav.js"></script>
    <script src="/assets/src/js/components/navbar.js"></script>
    <script src="/assets/dist/js/pageBuilder.js"></script>
    <script src="/assets/dist/js/draggableInput.js"></script>
    <script>
        /*
        document.addEventListener('DOMContentLoaded', function () {
            var hoverables = document.querySelectorAll('.hoverable');
            var hoverContent = document.getElementById('hoverContent');

            hoverables.forEach(function (hoverable) {
                hoverable.addEventListener('mouseover', function () {
                    var contentHTML = this.outerHTML;

                    hoverContent.innerHTML = contentHTML;
                    hoverContent.style.display = 'block';
                    hoverContent.style.transform = 'scale(1.2)';

                    // Positionnement du hoverContent à gauche de l'élément survolé
                    var rect = this.getBoundingClientRect();
                    hoverContent.style.top = rect.top + 'px';
                    //hoverContent.style.left = rect.left - hoverContent.offsetWidth*1.5 + 'px';
                    hoverContent.style.left = rect.right*1.1 + 'px';
                });

                hoverable.addEventListener('mouseout', function () {
                    hoverContent.style.display = 'none';
                });
            });
        });
         */
        // editable => can-be-edited
    </script>
</body>

</html>