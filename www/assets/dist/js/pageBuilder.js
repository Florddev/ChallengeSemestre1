let undoStack = [];
let redoStack = [];

function updateStateArrows(){
    const undoIcon = _("#state-undo");
    if(undoStack.length > 1) undoIcon.addClass("active");
    else undoIcon.removeClass("active");

    const redoIcon = _("#state-redo");
    if(redoStack.length > 0) redoIcon.addClass("active");
    else redoIcon.removeClass("active");
}

// Fonction pour sauvegarder l'état actuel dans la pile undo
function saveState() {
    const currentState = _(".editor-content")[0].innerHTML;
    undoStack.push(currentState);

    // Réinitialise la pile redo lorsqu'un nouvel état est enregistré
    redoStack = [];
    updateStateArrows();

    if (undoStack.length > 1) {
        const saveIcon = _("#save-page");
        let c = saveIcon.attr("class");
        saveIcon.removeClass(c);
        saveIcon.addClass(c.replace("line", "fill"));
    }
}

// Fonction pour annuler l'action
function undo() {
    if (undoStack.length > 1) {
        const currentState = undoStack.pop();
        redoStack.push(currentState);
        _(".editor-content")[0].innerHTML = undoStack[undoStack.length - 1];
    }
    initializeEditor();
    updateStateArrows();
}

// Fonction pour rétablir l'action
function redo() {
    if (redoStack.length > 0) {
        const nextState = redoStack.pop();
        undoStack.push(nextState);
        _(".editor-content")[0].innerHTML = nextState;
    }
    initializeEditor();
    updateStateArrows();
}
saveState();
function initSaveState(){
// Gestionnaire d'événement pour les touches
document.addEventListener('keydown', function (event) {
    if (event.ctrlKey && event.key === 'z') {
        undo();
    } else if (event.ctrlKey && event.key === 'y') {
        redo();
    } else if (event.ctrlKey && event.key === 's') {
        event.preventDefault(); // Empêche le comportement par défaut du navigateur
        savePage();
    }
});

// Gestionnaire d'événement pour les touches
_("#state-undo").click(evt => undo());
_("#state-redo").click(evt => redo());
}




// Fonction pour rendre un élément éditable
function makeElementeditable(elem) {
    if (elem.classList.contains("editable")) {
        elem.addEventListener('click', handleElementClick);
    }
    if (elem.classList.contains("editable-text")) {
        _(elem).dblclick((e) => {
            if (_(e.target).attr("contenteditable") !== "true") {
                saveState();
                _(e.target).attr("contenteditable", "true");
            }
        });
    }
}

// Gestionnaire de clic sur un élément éditable
function handleElementClick(event) {
    event.stopPropagation();
    const elem = event.currentTarget;

    if(elem){
        /*
        if (elem.tagName == "IMG" || window.getComputedStyle(elem).backgroundImage !== 'none') {
            addClickEventChangeImg(elem);
        }
        */

        displayEditorAreaFor(elem);
        deselectSelectedItem();
        _('.editor-accordion').forEach(e => _(e).css('display', 'block'));

        elem.classList.add("selected-item");

        if(_(elem).attr("editable-popup") !== "false") addPopup(elem);
        //setElementResizable(elem);
    }
}

// Initialisation de la fonctionnalité de tri
function initSortableModels() {
    _('.sortable-models').forEach(sortableList => {
        sortableList.setAttribute("data-sortable", true);
        new Sortable(sortableList, {
            group: {
                name: 'shared',
                pull: 'clone',
                put: false
            },
            animation: 150,
            ghostClass: 'sortable-placeholder',
            sort: false
        });
    });
}

// Mise à jour du style de la navbar
function updateNavbarStyle(timeout = 0) {
    const parentBox = _('.editor-content')[0];
    const navbar = parentBox.querySelector('.navbar');
    const breakpoint = 700;

    setTimeout(() => {
        const parentWidth = parentBox.offsetWidth;
        navbar.classList.toggle('active', parentWidth < breakpoint);
    }, timeout);
}

