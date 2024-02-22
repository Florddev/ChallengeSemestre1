let initialSize = 'empty';
let initialPadding = 'empty';
function closeShutters(input, target, action = "toggle"){
    target = _("#" + target);

    if(initialSize === "empty") initialSize = target.style.maxWidth;
    if(initialPadding === "empty") initialPadding = target.style.padding;

    let parent = _(input.parentElement);

    if(input.checked || action === "open") {
        target.css("max-width", "0");
        target.css("padding", "0");

        if(parent.classList.contains('sidebar-toggler-left')){
            parent.css("left", '2rem');
        } else if(parent.classList.contains('sidebar-toggler-right')){
            parent.css("right", '2rem');
        }
    }
    else if(!input.checked || action === "close") {
        target.css("max-width", initialSize);
        target.css("padding", initialPadding);

        if(parent.classList.contains('sidebar-toggler-left')){
            parent.css("left", initialSize);
        } else if(parent.classList.contains('sidebar-toggler-right')){
            parent.css("right", initialSize);
        }
    }
}
_(document).ready(evt => {
    _(".sidebar-toggler input").forEach(e => { e = _(e);
        let event = new Event('change');
        e.dispatchEvent(event);
    });
})

const editPage = () => {
    const toggles = [
        { id: "builder-left-toggler", active: false },
        { id: "builder-right-toggler", active: false },
        { id: "navbar-toggler", active: true }
    ];

    let event = new Event('change');
    toggles.forEach(e => {
        _(`#${e.id}`).checked = e.active
        _(`#${e.id}`).dispatchEvent(event);
    });
}

function convertPixelToRemFromString(style) {
    const rg = new RegExp("(([0-9]+.)[0-9]+)px|([0-9]+)px", "g");
    [...style.matchAll(rg)].forEach(m => {
        style = style.replace(`${m[0]}`, `${(m[1] === undefined ? m[3] : m[1]) / 16}rem`);
    });
    return style;
}

let currentCustomCssClass = [];
function replaceElementStylingByCustomClass(elem, dest) {
    let elementStyle = _(elem).attr('style').replaceAll('!important', '');
    elementStyle = elementStyle.replaceAll(';', '!important;');

    // Vérifier si une class custom ne possède pas deja ce meme code css
    let existantStyleClass = null
    currentCustomCssClass.forEach((cc) => {
        if (existantStyleClass == null && cc.style === elementStyle) existantStyleClass = cc.class;
    });

    // Si une classe custom possédant le meme style existe deja, alors on réutilise simplement la class
    if (existantStyleClass != null) {
        elem.classList.add(existantStyleClass);
    }
    // Sinon on en créer une nouvelle avec le nouveau css
    else {
        // On génère une class custom et si jamais la class généré exist deja on en génère une nouvelle avec plus de caractères
        let customClass = uniqueId(5, "CC");
        if (currentCustomCssClass.some(cc => cc.class === customClass)) customClass = 'CC' + uniqueId(10);

        // Création du code final (class + style) en convertissant les px en rem
        let finalCss = `.${customClass}{${convertPixelToRemFromString(elementStyle)}}`;

        // On ajoute la nouvelle classe à la balise css et on l'ajoute à la liste
        dest.innerHTML += finalCss;
        currentCustomCssClass.push({
            class: customClass,
            style: elementStyle
        });

        // Puis on ajoute la class à l'element
        elem.classList.add(customClass);
    }
    // On retire l'attribute style qui n'a plus d'utilité
    elem.removeAttribute("style");
}

function convertElementsStyleToClass(source, dest) {
    currentCustomCssClass = [];
    _(source).qsa("[style]").forEach(e => replaceElementStylingByCustomClass(e, dest));
}

function cleanPageBuilderCode(element){
    _(element).qsa(".link-container").forEach(e => {
        changeTagName(e, "a");
    });

    let attrToRemove = ["contenteditable", "draggable", "data-sortable"];
    element.querySelectorAll("*[contenteditable], .editable, .selected-item, .sortable-element, .editable-text, *[draggable], .full-width").forEach(elem => {
        attrToRemove.forEach(attr => elem.removeAttribute(attr));
        elem.classList.remove("editable", "editable-text", "selected-item", "sortable-element", "full-width");
    });

    element.querySelectorAll(".action-popup").forEach(elem => elem.remove());
    return element;
}

let loadPage = () => {
    cleanPageBuilderCode(document);
    convertElementsStyleToClass(document, _("#customClass"));
    initNavBar(document);
}

_(document).ready(evt => {
    _(`[data-plugin="partial"]`).forEach(e => {
        _(e).partial(_(e).attr('data-partial-src'));
    })
})