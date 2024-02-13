async function applyCurrentValues() {
    let siteOrigin = window.location.origin;

    try {
        const response = await fetch(siteOrigin + "/dashboard/settings/update");
        
        if (!response.ok) {
            throw new Error('Erreur lors de la récupération des valeurs actuelles');
        }

        const currentValues = await response.json();

        for (const key in currentValues) {
            changeCSSVariable(key.replace('css:', ''), currentValues[key]);
        }
    } catch (error) {
        console.error(error);
    }
}

function changeCSSVariable(key, value) {
    var rootElement = document.documentElement;
    rootElement.style.setProperty('--' + key, value);
}

applyCurrentValues();