// Mise à jour du style des colonnes
function updateColumnStyle(timeout = 0) {
    const parentBox = _('.editor-content')[0];
    const columns = parentBox.querySelectorAll('[class^="col-"]');
    const breakpoint = 700;

    setTimeout(() => {
        const parentWidth = parentBox.offsetWidth;

        columns.forEach(column => {
            column.classList.toggle('full-width', parentWidth < breakpoint);
        });
    }, timeout);
}

// Fonction pour gérer le clic sur les modes de l'éditeur
function handleDisplayModeClick(modeItem) {
    const mode = modeItem.getAttribute("editor-mode");

    _("[editor-mode]").forEach(e => {
       let radio = _(e).qs("input");
       let icon = _(e).qs("label i");
        if(radio !== null && icon !== null){
            let c = icon.classList[0];
            icon.classList.remove(c);

            if(radio.checked) icon.classList.add(c.replace("line", "fill"));
            else icon.classList.add(c.replace("fill", "line"));
        }
    });

    if (mode) {
        _(".editor-container")[0].attr("editor-mode", mode);
        //_(".editor-container")[0].attr("style", "");
        _(".editor-container")[0].css("width", "");
        updateColumnStyle(300);
        updateNavbarStyle(300);
        setTimeout(e => setEditorSizeInput(), 300);
    }
}


// Fonction pour obtenir le contenu final de la page
function getFinalPage() {
    let editorContent = _(".editor-container .editor-content .main")[0].cloneNode(true);

    editorContent.querySelectorAll("*[contenteditable], .editable, .selected-item, .sortable-element, .editable-text, *[draggable], .full-width").forEach(elem => {
        elem.removeAttribute("contenteditable");
        elem.removeAttribute("draggable");
        elem.classList.remove("editable", "selected-item", "sortable-element", "editable-text", "full-width");
    });

    editorContent.querySelectorAll(".action-popup").forEach(elem => elem.remove());

    return editorContent.innerHTML;
}

// Initialisation des actions de l'éditeur
function initEditorActions() {
    _("ul.editor-actions li").forEach(action => {
        const attr = action.getAttribute('editor-action');
        if (attr === "edit") {
            action.addEventListener("click", () => handleEditAction(action));
        } else if (attr === "view") {
            action.addEventListener("click", handleViewAction);
        } else if (attr === "save") {
            action.addEventListener("click", () => alert("Save"));
        } else if (attr === "clear") {
            action.addEventListener("click", handleClearAction);
        }
    });
}


// Gestionnaire de l'action d'édition
function handleEditAction(elem) {
    saveState();
    elem.classList.toggle("active");
    _(".editor-container .editable-text").forEach(e => {
        const editable = e.getAttribute("contenteditable");
        e.setAttribute("contenteditable", editable === "true" ? "false" : "true");
        e.setAttribute("draggable", editable === "true" ? "true" : "false");
    });
}

// Gestionnaire de l'action d'affichage
function handleViewAction() {
    const editorFinalView = _("#editor-final-view");
    editorFinalView.classList.add("active");
    _("#editor-final-view .content").innerHTML = getFinalPage();

    initNavBar(editorFinalView);

    _("#editor-final-view .close").addEventListener("click", () => {
        editorFinalView.classList.remove("active");
        setTimeout(() => { _("#editor-final-view .content").innerHTML = ""; }, 200);
    }
    );
}

// Gestionnaire de l'action de suppression
function handleClearAction() {
    const container = _('.editor-content .sortable-container')[0];
    if (container.innerHTML === "") {
        alert("La page est déjà vide...");
        return;
    }
    const result = confirm("Êtes-vous certain(e) de vouloir tout supprimer ?");
    if (result) container.innerHTML = "";
}

// Fonction pour sélectionner le parent avec la classe 'editable'
function selectParentWithClass(element, className) {
    let parent = element.parentElement;

    while (parent && !parent.classList.contains(className)) {
        parent = parent.parentElement;
    }

    if (parent && parent.classList.contains(className)) {
        handleElementClick({ currentTarget: parent, stopPropagation: () => { } });
    }
}



