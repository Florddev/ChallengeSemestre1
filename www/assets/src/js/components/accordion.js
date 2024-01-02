function generateCustomId(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0, result = '';
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

let initAccordions = (element) => {
    // Récupérer l'input et le label de chacun de mes accordions présent sur ma page
    let accordionInput = element.querySelector("input");
    let accordionLabel = element.querySelector(".accordion-label");

    // Leur définit un id et un for random pour qu'ils soitent liés enssemble
    const customId = generateCustomId(10);
    accordionLabel.setAttribute("for", customId);
    accordionInput.setAttribute("id", customId);

    // Création de la fonction pour activer/désactiver l'accordion
    let toggle = (input) => {
        let panel = input.nextElementSibling.nextElementSibling;
        if (!input.checked) {
            panel.style.maxHeight = null;
        } else {
            // Ajout des marges et du padding à la hauteur totale
            let totalHeight = panel.scrollHeight +
                parseInt(window.getComputedStyle(panel).getPropertyValue('margin-top')) +
                parseInt(window.getComputedStyle(panel).getPropertyValue('margin-bottom')) +
                parseInt(window.getComputedStyle(panel).getPropertyValue('padding-top')) +
                parseInt(window.getComputedStyle(panel).getPropertyValue('padding-bottom'));

            panel.style.maxHeight = totalHeight + "px";
        }
    };

    // Activation/désactivation de base de l'accordion
    toggle(accordionInput);

    // Ajouter un evenement pour que lorsqu'un accordion est cliqué, activer au non celon son état
    accordionInput.addEventListener("change", function () {
        // Si l'accordion est de type 'radio' alors mettre à jours tout les autres accordions de la même famille grâce à l'attribut 'name'
        if (accordionInput.getAttribute("type") == "radio") {
            let inputList = document.querySelectorAll(`input[name='${accordionInput.getAttribute("name")}']`)
            inputList.forEach((input) => {
                toggle(input);
            })
            // Sinon activer/désactiver simplement l'accordion actuel
        } else {
            toggle(accordionInput);
        }
    });
};

// Initialiser tout les accordions présent sur la page lorsque celle-ci sera prête
_(document).ready(() => {
    var acc = document.querySelectorAll(".accordion");
    acc.forEach((e) => { initAccordions(e); })
});