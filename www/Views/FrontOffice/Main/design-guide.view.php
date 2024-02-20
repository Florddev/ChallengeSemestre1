<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/main.css">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--white);
        }

        section {
            max-width: 1100px;
            margin-bottom: 2rem;
            width: 100%;
        }


        .content {
            background-color: green;
            height: 2rem;
            border: solid 3px red;
        }

        .section-btn label {
            text-align: right;
            display: inline-block;
            min-width: 6rem;
            margin-right: 1rem;
        }

        .btn {
            margin: 0 10px;
        }

        .btn-lg {
            margin: 0 2px;
        }

        .btn-sm {
            margin: 0 18px;
        }

        .btn-line {
            margin: 0 8px;
        }
    </style>
</head>

<body>
    <section>
        

<h1>.navbar</h1>
        <hr>
   
        <div class="navbar" draggable="false">
            <nav class="nav container">
                <a class="nav__logo" href="#">Logo</a>
                <div class="nav__menu" data-modal="search">
                    <ul class="nav__list">
                        <li class="nav__item"><a class="nav__link" href="#">Accueil</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">A propos</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Services</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Featured</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Contact me</a></li>
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
                            <input class="login__input" type="email" placeholder="Entrez votre email" id="email">
                        </div>
                        <div class="login__item">
                            <label class="login__label" for="password">Password</label>
                            <input class="login__input" type="password" placeholder="Entrez votre mot de passe"
                                id="password">
                        </div>
                    </div>
                    <div class="login__register">
                        <p class="login__signup">
                            Avez-vous un compte ? <a href="#">S'enregistrer</a>
                        </p>
                        <a class="login__forgot" href="#">Mot de passe oublié</a>
                        <button class="btn btn-primary btn-lg">Se connecter</button>
                    </div>
                </form>
                <i class="ri-close-line login__close" data-modal-toggle="login"></i>
            </div>
        </div>
        <br>
        <div class="navbar" draggable="false">
            <nav class="nav container">
                <a class="nav__logo" href="#">Logo</a>
                <div class="nav__menu" data-modal="search" style="margin-left: 0;">
                    <ul class="nav__list">
                        <li class="nav__item"><a class="nav__link" href="#">Accueil</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">A propos</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Services</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Featured</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Contact me</a></li>
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
                            <input class="login__input" type="email" placeholder="Entrez votre email" id="email">
                        </div>
                        <div class="login__item">
                            <label class="login__label" for="password">Password</label>
                            <input class="login__input" type="password" placeholder="Entrez votre mot de passe"
                                id="password">
                        </div>
                    </div>
                    <div class="login__register">
                        <p class="login__signup">
                            Avez-vous un compte ? <a href="#">S'enregistrer</a>
                        </p>
                        <a class="login__forgot" href="#">Mot de passe oublié</a>
                        <button class="btn btn-primary btn-lg">Se connecter</button>
                    </div>
                </form>
                <i class="ri-close-line login__close" data-modal-toggle="login"></i>
            </div>
        </div>
    </section>


    <section class="section-btn">
        <h1>.btn</h1>
        <hr>
        <p>
            <label>btn-sm</label>
            <button class="btn btn-primary btn-sm">Primary</button>
            <a href="#" class="btn btn-secondary btn-sm">Secondary</a>
            <a href="#" class="btn btn-danger btn-sm">Danger</a>
            <a href="#" class="btn btn-success btn-sm">Success</a>
            <a href="#" class="btn btn-info btn-sm">Info</a>
            <a href="#" class="btn btn-warning btn-sm">Warning</a>
        </p>
        <p>
            <label>btn-lg</label>
            <button class="btn btn-primary btn-lg">Primary</button>
            <a href="#" class="btn btn-secondary btn-lg">Secondary</a>
            <a href="#" class="btn btn-danger btn-lg">Danger</a>
            <a href="#" class="btn btn-success btn-lg">Success</a>
            <a href="#" class="btn btn-info btn-lg">Info</a>
            <a href="#" class="btn btn-warning btn-lg">Warning</a>
        </p>
        <p>
            <label> </label>
            <button class="btn btn-primary">Primary</button>
            <a href="#" class="btn btn-secondary">Secondary</a>
            <a href="#" class="btn btn-danger">Danger</a>
            <a href="#" class="btn btn-success">Success</a>
            <a href="#" class="btn btn-info">Info</a>
            <a href="#" class="btn btn-warning">Warning</a>
        </p>
        <p>
            <label>btn-line</label>
            <button class="btn btn-primary btn-line">Primary</button>
            <a href="#" class="btn btn-secondary btn-line">Secondary</a>
            <a href="#" class="btn btn-danger btn-line">Danger</a>
            <a href="#" class="btn btn-success btn-line">Success</a>
            <a href="#" class="btn btn-info btn-line">Info</a>
            <a href="#" class="btn btn-warning btn-line">Warning</a>
        </p>
        <p>
            <label>btn-round</label>
            <button class="btn btn-primary btn-round">Primary</button>
            <a href="#" class="btn btn-secondary btn-round">Secondary</a>
            <a href="#" class="btn btn-danger btn-round">Danger</a>
            <a href="#" class="btn btn-success btn-round">Success</a>
            <a href="#" class="btn btn-info btn-round">Info</a>
            <a href="#" class="btn btn-warning btn-round">Warning</a>
        </p>
        <p style="background-color: var(--secondary); padding: 20px 0;">
            <label style="color: var(--white);">btn-dark</label>
            <button class="btn btn-dark btn-primary">Primary</button>
            <a href="#" class="btn btn-dark btn-secondary">Secondary</a>
            <a href="#" class="btn btn-dark btn-danger">Danger</a>
            <a href="#" class="btn btn-dark btn-success">Success</a>
            <a href="#" class="btn btn-dark btn-info">Info</a>
            <a href="#" class="btn btn-dark btn-warning">Warning</a>

            <br><br><label style="color: var(--white);"></label>

            <button class="btn btn-dark btn-line btn-primary">Primary</button>
            <a href="#" class="btn btn-dark btn-line btn-secondary">Secondary</a>
            <a href="#" class="btn btn-dark btn-line btn-danger">Danger</a>
            <a href="#" class="btn btn-dark btn-line btn-success">Success</a>
            <a href="#" class="btn btn-dark btn-line btn-info">Info</a>
            <a href="#" class="btn btn-dark btn-line btn-warning">Warning</a>
        </p>
    </section>
    <section>
        <h1>.tabnav (.dark)</h1>
        <hr>
        <div class="tabnav" id="tabset1">
            <ul class="tabs">
                <li rel="tab1">Tab 1</li>
                <li rel="tab2">Tab 2</li>
                <li rel="tab3">Tab 3</li>
            </ul>
            <div class="tab_container">
                <h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1</h3>
                <div id="tab1" class="tab_content">
                    <h2>Tab 1 content</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac metus augue.</p>
                </div>
                <h3 class="tab_drawer_heading" rel="tab2">Tab 2</h3>
                <div id="tab2" class="tab_content">
                    <h2>Tab 2 content</h2>
                    <p>Nunc dui velit, scelerisque eu placerat volutpat, dapibus eu nisi. Vivamus eleifend
                        vestibulum odio non vulputate.</p>
                </div>
                <h3 class="tab_drawer_heading" rel="tab3">Tab 3</h3>
                <div id="tab3" class="tab_content">
                    <h2>Tab 3 content</h2>
                    <p>Nulla eleifend felis vitae velit tristique imperdiet. Etiam nec imperdiet elit. Pellentesque
                        sem lorem, scelerisque sed facilisis sed, vestibulum sit amet eros.</p>
                </div>
            </div>
        </div>
        <div class="tabnav dark" id="tabset2">
            <ul class="tabs">
                <li rel="tab4">Tab 4</li>
                <li rel="tab5">Tab 5</li>
                <li rel="tab6">Tab 6</li>
            </ul>
            <div class="tab_container">
                <h3 class="d_active tab_drawer_heading" rel="tab4">Tab 4</h3>
                <div id="tab4" class="tab_content">
                    <h2>Tab 4 content</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac metus augue.</p>
                </div>
                <h3 class="tab_drawer_heading" rel="tab5">Tab 5</h3>
                <div id="tab5" class="tab_content">
                    <h2>Tab 5 content</h2>
                    <p>Nunc dui velit, scelerisque eu placerat volutpat, dapibus eu nisi. Vivamus eleifend
                        vestibulum odio non vulputate.</p>
                </div>
                <h3 class="tab_drawer_heading" rel="tab6">Tab 6</h3>
                <div id="tab6" class="tab_content">
                    <h2>Tab 6 content</h2>
                    <p>Nulla eleifend felis vitae velit tristique imperdiet. Etiam nec imperdiet elit. Pellentesque
                        sem lorem, scelerisque sed facilisis sed, vestibulum sit amet eros.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1>.accordion</h1>
        <hr>
        <div class="accordion">
            <input id="toggle1" type="radio" class="accordion-toggle" name="toggle" />
            <label for="toggle1"><i class="fa fa-plus"></i> Accordion radio light </label>
            <section>
                <p>
                    Bacon ipsum dolor sit amet beef venison beef ribs kielbasa. Sausage pig leberkas, t-bone sirloin
                    shoulder bresaola. Frankfurter rump porchetta ham. Pork belly prosciutto brisket meatloaf short
                    ribs.
                </p>
                <p>
                    Brisket meatball turkey short loin boudin leberkas meatloaf chuck andouille pork loin pastrami
                    spare
                    ribs pancetta rump. Frankfurter corned beef beef tenderloin short loin meatloaf swine ground
                    round
                    venison.
                </p>
            </section>
        </div>
        <div class="accordion">
            <input id="toggle2" type="radio" class="accordion-toggle" name="toggle" />
            <label for="toggle2"><i class="fa fa-plus"></i> Accordion radio light</label>
            <section>
                <p>
                    Bacon ipsum dolor sit amet beef venison beef ribs kielbasa. Sausage pig leberkas, t-bone sirloin
                    shoulder bresaola. Frankfurter rump porchetta ham. Pork belly prosciutto brisket meatloaf short
                    ribs.
                </p>
                <p>
                    Brisket meatball turkey short loin boudin leberkas meatloaf chuck andouille pork loin pastrami
                    spare
                    ribs pancetta rump. Frankfurter corned beef beef tenderloin short loin meatloaf swine ground
                    round
                    venison.
                </p>
            </section>
        </div>
        <div class="accordion dark">
            <input id="toggle3" type="checkbox" class="accordion-toggle" name="toggle" />
            <label for="toggle3"><i class="fa fa-plus"></i> Accordion checkbox dark </label>
            <section>
                <p>
                    Bacon ipsum dolor sit amet beef venison beef ribs kielbasa. Sausage pig leberkas, t-bone sirloin
                    shoulder bresaola. Frankfurter rump porchetta ham. Pork belly prosciutto brisket meatloaf short
                    ribs.
                </p>
                <p>
                    Brisket meatball turkey short loin boudin leberkas meatloaf chuck andouille pork loin pastrami
                    spare
                    ribs pancetta rump. Frankfurter corned beef beef tenderloin short loin meatloaf swine ground
                    round
                    venison.
                </p>
            </section>
        </div>
        <div class="accordion dark">
            <input id="toggle4" type="checkbox" class="accordion-toggle" name="toggle" />
            <label for="toggle4"><i class="fa fa-plus"></i> Accordion checkbox dark</label>
            <section>
                <p>
                    Bacon ipsum dolor sit amet beef venison beef ribs kielbasa. Sausage pig leberkas, t-bone sirloin
                    shoulder bresaola. Frankfurter rump porchetta ham. Pork belly prosciutto brisket meatloaf short
                    ribs.
                </p>
                <p>
                    Brisket meatball turkey short loin boudin leberkas meatloaf chuck andouille pork loin pastrami
                    spare
                    ribs pancetta rump. Frankfurter corned beef beef tenderloin short loin meatloaf swine ground
                    round
                    venison.
                </p>
            </section>
        </div>
    </section>
    <section>
        <h1>.banner</h1>
        <hr>
        <div class="banner" style="background-image: url(assets/images/banner.jpg);"></div>
        <br>
        <div class="banner banner-text" style="background-image: url(assets/images/banner.jpg);">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis similique error qui nobis
                delectus
                quod debitis ab ratione, architecto deleniti repellendus, eligendi aliquid non. Placeat
                necessitatibus
                eaque tempora laboriosam possimus.</p>
        </div>
    </section>
    <section>
        <h1>.card</h1>
        <hr>
        <article class="card">
            <img src="assets/images/card.jpg" alt="cardImage">
            <h1>Card title</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nobis reprehenderit fugiat, omnis
                nesciunt dolorem alias corporis saepe.</p>
            <a href="#" class="button button-primary button-sm">Button</a>
        </article>
        <article class="card card-full">
            <img src="assets/images/card.jpg" alt="cardImage">
            <h1>Card title</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta nobis reprehenderit fugiat, omnis
                nesciunt dolorem alias corporis saepe.</p>
            <a href="#" class="button button-primary button-sm">Button</a>
        </article>
    </section>
    <section>
        <h1>.grid</h1>
        <hr>
        <h3>col-6</h3>
        <div class="row example">
            <div class="col-6">Colonne 2 avec offset</div>
            <div class="col-6">Colonne 2 avec offset</div>
        </div>
        <hr>
        <h3>col-sm-6</h3>
        <div class="row example">
            <div class="col-sm-6">Colonne 2 avec offset</div>
            <div class="col-sm-6">Colonne 2 avec offset</div>
        </div>
        <hr>
        <h3>col-md-6</h3>
        <div class="row example">
            <div class="col-md-6">Colonne 2 avec offset</div>
            <div class="col-md-6">Colonne 2 avec offset</div>
        </div>
        <hr>
        <h3>col-lg-6</h3>
        <div class="row example">
            <div class="col-lg-6">Colonne 2 avec offset</div>
            <div class="col-lg-6">Colonne 2 avec offset</div>
        </div>
        <hr>
        <h3>col-xl-6</h3>
        <div class="row example">
            <div class="col-xl-6">Colonne 2 avec offset</div>
            <div class="col-xl-6">Colonne 2 avec offset</div>
        </div>
        <h1>.footer</h1>
        <hr>

        <footer class="footer">
            <div class="footer__logo">
                Wisp's
            </div>

            <div class="footer__links">
                <a href="#">Accueil</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
                <a href="#">À propos</a>
                <a href="#">FAQ</a>
                <!-- Ajoutez autant de liens que nécessaire -->
            </div>

            <div class="footer__copy">
                <p>&copy; <?php echo date("Y"); ?> Wisp's. Tous droits réservés.</p>
            </div>
        </footer>
    </section>
    <script src="src/js/components/tabnav.js"></script>
    <script src="src/js/components/navbar.js"></script>
    <script>
        initNavBar(document);
    </script>
</body>

</html>

<?php;