// Initialisation des actions du popup
function initPopupActions(targetElement) {
    const popupLiUp = document.createElement('li');
    popupLiUp.innerHTML = `<i class="ri-arrow-up-line"></i>`;
    popupLiUp.addEventListener('click', (event) => {
        event.stopPropagation(); // Empêcher la propagation du clic à l'élément parent
        selectParentWithClass(targetElement, 'editable');
        saveState();
    });

    const popupLiCopy = document.createElement('li');
    popupLiCopy.innerHTML = `<i class="ri-file-copy-line"></i>`;
    popupLiCopy.addEventListener('click', () => duplicateElement(targetElement));

    const popupLiRemove = document.createElement('li');
    popupLiRemove.innerHTML = `<i class="ri-delete-bin-2-line"></i>`;
    popupLiRemove.addEventListener('click', () => removeElement(targetElement));

    return [popupLiUp, popupLiCopy, popupLiRemove];
}


// Fonction pour dupliquer un élément
function duplicateElement(targetElement) {
    const parentElement = targetElement.parentElement;
    const clonedElement = targetElement.cloneNode(true);
    parentElement.appendChild(clonedElement);

    makeElementeditable(clonedElement);
    setSortableToElement(clonedElement);

    clonedElement.querySelectorAll('.editable').forEach(makeElementeditable);
    clonedElement.querySelectorAll('.sortable-element').forEach(setSortableToElement);
    saveState();
}

// Fonction pour supprimer un élément
function removeElement(targetElement) {
    targetElement.remove();
    saveState();
    deselectSelectedItem();
}

// Fonction pour ajouter un popup à un élément
function addPopup(targetElement) {
    const popupElement = document.createElement('div');
    popupElement.classList.add('action-popup');

    const popupUl = document.createElement('ul');
    const [popupLiUp, popupLiCopy, popupLiRemove] = initPopupActions(targetElement);

    popupUl.append(popupLiUp, popupLiCopy, popupLiRemove);
    popupElement.append(popupUl);

    popupElement.setAttribute("draggable", "false");
    popupElement.setAttribute("contenteditable", "false");
    popupElement.style.display = 'block';

    if (targetElement.tagName === "IMG") {
        targetElement = targetElement.parentElement;
    }

    const rect = targetElement.getBoundingClientRect();
    if (hasOverflowHidden(targetElement) || (rect.top < 200 && !targetElement.classList.contains("nav__item"))) {
        popupElement.style.transform = 'translate(0, 0)';
    }

    targetElement.appendChild(popupElement);
}

// Fonction pour vérifier si un élément a overflow: hidden
function hasOverflowHidden(element) {
    const style = window.getComputedStyle(element);
    return style.overflow === 'hidden' || style.overflow === 'scroll';
}

// Initialisation de la fonctionnalité de tri pour un élément
function setNavbarSortableElement(element) {
    element.setAttribute("data-sortable", true);
    new Sortable(element, {
        group: 'navbar',
        animation: 150,
        filter: '.sortable-disabled',
        ghostClass: 'sortable-placeholder',
        onAdd: handleSortableAdd
    });
}

function initSortableElements(){
    _('.sortable-element').forEach(e => setSortableToElement(e));
}

// Initialisation de la fonctionnalité de tri pour un élément
function setSortableToElement(element) {
    element.setAttribute("data-sortable", true);
    new Sortable(element, {
        group: 'shared',
        animation: 150,
        filter: '.sortable-disabled',
        ghostClass: 'sortable-placeholder',
        onAdd: handleSortableAdd
    });
}

async function setOuterHTMLAsync(elem, newHTML) {
    return new Promise(function(resolve) {
        elem.outerHTML = newHTML;
        // Utilisez setTimeout pour permettre au navigateur de mettre à jour le DOM
        setTimeout(function() {
            resolve();
        }, 0);
    });
}

