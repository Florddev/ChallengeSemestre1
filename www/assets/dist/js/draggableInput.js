const minDistanceToStart = 5;
const units = ['px', '%', 'rem', 'em', 'vh', 'vw', 'vmin', 'vmax', 'ex', 'cm', 'mm', 'in', 'pt', 'pc', 'ch'];
const shiftKeyMultiple = 10;

let inputElement = null;
let inputMax = 9999;
let inputMin = -9999;
let initialPosition = 0;
let initialValue = 0;
let initialUnit = '';
let initialShiftKey = 0;

// states
// 0 - none
// 1 - retrieving value
// 2 - change value
let dragState = 0;

function reset() {
    inputElement = null;
    inputMax = 9999;
    inputMin = -9999;
    initialPosition = 0;
    initialValue = 0;
    initialUnit = '';
    initialShiftKey = 0;
    dragState = 0;
}

function setInputDraggable(element) {
    element.addEventListener('mousedown', function (e) {
        // Vérifier si l'élément est en mode édition (contenteditable)
        if (element.isContentEditable) {
            return;
        }

        inputElement = element;
        if(element.getAttribute("max") !== null) inputMax = element.getAttribute("max");
        if(element.getAttribute("min") !== null) inputMin = element.getAttribute("min");

        initialPosition = {
            x: e.pageX,
            y: e.pageY,
        };

        initialValue = inputElement.value;
        const valueNum = parseFloat(initialValue);
        // check if value contains units and save it.
        if (initialValue !== `${valueNum}`) {
            const matchUnit = initialValue.match(new RegExp(`${valueNum}(${units.join('|')})`, 'i'));

            if (matchUnit && matchUnit[1]) {
                initialUnit = matchUnit[1];
            }
        }
        if (e.shiftKey) {
            initialShiftKey = 1;
        }
        initialValue = valueNum;
        dragState = 1;
    });
}

document.addEventListener('mouseup', function () {
    reset();
});

document.addEventListener('mousemove', function (e) {
    switch (dragState) {
        // check for drag position
        case 1:
            if (Math.abs(initialPosition.x - e.pageX) > minDistanceToStart) {
                reset();
            } else if (Math.abs(initialPosition.y - e.pageY) > minDistanceToStart) {
                dragState = 2;
            }
            break;
        // change input value.
        case 2:
            e.preventDefault();

            let step = _(inputElement).attr("step") !== null ? _(inputElement).attr("step") : 1;

            if(isNaN(initialValue) || initialValue === '') initialValue = 0;

            let finalValue = ((initialValue + (initialPosition.y - e.pageY) * (initialShiftKey ? shiftKeyMultiple : 1) + initialUnit)*(!isNaN(step) ? parseFloat(step) : 1)).toFixed(step !== 1 ? (step === "0.1" ? 1 : 2) : 0);
            if(parseFloat(inputMax) >= parseFloat(finalValue) && parseFloat(inputMin) <= parseFloat(finalValue))
                inputElement.value = finalValue;

            // Déclencher les événements 'input' et 'change'
            const inputEvent = new Event('input', { bubbles: true });
            const changeEvent = new Event('change', { bubbles: true });

            inputElement.dispatchEvent(inputEvent);
            inputElement.dispatchEvent(changeEvent);

            break;
    }
});

const draggableInput = document.querySelectorAll('.draggable-input');
draggableInput.forEach(e => {
    setInputDraggable(e);
});
