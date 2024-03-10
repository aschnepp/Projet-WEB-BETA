document.addEventListener('DOMContentLoaded', function () {
    VerifTailleEcran();

    const iconeFiltre = document.querySelector("#icone-filtre");
    const boutonDansFiltre = document.querySelector("#fermer-filtre");

    iconeFiltre.addEventListener('click', toggleMenu);
    boutonDansFiltre.addEventListener('click', toggleMenu);
});

function toggleMenu() {
    const menuFiltre = document.querySelector("#recherche-filtre-main");

    var computedStyle = window.getComputedStyle(menuFiltre);

    if (computedStyle.display === "none") {
        ActivationFiltre();
    }
    else {
        DesactivationFiltre();
    }
}

function VerifTailleEcran() {
    if (window.innerWidth > 850) {
        ActivationFiltre();
    }
    else {
        DesactivationFiltre();
    }
}

function ActivationFiltre() {
    const menuFiltre = document.querySelector("#recherche-filtre-main");
    const filtre = document.querySelector("#filtre-cliquable");
    const resultatFiltre = document.querySelector("#affichage-filtre");

    menuFiltre.classList.add("visible");
    resultatFiltre.classList.add("notvisible");

    menuFiltre.style.display = "flex";
    filtre.style.display = "none";
}

function DesactivationFiltre() {
    const menuFiltre = document.querySelector("#recherche-filtre-main");
    const filtre = document.querySelector("#filtre-cliquable");
    const resultatFiltre = document.querySelector("#affichage-filtre");

    menuFiltre.classList.remove("visible");
    resultatFiltre.classList.remove("notvisible");

    menuFiltre.style.display = "none";
    filtre.style.display = "flex";
}