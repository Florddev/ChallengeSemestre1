document.addEventListener("DOMContentLoaded", function() {
    // Votre code JavaScript ici
    var path = window.location.pathname;
    var items = document.querySelectorAll('.item-sidebar');

    var liItems = document.querySelectorAll('.list-liens-sidebar ul li');

    // Supprimer la classe active de tous les li et gérer la visibilité
    liItems.forEach(function(li) {
        li.classList.remove('active');
        // Exemple : masquer tous les li, sauf ceux nécessaires pour certaines URL
        li.style.display = 'none';
    });

    // Supprimer la classe active de tous les éléments
    items.forEach(function(item){
        item.classList.remove('active');
    });

    // Ajouter la classe active à l'élément correspondant
    if(path === '/dashboard') {
        document.querySelector('.ri-home-3-line').parentNode.classList.add('active');
        var liAccueil = document.querySelector('.list-liens-sidebar ul li:nth-child(1)');
        liAccueil.classList.add('active');
        liAccueil.style.display = 'flex'
    } else if(path.startsWith('/dashboard/articles')) {
        document.querySelector('.ri-news-line').parentNode.classList.add('active');
        var liMesArticles = document.querySelector('.list-liens-sidebar ul li:nth-child(2)');
        liMesArticles.classList.add('active');
        liMesArticles.style.display = 'flex'; // Rendre visible
    } else if(path.startsWith('/dashboard/users')) {
        document.querySelector('.ri-user-settings-line').parentNode.classList.add('active');
        var liUsers = document.querySelector('.list-liens-sidebar ul li:nth-child(3)');
        liUsers.classList.add('active');
        liUsers.style.display = 'flex'
    } else if(path.startsWith('/dashboard/builder')) {

        document.querySelector('.ri-file-copy-2-line').parentNode.classList.add('active');
        var liBuilder = document.querySelector('.list-liens-sidebar ul li:nth-child(1)');
        liBuilder.classList.add('active');
        liBuilder.style.display = 'flex'
    }
    // Vous pouvez ajouter plus de conditions ici pour d'autres chemins
});

