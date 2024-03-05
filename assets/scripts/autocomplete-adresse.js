"use strict";
const CONFIGURATION = {
    "mapsApiKey": "AIzaSyAgxHvp2OvCHEjca05FzbQRJGz9b7Z27Dc",
    "capabilities": {
        "addressAutocompleteControl": true,
    }
};
const SHORT_NAME_ADDRESS_COMPONENT_TYPES =
    new Set(['street_number', 'administrative_area_level_1', 'postal_code']);

const ADDRESS_COMPONENT_TYPES_IN_FORM = [
    'adresse',
    'locality',
    'administrative_area_level_1',
    'postal_code',
];

function getFormInputElement(componentType) {
    var userType = "";

    var currentPageURL = window.location.href;

    if (currentPageURL.indexOf("etudiant") !== -1) {
        userType = "-etudiant";
    }

    else if (currentPageURL.indexOf("tuteur") !== -1) {
        userType = "-tuteur";
    }

    else if (currentPageURL.indexOf("entreprise") !== -1) {
        userType = "-tuteur";
    }

    return document.getElementById(`${componentType}${userType}`);
}

function fillInAddress(place) {
    function getComponentName(componentType) {
        for (const component of place.address_components || []) {
            if (component.types[0] === componentType) {
                return component.long_name;
            }
        }
        return '';
    }
    function getComponentText(componentType) {
        return (componentType === 'adresse') ?
            `${getComponentName('street_number')} ${getComponentName('route')}` :
            getComponentName(componentType);
    }
    for (const componentType of ADDRESS_COMPONENT_TYPES_IN_FORM) {
        getFormInputElement(componentType).value = getComponentText(componentType);
    }
}
async function initMap() {
    const {
        Autocomplete
    } = google.maps.places;

    const autocomplete = new Autocomplete(getFormInputElement('adresse'), {
        fields: ['address_components', 'geometry', 'name'],
        types: ['address'],
    });
    autocomplete.setComponentRestrictions({
        country: ["fr"],
    });

    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(`Erreur pour : '${place.name}'`);
            return;
        }
        fillInAddress(place);
    });
}