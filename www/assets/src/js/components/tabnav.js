function activerOnglet(elem) {
    var tabContainer = elem.closest(".tabnav");

    var tabContents = tabContainer.querySelectorAll(".tab_content");
    tabContents.forEach(function (tabContent) {
        tabContent.style.display = "none";
    });

    let tabId = elem.getAttribute("rel");
    var activeTabContent = tabContainer.querySelector("#" + tabId);
    if (activeTabContent) {
        activeTabContent.style.display = "block";
    }

    var tabListItems = tabContainer.querySelectorAll("ul.tabs li");
    tabListItems.forEach(function (tabListItem) {
        tabListItem.classList.remove("active");
        if (tabListItem.getAttribute("rel") === tabId) {
            tabListItem.classList.add("active");
        }
    });

    var tabDrawerHeadings = tabContainer.querySelectorAll(".tab_drawer_heading");
    tabDrawerHeadings.forEach(function (tabDrawerHeading) {
        tabDrawerHeading.classList.remove("d_active");
        if (tabDrawerHeading.getAttribute("rel") === tabId) {
            tabDrawerHeading.classList.add("d_active");
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".tabnav .d_active").forEach(function (elem) {
        activerOnglet(elem);
    });

    var tabListItems = document.querySelectorAll(".tabnav ul.tabs li");
    tabListItems.forEach(function (tabListItem) {
        tabListItem.addEventListener("click", function () {
            activerOnglet(tabListItem);
        });
    });

    var tabDrawerHeadings = document.querySelectorAll(".tabnav .tab_drawer_heading");
    tabDrawerHeadings.forEach(function (tabDrawerHeading) {
        tabDrawerHeading.addEventListener("click", function () {
            activerOnglet(tabDrawerHeading);
        });
    });

    var lastTabListItem = document.querySelector('.tabnav ul.tabs li:last-child');
    if (lastTabListItem) {
        lastTabListItem.classList.add("tab_last");
    }
});