// Gestionnaire de l'ajout d'éléments triables
function handleSortableAdd(evt) {
    // Empêcher le glisser-déposer si la classe no-drag est présente sur l'élément
    if (evt.from.classList.contains('no-drag')) {
        evt.preventDefault();
    }

    let elem = _(evt.item);
    let initElement = e => {


        if(e.classList.contains('editable')) makeElementeditable(e);
        if(e.classList.contains('sortable-element')) setSortableToElement(e);
        e.querySelectorAll(".editable").forEach(makeElementeditable);
        e.querySelectorAll('.sortable-element').forEach(setSortableToElement);

        updateColumnStyle();
        saveState();
    }

    let partialSrc = elem.attr("data-partial-src");
    if(partialSrc !== null){
        partialSrc = partialSrc.replace("{{origin}}", window.location.origin);
        partial(partialSrc).then(result => {
            let newElement = new DOMParser().parseFromString(result.toString(), 'text/html').body.firstChild;
            elem.parentNode.replaceChild(newElement, elem);
            elem = newElement;
            initElement(elem);
        });
    } else {
        initElement(elem);
    }
}


// Initialisation de la fonctionnalité de tri pour le conteneur sortable
function initSortableContainer() {
    const sortableContainer = _('.editor-container .sortable-container')[0];
    setSortableToElement(sortableContainer);
}


// Fonction pour afficher la zone d'édition pour un élément
function displayEditorAreaFor(elem) {
    const elemStyle = getComputedStyle(elem);
    let initInputsFromPartial = (url, destElement) => {
        partial(url).then((result) => {
            destElement.innerHTML = result;

            destElement.querySelectorAll("select[edit-mp-input]").forEach((select) => {
                let s = _(select), style = s.attr("edit-mp-input");

                let currentValue = (elem.style[style] === '' ? s.attr("default-value") : elem.style[style]);
                if(currentValue !== null) currentValue = currentValue.replaceAll('"', '').replaceAll('&quot;', '');

                s.val(currentValue);
                s.change(evt => {
                    elem.style[style] = s.val();
                    saveState();
                });
            });

            destElement.querySelectorAll("input[edit-mp-input]").forEach((input) => {
                input = _(input);
                let style = input.attr("edit-mp-input");

                const currentValue = (elem.style[style] !== "" ? elem.style[style] : elemStyle[style]).replace("auto", "Auto").replace("none", "");
                const numericValue = parseFloat(currentValue);
                const roundedValue = Math.round(numericValue);
                let unit = currentValue.replace(numericValue, "");

                if(input.attr('type') === 'radio' || input.attr('type') === 'checkbox'){
                    let inputToCheck = _(`input[type="${input.attr('type')}"][edit-mp-input="${style}"][value="${currentValue.toLowerCase()}"]`)[0];
                    if(inputToCheck !== undefined) inputToCheck.setAttribute('checked', 'true');
                    input.change(evt => {
                        elem.style[style] = input.val();
                        saveState();
                    });
                } else {

                    const roundedStyle = roundedValue + unit;

                    if(input.attr("draggable-input") !== 'false') input.classList.add("draggable-input");
                    input.setAttribute("value", rgbToHex(isNaN(roundedValue) ? currentValue : roundedValue));
                    input.style.display = 'inline';
                    input.style.width = "100%";

                    setInputDraggable(input);

                    let select = input.nextSibling.nextSibling;
                    let hasSelect = select !== null && select !== undefined;
                    if(hasSelect) select.value = unit;

                    let inputEvent = () => {
                        if(hasSelect && select.classList.contains('edit-unit')) {
                            if(unit === '' || unit === undefined || unit === null || unit === 'Auto' || unit === 'none'){
                                select.value = _(select).attr("default-value");
                            }
                            unit = select.value;
                        }
                        let val = parseInt(input.value);
                        val = (isNaN(val) ? input.value : input.value + unit)
                        elem.style[style] = rgbToHex(val);
                    }

                    input.addEventListener("input", inputEvent);
                    input.addEventListener("change", saveState);
                    if(hasSelect) select.addEventListener("change", e => { inputEvent(); saveState(); });
                }
            });
        });
    }
    //let listEditorStyleArea = ["#editStyle-dimensions", "#editStyle-typo"];
    let listEditorStyleArea = _(".editStyle-accordion");
    listEditorStyleArea.forEach(e => initInputsFromPartial(_(e).attr("data-partial-src"), _(e)));
}

