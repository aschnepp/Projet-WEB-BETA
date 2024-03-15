document.addEventListener("DOMContentLoaded", function () {
    var EtatFiltre = document.querySelector("#choix-recherche");

    ChoixFiltre();

    EtatFiltre.addEventListener("change", ChoixFiltre);
});


function ChoixFiltre() {
    var EtatFiltre = document.querySelector("#choix-recherche");
    var valeurSelectionnee = EtatFiltre.value;

    if (valeurSelectionnee === "Entreprise") {
        AfficherFiltresEntreprise();
    }
    else if (valeurSelectionnee === "Offre") {
        AfficherFiltresOffre();
    }
    else if (valeurSelectionnee === "Tuteur") {
        AfficherFiltresTuteur();
    }
    else {
        AfficherFiltresEtudiant();
    }


    Slider();

    var BoutonReset = document.querySelector("#reset-filtre");
    BoutonReset.addEventListener("click", ResetCouleurSlider);
    BoutonReset.addEventListener("click", ResetScrollToTop);
}

function ResetScrollToTop() {
    document.querySelector("#recherche-filtre-main").scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

function StatsEntreprisesOuOffres() {
    var EtatFiltre = document.querySelector("#choix-recherche");
    var valeurSelectionnee = EtatFiltre.value;

    if (valeurSelectionnee === "Entreprise") {
        return `
        <a href="stats-entreprise.html" target="_blank" title="Statistiques d'entreprise"
    id="bouton-stats-entreprise">Statistiques d'entreprises</a>
        `;
    }

    else if (valeurSelectionnee === "Offre") {
        return `
        <a href="stats-offres.html" target="_blank" title="Statistiques d'offres" id="bouton-stats-offres">Statistiques
        d'offres</a>
        `;
    }

    else {
        return '';
    }
}

function AfficherFiltresEntreprise() {
    document.querySelector("#recherche-menu").innerHTML =
        `
        <section>
        <label for="nom-entreprise-recherche">Nom</label>
        <input type="text" id="nom-entreprise-recherche" placeholder="Nom entreprise">
    </section>

    <section>
        <label for="region-entreprise-recherche">Region</label>
        <input type="text" id="region-entreprise-recherche" list="region-datalist"
            placeholder="Selectionner une région">
        <datalist id="region-datalist">
            <option value="Pas de région">Pas de région spécifique</option>
            <option value="test">Paris</option>
            <option value="provence">Provence</option>
            <option value="pays">Pays de la Loire</option>
            <option value="corse">Corse</option>
        </datalist>
    </section>

    <section>
        <label for="secteur-activite-recherche">Secteur d'activité</label>
        <select id="secteur-activite-recherche">
        </select>
    </section>

    <section>
        <label for="nombres-stagiaires-postuler-recherche">Nombre de postulations</label>
        <input type="range" id="nombres-stagiaires-postuler-recherche" min="0" max="20" step="1" value="0"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' minimum'">
        <output>0 minimum</output>
    </section>

    <section>
        <label for="evaluation-entreprise-recherche">Evaluation moyenne</label>
        <input type="range" id="evaluation-entreprise-recherche" min="0" max="5" step="0.5" value="0"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + '/5 minimum'">
        <output>0/5 minimum</output>
    </section>

    <section>
        <label for="places-disponibles-recherche">Places disponibles</label>
        <input type="range" id="places-disponibles-recherche" min="1" max="15" step="1" value="1"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' minimum'">
        <output>1 minimum</output>
    </section>

    <section id="boutons-filtre">
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser"> `
        + StatsEntreprisesOuOffres() +
        `
    </section>
` ;
}


function AfficherFiltresOffre() {
    document.querySelector("#recherche-menu").innerHTML =
        `                
        <section>
        <label for="region-offre-recherche">Region</label>
        <input type="text" id="region-offre-recherche" list="region-datalist"
            placeholder="Selectionner une région">
        <datalist id="region-datalist">
            <option value="Pas de région">Pas de région spécifique</option>
            <option value="test">Paris</option>
            <option value="provence">Provence</option>
            <option value="pays">Pays de la Loire</option>
            <option value="corse">Corse</option>
        </datalist>
    </section>

    <section>
        <label for="competences-recherche">Compétences</label>
        <select id="competences-recherche">
        </select>
    </section>

    <section>
        <label for="promotions-concernees-recherche">Promotions concernées</label>
        <select id="promotions-concernees-recherche">
        </select>
    </section>

    <section>
        <label for="date-stage-recherche">Date de début</label>
        <input type="month" name="date-stage-recherche" id="date-stage-recherche">
    </section>

    <section>
        <label for="duree-stage-recherche">Durée de stage</label>
        <input type="range" id="duree-stage-recherche" min="8" max="20" step="1" value="8"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' semaines minimum'">
        <output>8 semaines minimum</output>
    </section>

    <section>
        <label for="base-remuneration-recherche">Base de rémunération</label>
        <input type="range" id="base-remuneration-recherche" min="4.35" max="10.00" step="0.15" value="4.35"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' € minimum'">
        <output>4.35 € minimum</output>
    </section>

    <section>
        <label for="nombre-postulants-recherche">Nombre de postulants</label>
        <input type="range" id="nombre-postulants-recherche" min="0" max="30" step="1" value="0"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' personnes minimum'">
        <output>0 personnes minimum</output>
    </section>

    <section>
        <label for="places-disponibles-recherche">Places disponibles</label>
        <input type="range" id="places-disponibles-recherche" min="1" max="15" step="1" value="1"
            autocomplete="off" class="slider"
            oninput="this.nextElementSibling.value = this.value + ' minimum'">
        <output>1 minimum</output>
    </section>

    <section id="boutons-filtre">
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser"> `
        + StatsEntreprisesOuOffres() +
        `
    </section>
` ;
}

function AfficherFiltresTuteur() {
    document.querySelector("#recherche-menu").innerHTML =
        `
        <section>
        <label for="nom-tuteur-recherche">Nom</label>
        <input type="text" id="nom-tuteur-recherche" placeholder="Nom">
    </section>

    <section>
        <label for="prenom-tuteur-recherche">Nom</label>
        <input type="text" id="prenom-tuteur-recherche" placeholder="Prénom">
    </section>

    <section>
        <label for="centre-tuteur-recherche">Centre</label>
        <select id="centre-tuteur-recherche">
        </select>
    </section>

    <section id="menu-deroulant-promotions">
        <button type="button" id="bouton-promotions">Promotions assignées</button>
        <ul id="liste-options-promotions">
            <li><input type="checkbox" id="option1"><label for="option1">Option 1</label></li>
            <li><input type="checkbox" id="option2"><label for="option2">Option 1</label></li>
            <li><input type="checkbox" id="option3"><label for="option3">Option 1</label></li>
            <li><input type="checkbox" id="option4"><label for="option4">Option 1</label></li>
            <li><input type="checkbox" id="option5"><label for="option5">Option 1</label></li>
        </ul>
    </section>

    <section id="boutons-filtre">
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser"> `
        + StatsEntreprisesOuOffres() +
        `
    </section>
        `;

    var boutonPromotions = document.querySelector("#bouton-promotions");
    var optionsList = document.querySelector("#liste-options-promotions");

    boutonPromotions.addEventListener("click", function () {
        optionsList.classList.toggle("visible");
    });
}

function AfficherFiltresEtudiant() {
    document.querySelector("#recherche-menu").innerHTML =
        `                   <section>
        <label for="nom-etudiant-recherche">Nom</label>
        <input type="text" id="nom-etudiant-recherche" placeholder="Nom">
    </section>

    <section>
        <label for="prenom-etudiant-recherche">Nom</label>
        <input type="text" id="prenom-etudiant-recherche" placeholder="Prénom">
    </section>

    <section>
        <label for="centre-etudiant-recherche">Centre</label>
        <select id="centre-etudiant-recherche">
        </select>
    </section>

    <section>
        <label for="promotion-etudiant-recherche">Promotion</label>
        <select id="promotion-etudiant-recherche">
        </select>
    </section>

    <section id="boutons-filtre">
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser"> `
        + StatsEntreprisesOuOffres() +
        `
    </section>
        `;
}

function Slider() {
    const SliderRecup = document.querySelectorAll(".slider")

    SliderRecup.forEach(function (slider) {
        const min = slider.min
        const max = slider.max
        const value = slider.value

        slider.style.background = `linear-gradient(to right, #5899E2 0%, #5899E2 ${(value - min) / (max - min) * 100}%, #FFFFFF ${(value - min) / (max - min) * 100}%, #FFFFFF 100%)`

        slider.addEventListener("input", function () {
            this.style.background = `linear-gradient(to right, #5899E2 0%, #5899E2 ${(this.value - this.min) / (this.max - this.min) * 100}%, #FFFFFF ${(this.value - this.min) / (this.max - this.min) * 100}%, #FFFFFF 100%)`
        });
    }
    );
}

function ResetCouleurSlider() {
    const SliderRecup = document.querySelectorAll(".slider");

    SliderRecup.forEach(function (slider) {
        slider.style.background = `white`;
    });
}