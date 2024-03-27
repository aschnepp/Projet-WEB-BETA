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
    'street_number',
    'adresse',
    'locality',
    'administrative_area_level_1',
    'postal_code',
];

function getFormInputElement(componentType) {
    var userType = "";

    var currentPageURL = window.location.href;

    if (currentPageURL.indexOf("gestion-etudiant") !== -1) {
        userType = "-etudiant";
    }

    else if (currentPageURL.indexOf("gestion-tuteur") !== -1) {
        userType = "-tuteur";
    }

    else if (currentPageURL.indexOf("gestion-offre") !== -1) {
        userType = "-offre";
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
        if (componentType === 'adresse') {
            const route = getComponentName('route');
            return `${route}`;
        } else {
            return getComponentName(componentType);
        }
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
            window.alert(`Erreur pour : '${place.name}'`);
            return;
        }
        fillInAddress(place);
    });
}

function loadGoogleMaps() {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=${CONFIGURATION.mapsApiKey}&libraries=places,marker&callback=initMap&solution_channel=GMP_QB_addressselection_v2_cA`;
        script.async = true;
        script.defer = true;
        script.onerror = reject;
        document.head.appendChild(script);
        script.onload = resolve;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    loadGoogleMaps().then(() => {
        initMap();
    }).catch(error => {
        console.error('Erreur de chargement de l\'API Google Maps :', error);
    });
});