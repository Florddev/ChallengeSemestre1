let undoStack = [];
let redoStack = [];

// Fonction pour sauvegarder l'état actuel dans la pile undo
function saveState() {
    const currentState = _(".editor-content")[0].innerHTML;
    undoStack.push(currentState);

    // Réinitialise la pile redo lorsqu'un nouvel état est enregistré
    redoStack = [];
}
// Fonction pour annuler l'action
function undo() {
    if (undoStack.length > 1) {
        const currentState = undoStack.pop();
        redoStack.push(currentState);
        const previousState = undoStack[undoStack.length - 1];
        _(".editor-content")[0].innerHTML = previousState;
    }
    initializeEditor();
}

// Fonction pour rétablir l'action
function redo() {
    if (redoStack.length > 0) {
        const nextState = redoStack.pop();
        undoStack.push(nextState);
        _(".editor-content")[0].innerHTML = nextState;
    }
    initializeEditor();
}
// Gestionnaire d'événement pour les touches
document.addEventListener('keydown', function (event) {
    if (event.ctrlKey && event.key === 'z') {
        undo();
    } else if (event.ctrlKey && event.key === 'y') {
        redo();
    }
});



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
    console.log("test");

    event.stopPropagation();

    // TODO: Retiré pour la nouvelle version
    // _("[rel='props']")[0].click();
    // document.getElementById("props-general-accordion").setAttribute("checked", true);

    _("#props-general").innerHTML = "";
    const elem = event.currentTarget;

    if (elem.tagName == "IMG" || window.getComputedStyle(elem).backgroundImage !== 'none') {
        addClickEventChangeImg(elem);
    }

    displayEditorAreaFor(elem);

    _(".selected-item").forEach(e => e.classList.remove("selected-item"));
    _(".action-popup").forEach(p => p.remove());
    elem.classList.add("selected-item");

    if(_(elem).attr("editable-popup") !== "false") addPopup(elem);
}

// Initialisation de la fonctionnalité de tri
function initSortableElements() {
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

    console.log(parentBox);
    console.log(navbar);

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
    const editorContent = _(".editor-container .editor-content")[0];

    // Ajouter la classe "active" à l'élément cliqué
    _(".editor-mode li").forEach(item => item.classList.remove("active"));
    modeItem.classList.add("active");

    if (mode) {
        editorContent.setAttribute("editor-mode", mode);
        updateColumnStyle(300);
        updateNavbarStyle(300);
    }
}


// Fonction pour obtenir le contenu final de la page
function getFinalPage() {
    let editorContent = _(".editor-container .editor-content")[0].cloneNode(true);

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

    if (targetElement.tagName == "IMG") {
        targetElement = targetElement.parentElement;
    }

    const rect = targetElement.getBoundingClientRect();
    if (hasOverflowHidden(targetElement) || (rect.top < 100 && !targetElement.classList.contains("nav__item"))) {
        popupElement.style.transform = 'translate(0, 0)';
    }

    targetElement.appendChild(popupElement);
}

