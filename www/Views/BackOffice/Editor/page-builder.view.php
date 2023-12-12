<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/dist/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <script src="../assets/dist/js/sortable.js"></script>
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
    </style>
</head>

<body>

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
                                <h1 class="editable editable-text">Titre</h1>
                                <hr>
                                <p class="editable editable-text"> Lorem ipsum dolor sit amet consectetur adipisicing
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
                                    style="background-image: url(../assets/images/banner.jpg);">
                                </section>
                                <hr>
                                <section class="banner banner-text editable"
                                    style="background-image: url(../assets/images/banner.jpg);">
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
                                <article class="card sortable-element editable">
                                    <img src="../assets/images/card.jpg" class="editable" alt="cardImage"
                                        style="position: absolute;">
                                    <h1 class="editable editable-text">Card title</h1>
                                    <p class="editable editable-text">Lorem, ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Dicta nobis
                                        reprehenderit fugiat, omnis
                                        nesciunt dolorem alias corporis saepe.</p>
                                    <a href="#" class="editable editable-text btn btn-primary btn-sm">Button</a>
                                </article>
                                <hr>
                                <article class="card card-full sortable-element editable">
                                    <img src="../assets/images/card.jpg" alt="cardImage">
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
    </main>
    <script src="../assets/src/js/components/tabnav.js"></script>
    <script src="../assets/src/js/components/navbar.js"></script>
    <script src="../assets/dist/js/pageBuilder.js"></script>
    <script src="../assets/dist/js/draggableInput.js"></script>
    <script>

        // editable => can-be-edited
    </script>
</body>

</html>