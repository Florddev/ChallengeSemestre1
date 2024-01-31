<div class="main" editable-popup="false" id="page-content" style="background-color: white; padding-top: 5rem">
    <div class="navbar editable" nav-is-fixed="true" draggable="false">
        <nav class="nav container">
            <a class="nav__logo" href="#" draggable="false">Wisp' Blog</a>
            <div class="nav__menu" data-modal="search">
                <ul class="nav__list sortable-element" data-sortable="true">
                    <li class="nav__item editable"><a class="nav__link" href="#" draggable="false">Accueil</a></li>
                    <li class="nav__item editable"><a class="nav__link" href="#" draggable="false">A&nbsp;propos</a>
                    </li>
                    <li class="nav__item editable"><a class="nav__link" href="#" draggable="false">Blog</a></li>
                    <li class="nav__item editable"><a class="nav__link" href="#" draggable="false">Contact</a>
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
                        <input class="login__input" type="email" placeholder="Entrez votre email" id="email">
                    </div>
                    <div class="login__item">
                        <label class="login__label" for="password">Password</label>
                        <input class="login__input" type="password" placeholder="Entrez votre mot de passe" id="password">
                    </div>
                </div>
                <div class="login__register">
                    <p class="login__signup">
                        Avez-vous un compte ? <a href="#" draggable="false">S'enregistrer</a>
                    </p>
                    <a class="login__forgot" href="#" draggable="false">Mot de passe oublié</a>
                    <button class="btn btn-primary btn-lg" type="button">Se connecter</button>
                </div>
            </form>
            <i class="ri-close-line login__close" data-modal-toggle="login"></i>
        </div>
    </div>
    <div class="container" style="max-width: 1120px; padding-top: 100px; padding-bottom: 50px;">
        <div style="color: rgb(110, 112, 118); text-transform: uppercase; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
            Catégorie: <span id="currentCategory"><?= $currentArticle["Category"]->getLabel() ?></span>
        </div>
        <div id="article-title" class="editable editable-text" editable-popup="false" style="font-size: 64px; font-weight: 800; margin-top: 30px; margin-bottom: 30px;" data-sortable="true">
            <?= $currentArticle["title"] ?>
        </div>
        <div style="color: rgb(110, 112, 118); text-transform: none; letter-spacing: 2px; font-size: 13px; font-weight: 500;">
            <?= $currentArticle["Creator"]->getLogin() ?>, <?=  $currentArticle["convertedDate"] ?>
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
</div>