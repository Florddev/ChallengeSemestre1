function initNavBar(element) {
    const navBars = element.querySelectorAll(".navbar");
    navBars.forEach(navBar => {
        const navMenu = navBar.querySelector(".nav__menu");
        const navToggle = navBar.querySelector(".nav__toggle");
        const navClose = navBar.querySelector(".nav__close");
        const search = navBar.querySelector(".search");
        const searchBtn = navBar.querySelector(".nav__search");
        const searchClose = navBar.querySelector(".search__close");
        const login = navBar.querySelector(".login");
        const loginBtn = navBar.querySelector(".nav__login");
        const loginClose = navBar.querySelector(".login__close");

        let navIsFixed = navBar.getAttribute("nav-is-fixed");
        if (navIsFixed === "true") navBar.style.position = "fixed";
        navBar.classList.remove('active');

        // Menu show
        navToggle.addEventListener("click", () => {
            console.log("test");
            navMenu.classList.add("show-menu");
        });

        // Menu hidden
        navClose.addEventListener("click", () => {
            navMenu.classList.remove("show-menu");
        });

        // Search show
        searchBtn.addEventListener("click", () => {
            search.classList.add("show-search");
        });

        // Search hidden
        searchClose.addEventListener("click", () => {
            search.classList.remove("show-search");
        });

        // Login show
        loginBtn.addEventListener("click", () => {
            login.classList.add("show-login");
        });

        // Login hidden
        loginClose.addEventListener("click", () => {
            login.classList.remove("show-login");
        });
    });
}

// document.addEventListener("DOMContentLoaded", function () {
//     initNavBar(document);
// });
