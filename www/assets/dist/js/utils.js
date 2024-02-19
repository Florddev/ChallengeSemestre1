function hasAncestorWithClass(element, className) {
    let currentElement = element;
    while (currentElement.parentElement) {
        if (currentElement.parentElement.classList.contains(className)) {
            return true;
        }
        currentElement = currentElement.parentElement;
    }
    return false;
}

function getFirstParentWithClass(element, className) {
    let currentElement = element;
    while (currentElement.parentElement) {
        if (currentElement.parentElement.classList.contains(className)) {
            return currentElement.parentElement;
        }
        currentElement = currentElement.parentElement;
    }
    return null;
}

function changeTagName(element, newTagName) {
    // Créer un nouvel élément avec le nouveau nom de balise
    let newElement = document.createElement(newTagName);

    // Copier les attributs de l'élément original vers le nouvel élément
    for (let i = 0; i < element.attributes.length; i++) {
        newElement.setAttribute(element.attributes[i].name, element.attributes[i].value);
    }

    // Copier les enfants de l'élément original vers le nouvel élément
    while (element.firstChild) {
        newElement.appendChild(element.firstChild);
    }

    // Remplacer l'élément original par le nouvel élément
    element.parentNode.replaceChild(newElement, element);
}


let lastEndWith = "";
function searchIcon(search, endWith) {
    if (endWith !== undefined) lastEndWith = endWith;
    searchElementByClass(search, "#icon-search-container button", "i", undefined, lastEndWith)
}

function searchElementByClass(search = "", groupSeletor, targetSelector, startWith = "", endWith = "") {
    const groups = document.querySelectorAll(groupSeletor);
    groups.forEach(g => {
        //let target = document.querySelector(`${groupSeletor} ${targetSelector}`);
        let target = g.querySelector(targetSelector);
        let iconClass = target.className;

        if (iconClass.includes(search)
            && iconClass.endsWith(endWith)
            && iconClass.startsWith(startWith)
        ) {
            g.style.display = "block";
        } else {
            g.style.display = "none";
        }
    });
}