// Fonction pour vérifier si un élément a overflow: hidden
function hasOverflowHidden(element) {
    const style = window.getComputedStyle(element);
    return style.overflow === 'hidden';
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

// Gestionnaire de l'ajout d'éléments triables
function handleSortableAdd(evt) {
    makeElementeditable(evt.item);
    setSortableToElement(evt.item);
    updateColumnStyle();

    evt.item.querySelectorAll(".editable").forEach(makeElementeditable);
    evt.item.querySelectorAll('.sortable-element').forEach(setSortableToElement);
    //evt.item.outerHTML = "Rien";
    saveState();
}

// Initialisation de la fonctionnalité de tri pour le conteneur sortable
function initSortableContainer() {
    const sortableContainer = _('.editor-container .sortable-container')[0];
    setSortableToElement(sortableContainer);
}

// Fonction pour afficher la zone d'édition pour un élément
function displayEditorAreaFor(elem) {
    const editorArea = _("#props-general");
    const elemToAppend = [];

    const elemStyle = getComputedStyle(elem);

    /*
    const toEdit = [
        { attr: "width", name: "Width" },
        { attr: "height", name: "Height" },


        { attr: "marginLeft", name: "Margin Left" },
        { attr: "marginRight", name: "Margin Right" },
        { attr: "marginTop", name: "Margin Top" },
        { attr: "marginBottom", name: "Margin Bottom" },
        { attr: "paddingLeft", name: "Padding Left" },
        { attr: "paddingRight", name: "Padding Right" },
        { attr: "paddingTop", name: "Padding Top" },
        { attr: "paddingBottom", name: "Padding Bottom" },

    ];

    toEdit.forEach(edt => {
        const container = document.createElement("div");
        const currentValue = elem.style[edt.attr] != "" ? elem.style[edt.attr] : elemStyle[edt.attr];
        const numericValue = parseFloat(currentValue);
        const roundedValue = Math.round(numericValue);
        const unit = currentValue.replace(numericValue, "");
        const roundedStyle = roundedValue + unit;

        const label = document.createElement("label");
        label.innerHTML = edt.name + ":";

        const inputNumber = document.createElement("input");
        inputNumber.classList.add("draggable-input");
        inputNumber.setAttribute("value", roundedStyle);
        inputNumber.style.display = 'inline';
        inputNumber.style.width = "100%";

        setInputDraggable(inputNumber);

        inputNumber.addEventListener("input", () => {
            elem.style[edt.attr] = inputNumber.value;
        });

        container.append(label, inputNumber);
        container.classList.add("tools-container");
        elemToAppend.push(container);
    });
    */

    var styleDimen = document.createElement("div");
    styleDimen.innerHTML = `
            <div class="edit-mp">
                <div class="edit-mp-mtop">
                    <input type="text" edit-mp-input="margin-top" value="Auto" />
                </div>
                <div class="edit-mp-mid">
                    <div class="edit-mp-mleft">
                        <input type="text" edit-mp-input="margin-left" value="Auto" />
                    </div>
                    <div class="edit-mp-p">
                        <div class="edit-mp-pleft">
                            <input type="text" edit-mp-input="padding-left" value="0" />
                        </div>
                        <div class="edit-mp-pmid">
                            <input type="text" edit-mp-input="padding-top" value="0" />
                            <div class="edit-mp-center">
                                <i class="ri-link"></i>
                            </div>
                            <input type="text" edit-mp-input="padding-bottom" value="0" />
                        </div>
                        <div class="edit-mp-pright">
                            <input type="text" edit-mp-input="padding-right" value="0" />
                        </div>
                    </div>
                    <div class="edit-mp-mright">
                        <input type="text" edit-mp-input="margin-right" value="Auto" />
                    </div>
                </div>
                <div class="edit-mp-mbot">
                    <input type="text" edit-mp-input="margin-bottom" value="Auto" />
                </div>
            </div>
            <br>
            <div class="edit-form-control">
                <div class="edit-form fluid">
                    <label>Width</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="width" placeholder="Auto" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
                <div class="edit-form fluid">
                    <label>Height</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="height" placeholder="Auto" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="edit-form-control">
                <div class="edit-form fluid">
                    <label>Min W</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="min-width" placeholder="Auto" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
                <div class="edit-form fluid">
                    <label>Min H</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="min-height" placeholder="Auto" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="edit-form-control">
                <div class="edit-form fluid">
                    <label>Max W</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="max-width" placeholder="None" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
                <div class="edit-form fluid">
                    <label>Max H</label>
                    <div class="edit-form-inputs">
                        <input type="text" edit-mp-input="max-height" placeholder="None" />
                        <select class="edit-unit">
                            <option value="Auto" hidden>-</option>
                            <option value="none" hidden>-</option>
                            <option value="" selected>-</option>
                            <option value="px">px</option>
                            <option value="%">%</option>
                            <option value="em">em</option>
                            <option value="rem">rem</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="edit-form-control">
                <div class="edit-form fluid">
                    <label>Ratio</label>
                    <div class="edit-form-inputs">
                        <input type="number" min="0" placeholder="Auto" />
                    </div>
                </div>
                <div class="edit-form fluid">
                    /
                    <div class="edit-form-inputs">
                        <input type="number" min="0" placeholder="Auto" />
                    </div>
                </div>
            </div>
            <div class="edit-form fluid">
                <label>Overflow</label>
                <ul class="edit-form-inputs">
                    <li class="edit-form-toggler">
                        <input id="overflow-visible" type="radio" name="overflow" value="visible" checked />
                        <label for="overflow-visible"><i class="ri-eye-fill"></i></label>
                    </li>
                    <li class="edit-form-toggler">
                        <input id="overflow-hidden" type="radio" name="overflow" value="hidden" />
                        <label for="overflow-hidden"><i class="ri-eye-off-line"></i></label>
                    </li>
                    <li class="edit-form-toggler">
                        <input id="overflow-scroll" type="radio" name="overflow" value="scroll" />
                        <label for="overflow-scroll"><i class="ri-line-height"></i></label>
                    </li>
                    <li class="edit-form-toggler">
                        <input id="overflow-auto" type="radio" name="overflow" value="auto" />
                        <label for="overflow-auto">Auto</label>
                    </li>
                </ul>
            </div>`;

    styleDimen.querySelectorAll("input[edit-mp-input]").forEach((input) => {
        // TODO: Attribuer à l'input la valeur actuel de l'element grâce à l'attribut "edit-mp-input" pour savoir quelle style appliquer (Ex: edit-mp-input="margin-top")

        var style = _(input).attr("edit-mp-input");

        const currentValue = (elem.style[style] !== "" ? elem.style[style] : elemStyle[style]).replace("auto", "Auto");
        const numericValue = parseFloat(currentValue);
        const roundedValue = Math.round(numericValue);
        let unit = currentValue.replace(numericValue, "");

        const roundedStyle = roundedValue + unit;

        input.classList.add("draggable-input");
        input.setAttribute("value", isNaN(roundedValue) ? currentValue : roundedValue);
        input.style.display = 'inline';
        input.style.width = "100%";

        setInputDraggable(input);

        let select = input.nextSibling.nextSibling;
        let hasSelect = select !== null && select !== undefined;
        if(hasSelect) select.value = unit;

        let inputEvent = () => {
            if(hasSelect && select.classList.contains('edit-unit')) {
                unit = select.value;
            }

            let val = parseInt(input.value);
            val = (isNaN(val) ? input.value : input.value + unit)
            elem.style[style] = val;
        }

        input.addEventListener("input", inputEvent);
        if(hasSelect) select.addEventListener("change", inputEvent);
    });

    // TODO: Ajouter editMP dans la toolbar
    editorArea.append(styleDimen);


    elemToAppend.forEach(e => editorArea.append(e));
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

// Initialisation de l'éditeur
function initializeEditor() {
    initSortableElements();
    updateColumnStyle();

    //const navbar = document.querySelector(".navbar");
    _(".editor-content .editable").forEach(makeElementeditable);
    _('.editor-content.sortable-element').forEach(setNavbarSortableElement);

    _("ul.editor-mode li").forEach(modeItem => {
        modeItem.addEventListener("click", () => handleDisplayModeClick(modeItem));
    });

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
        _(".selected-item").forEach((e) => {
            _(e).removeClass("selected-item");
        })
        _(".action-popup")[0].remove();
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
    console.log(initialSize);
}