// Fonction pour rendre un champ d'entrée draggable
function setInputDraggable(input) {
    input.addEventListener("mousedown", (event) => {
        saveState();
        event.preventDefault();
        const startX = event.clientX;
        const startValue = parseFloat(input.value);

        function handleDragMove(moveEvent) {
            const deltaX = moveEvent.clientX - startX;
            const step = parseFloat(input.getAttribute("step")) || 1;
            const newValue = startValue + deltaX * step;
            input.value = Math.round(newValue * 100) / 100;
            input.dispatchEvent(new Event("input"));
        }

        function handleDragEnd() {
            document.removeEventListener("mousemove", handleDragMove);
            document.removeEventListener("mouseup", handleDragEnd);
            saveState();
        }

        document.addEventListener("mousemove", handleDragMove);
        document.addEventListener("mouseup", handleDragEnd);
    });
}

// Fonction pour ajouter un événement de changement d'image
function addClickEventChangeImg(elem) {
    const editDiv = document.createElement('div');
    editDiv.classList.add('edit-container');

    const urlInput = document.createElement('input');
    urlInput.type = 'text';

    if (elem.tagName === 'IMG') {
        urlInput.value = elem.src;
    } else {
        const backgroundImage = window.getComputedStyle(elem).backgroundImage;
        urlInput.value = backgroundImage.replace(/url\(['"]?(.*?)['"]?\)/, '$1');
    }

    const saveButton = document.createElement('button');
    saveButton.textContent = 'Enregistrer';
    saveButton.addEventListener('click', () => saveImageChanges(elem, urlInput.value));

    urlInput.addEventListener("change", () => saveImageChanges(elem, urlInput.value));

    editDiv.appendChild(urlInput);
    editDiv.appendChild(saveButton);

    let editZone = _("#props-general");
    editZone.appendChild(editDiv);
}

// Fonction pour enregistrer les changements d'image
function saveImageChanges(elem, imageUrl) {
    if (elem.tagName === 'IMG') {
        elem.src = imageUrl;
    } else {
        elem.style.backgroundImage = `url('${imageUrl}')`;
    }

    document.querySelector('.edit-container').remove();
}

function savePage(){
    let origin = window.location.origin;
    ajax("POST", {
        url: origin + "/dashboard/builder-save-page",
        data: {
            id: _("#page-id").val(),
            url: _("#page-url").val(),
            title: _("#page-title").val(),
            content: minify(_("#page-content").html())
        },
        success: (result) => {
            if(result !== "") {
                let newUrl = origin + "/dashboard/builder/" +result;
                history.pushState(null, null, newUrl);
            }

            saveState();

            const saveIcon = _("#save-page");
            let c = saveIcon.attr("class");
            saveIcon.removeClass(c);
            saveIcon.addClass(c.replace("fill", "line"));
        }
    });
}

let m_pos;
let currentResizer;
function addResizeEvent(elem) {
    function resize(e) {
        if (currentResizer) {
            let parent = elem.parentNode;

            if(parent){
                let delta = currentResizer === "left" || currentResizer === "right" ? m_pos - e.x : m_pos - e.y;
                m_pos = currentResizer === "left" || currentResizer === "right" ? e.x : e.y;

                let p_width = parseInt(getComputedStyle(parent, '').width);
                let p_height = parseInt(getComputedStyle(parent, '').height);

                if (currentResizer === "left") parent.style.width = (p_width + delta) + "px";
                if (currentResizer === "right") parent.style.width = (p_width - delta) + "px";
                if (currentResizer === "top") parent.style.height = (p_height + delta) + "px";  // Ajustement ici
                if (currentResizer === "bottom") parent.style.height = (p_height - delta) + "px";
            }
        }
    }

    elem.addEventListener("mousedown", function (e) {
        currentResizer = elem.getAttribute("resizer");
        m_pos = currentResizer === "left" || currentResizer === "right" ? e.x : e.y;
        document.addEventListener("mousemove", function (event) {
            resize(event);
        }, false);
    }, false);

    document.addEventListener("mouseup", function () {
        currentResizer = null;
        document.removeEventListener("mousemove", resize, false);
    }, false);
}

//var resize_el = document.querySelectorAll("[resizer]");
//resize_el.forEach(e => addResizeEvent(e));

function setElementResizable(elem){
    let resizer = ["top", "right", "bottom", "left"];
    resizer.forEach(r => {
        let resizerElement = document.createElement('li');
        _(resizerElement).attr("resizer", r);

        addResizeEvent(resizerElement);
        elem.append(resizerElement);
    });
}

function deselectSelectedItem(){
    _(".selected-item").forEach((e) => _(e).removeClass("selected-item"));

    let popup = _(".action-popup");
    if(popup !== undefined) popup.forEach(r => r.remove());

    let resizer = _("[resizer]");
    if(resizer !== undefined) resizer.forEach(r => r.remove());

    _('.editor-accordion').forEach(e => _(e).css('display', 'none'));
}

function setEditorSizeInput(){
    let inputPx = _("#editor-size");
    let editor = _(".editor-container")[0];
    let inputPer = _("#editor-size-percent");

    inputPx.val(editor.offsetWidth);
    inputPx.attr("max", editor.offsetWidth);

    //inputPer.val((inputPx.val()*100)/editor.offsetWidth);
}

function initEditorSizeInput(){
    setEditorSizeInput();
    let inputPx = _("#editor-size");
    let inputPer = _("#editor-size-percent");
    let editor = _(".editor-container")[0];

    inputPx.input(evt => {
        let value = _(evt.target).val();
        editor.style.width = value + "px";
        //inputPer.val(((value*100)/inputPx.attr("max")).toFixed(0));
    })

    inputPer.input(evt => {
        let value = _(evt.target).val();

        //let toPixel = ((inputPx.attr("max")*value)/100).toFixed(0);
        //editor.style.width = toPixel + "px";
        editor.style.transform = "scale(" + value + "%)";
        //inputPx.val(toPixel);
    })
}

// Initialisation de l'éditeur
function initializeEditor() {
    initSortableElements();
    initSortableModels();
    updateColumnStyle();
    initSaveState();

    //const navbar = document.querySelector(".navbar");
    _(".editor-content .editable").forEach(makeElementeditable);
    _('.editor-content.sortable-element').forEach(setNavbarSortableElement);

    _("ul.editor-responsive li").forEach(modeItem => {
        modeItem.addEventListener("click", () => handleDisplayModeClick(modeItem));
    });

    initEditorSizeInput();
    initEditorActions();
    initSortableContainer();

    document.body.onclick = (e) => {
        if (_(e.target).attr("contenteditable") !== "true") {
            let ce = _(".editable-text[contenteditable='true']");
            if (ce.length > 0) {
                ce.forEach((elem) => {
                    _(elem).attr("contenteditable", "false");
                    saveState();
                });
            }
        }
    }
    _(".page-builder-main-editor")[0].onclick = (evt) => {
        deselectSelectedItem();
    }
}
// Initialisation de l'éditeur lors du chargement de la page
window.addEventListener('load', initializeEditor);



let initialSize = 'empty';
let initialPadding = 'empty';
function closeShutters(input, target){
    target = _("#" + target);
    if(initialSize === "empty") initialSize = target.style.maxWidth;
    if(initialPadding === "empty") initialPadding = target.style.padding;

    let parent = _(input.parentElement);

    if(input.checked) {
        target.css("max-width", "0");
        target.css("padding", "0");

        if(parent.classList.contains('left')){
            parent.css("left", '2rem');
        } else if(parent.classList.contains('right')){
            parent.css("right", '2rem');
        }
    }
    else {
        target.css("max-width", initialSize);
        target.css("padding", initialPadding);

        if(parent.classList.contains('left')){
            parent.css("left", initialSize);
        } else if(parent.classList.contains('right')){
            parent.css("right", initialSize);
        }
    }
}
