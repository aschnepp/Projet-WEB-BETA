var grade = 4.2;

document.addEventListener("DOMContentLoaded", function () {
  var EtatFiltre = document.querySelector("#choix-recherche");

  ChoixFiltre();

  EtatFiltre.addEventListener("change", ChoixFiltre);
});

function ChoixFiltre() {
  var EtatFiltre = document.querySelector("#choix-recherche");
  var valeurSelectionnee = EtatFiltre.value;

  if (valeurSelectionnee === "menu-offre") {
    AfficherFiltresOffre();
  } else if (valeurSelectionnee === "menu-entreprise") {
    AfficherFiltresEntreprise();
  } else if (valeurSelectionnee === "menu-tuteur") {
    AfficherFiltresTuteur();
  } else {
    AfficherFiltresEtudiant();
  }

  var BoutonReset = document.querySelector("#reset-filtre");
  BoutonReset.addEventListener("click", ResetScrollToTop);
  BoutonReset.addEventListener("click", ResetCouleurSlider);
}

function ResetScrollToTop() {
  document.querySelector("#recherche-filtre-main").scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

function StatsEntreprisesOuOffres() {
  var EtatFiltre = document.querySelector("#choix-recherche");
  var valeurSelectionnee = EtatFiltre.value;

  if (valeurSelectionnee === "Entreprise") {
    return `
        <a href="stats-entreprise.php" target="_blank" title="Statistiques d'entreprise"
    id="bouton-stats-entreprise">Statistiques d'entreprises</a>
        `;
  } else if (valeurSelectionnee === "Offre") {
    return `
        <a href="stats-offres.php" target="_blank" title="Statistiques d'offres" id="bouton-stats-offres">Statistiques
        d'offres</a>
        `;
  } else {
    return "";
  }
}

function AfficherFiltresOffre() {
  ClearRecherche();
  document.querySelector("#recherche-menu").innerHTML = `                
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
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser">
        <input type="button" name="ajout" class="ajout" value="Ajouter offre"> 
        <a href="stats-offres.php" target="_blank" title="Statistiques d'offres" id="bouton-stats-offres">Statistiques d'offres</a>
    </section>
`;

  document.querySelector("#affichage-filtre").insertAdjacentHTML(
    "afterbegin",
    `

<section class="offre">
<section class="headerOffre">
    <h3>Stage Recherche Réseau</h3>
    <section class="stats">
        <section class="likes item">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/hearts.png"
                alt="wishlists" />
            <p>3</p>
        </section>
        <section class="demandes item">
            <img width="30" height="30"
                src="https://img.icons8.com/ios-glyphs/30/secured-letter--v1.png" alt="demandes" />
            <p>1</p>
        </section>
    </section>
</section>

<section class="infos">
    <section class="competences item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/learning.png"
            alt="learning" />
        <p>IP, NAT, CCNAv7</p>
    </section>
    <section class="localisation item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/map-marker.png"
            alt="map-marker" />
        <p>2 allée des foulons, 67380 Lingolsheim</p>
    </section>
    <section class="entreprise-logo item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/client-company.png"
            alt="client-company" />
        <p>CESI Strasbourg</p>
    </section>
    <section class="promo item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/reviewer-male.png"
            alt="reviewer-male" />
        <p>CPI A2 Info</p>
    </section>
    <section class="duree item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/time--v1.png"
            alt="time--v1" />
        <p>12 Semaines</p>
    </section>
    <section class="date item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/google-calendar.png"
            alt="google-calendar" />
        <p>08/04 - 19/07</p>
    </section>
    <section class="remuneration item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/money--v1.png"
            alt="money--v1" />
        <p>4,35€ / heure</p>
    </section>
    <section class="places item">
        <img width="30" height="30"
            src="https://img.icons8.com/ios-glyphs/30/conference-call--v1.png"
            alt="conference-call--v1" />
        <p>3 places</p>
    </section>
    <section class="description">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam. Quas,
            quaerat.
            Quisquam
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam repellendus cum ea
            pariatur et
            modi,
            laborum quae consequatur doloribus accusantium eligendi aperiam, illo iure autem nobis
            velit
            eos
            facilis. Sapiente!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam sunt magni, saepe,
            tempore qui odio
            necessitatibus laboriosam repellat, nobis voluptatem blanditiis rerum placeat libero
            aliquid
            sit
            explicabo maiores molestiae
        </p>
    </section>
    <section class="boutons-offre">
        <button type="button" class="postuler">Postuler</button>
        <button type="button">Modifier offre</button>
        <button type="button">Ajouter à la Wishlist</button>
    </section>
</section>
</section>

<section class="offre">
<section class="headerOffre">
    <h3>Stage Recherche Réseau</h3>
    <section class="stats">
        <section class="likes item">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/hearts.png"
                alt="wishlists" />
            <p>3</p>
        </section>
        <section class="demandes item">
            <img width="30" height="30"
                src="https://img.icons8.com/ios-glyphs/30/secured-letter--v1.png" alt="demandes" />
            <p>1</p>
        </section>
    </section>
</section>

<section class="infos">
    <section class="competences item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/learning.png"
            alt="learning" />
        <p>IP, NAT, CCNAv7</p>
    </section>
    <section class="localisation item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/map-marker.png"
            alt="map-marker" />
        <p>2 allée des foulons, 67380 Lingolsheim</p>
    </section>
    <section class="entreprise-logo item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/client-company.png"
            alt="client-company" />
        <p>CESI Strasbourg</p>
    </section>
    <section class="promo item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/reviewer-male.png"
            alt="reviewer-male" />
        <p>CPI A2 Info</p>
    </section>
    <section class="duree item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/time--v1.png"
            alt="time--v1" />
        <p>12 Semaines</p>
    </section>
    <section class="date item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/google-calendar.png"
            alt="google-calendar" />
        <p>08/04 - 19/07</p>
    </section>
    <section class="remuneration item">
        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/money--v1.png"
            alt="money--v1" />
        <p>4,35€ / heure</p>
    </section>
    <section class="places item">
        <img width="30" height="30"
            src="https://img.icons8.com/ios-glyphs/30/conference-call--v1.png"
            alt="conference-call--v1" />
        <p>3 places</p>
    </section>
    <section class="description">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quibusdam. Quas,
            quaerat.
            Quisquam
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam repellendus cum ea
            pariatur et
            modi,
            laborum quae consequatur doloribus accusantium eligendi aperiam, illo iure autem nobis
            velit
            eos
            facilis. Sapiente!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam sunt magni, saepe,
            tempore qui odio
            necessitatibus laboriosam repellat, nobis voluptatem blanditiis rerum placeat libero
            aliquid
            sit
            explicabo maiores molestiae
        </p>
    </section>
    <section class="boutons-offre">
        <button type="button" class="postuler">Postuler</button>
        <button type="button">Modifier offre</button>
        <button type="button">Ajouter à la Wishlist</button>
    </section>
</section>
</section>
`
  );
  Slider();
}

function AfficherFiltresEntreprise() {
  ClearRecherche();
  document.querySelector("#recherche-menu").innerHTML = `
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
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser">
        <input type="button" name="ajout" class="ajout" value="Ajouter entreprise"> 
        <a href="stats-entreprise.php" target="_blank" title="Statistiques d'entreprise" id="bouton-stats-entreprise">Statistiques d'entreprises</a>
    </section>
`;

  document.querySelector("#affichage-filtre").insertAdjacentHTML(
    "afterbegin",
    `

<section class="entreprise">
<div class="logo-container"></div>
<section class="contentEntreprise">
    <section class="headerEntreprise">
        <h2>CESI</h2>
        <section class="gradeWrapper">
            <div class="rate2">

            </div>
        </section>
    </section>
    <section class="bodyEntreprise">
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png"
                alt="domain" />
            <a href="https://www.amazon.fr/" target="_blank" class="website">amazon.com</a>
        </div>
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png"
                alt="map-marker" />
            <p>2 allée des foulons, 67380 Lingolsheim</p>
        </div>
        <div class="items">
            <img width="30" height="30"
                src="https://img.icons8.com/ios-glyphs/45/client-company.png"
                alt="client-company" />
            <p>Education / Formation</p>
        </div>
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png"
                alt="groups" />
            <p>30 personnes</p>
        </div>
    </section>
</section>
<section class="boutons-entreprise">
    <button type="button">Voir les offres disponibles</button>
    <button type="button">Modifier entreprise</button>
</section>
<section class="description">
<fieldset>
    <legend>Description</legend>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus,
        neque tempora! Cum
        quae
        pariatur veniam enim vel amet eligendi fuga dolor suscipit ea? Fugiat unde ex expedita alias
        minus
        voluptatibus.
    </p>
</fieldset>
</section>
</section>

<section class="entreprise">
<div class="logo-container"></div>
<section class="contentEntreprise">
    <section class="headerEntreprise">
        <h2>CESI</h2>
        <section class="gradeWrapper">
            <div class="rate2">

            </div>
        </section>
    </section>
    <section class="bodyEntreprise">
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png"
                alt="domain" />
            <a href="https://www.cesi.fr/" target="_blank" class="website">www.cesi.fr</a>
        </div>
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png"
                alt="map-marker" />
            <p>2 allée des foulons, 67380 Lingolsheim</p>
        </div>
        <div class="items">
            <img width="30" height="30"
                src="https://img.icons8.com/ios-glyphs/45/client-company.png"
                alt="client-company" />
            <p>Education / Formation</p>
        </div>
        <div class="items">
            <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png"
                alt="groups" />
            <p>30 personnes</p>
        </div>
    </section>
</section>
<section class="boutons-entreprise">
    <button type="button">Voir les offres disponibles</button>
    <button type="button">Modifier entreprise</button>
</section>
<section class="description">
<fieldset>
    <legend>Description</legend>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus,
        neque tempora! Cum
        quae
        pariatur veniam enim vel amet eligendi fuga dolor suscipit ea? Fugiat unde ex expedita alias
        minus
        voluptatibus.
    </p>
</fieldset>
</section>
</section>
`
  );

  var entreprises = document.querySelectorAll(".entreprise");
  entreprises.forEach(function (entreprise) {
    var website = entreprise.querySelector(".website").getAttribute("href");
    var domain = new URL(website).hostname.replace("www.", "");
    var container = entreprise.querySelector(".logo-container");
    fetchAndDisplayLogo(domain, container);
  });

  displayGrade(grade);

  Slider();
}

function AfficherFiltresTuteur() {
  ClearRecherche();
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
            <li><input type="checkbox" id="bac-1"><label for="bac-1">Bac +1</label></li>
            <li><input type="checkbox" id="bac-2"><label for="bac-2">Bac +2</label></li>
            <li><input type="checkbox" id="bac-3"><label for="bac-3">Bac +3</label></li>
            <li><input type="checkbox" id="bac-4"><label for="bac-4">Bac +4</label></li>
            <li><input type="checkbox" id="bac-5"><label for="bac-5">Bac +5</label></li>
        </ul>
    </section>

    <section id="boutons-filtre">
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser">
        <input type="button" name="ajout" class="ajout" value="Ajouter tuteur"> ` +
    StatsEntreprisesOuOffres() +
    `
    </section>
        `;

  document.querySelector("#affichage-filtre").insertAdjacentHTML(
    "afterbegin",
    `
    
    <section class="tuteur">
    <section>
        <img src="../assets/fontawesome/svgs/solid/user.svg" alt="Icône utilisateur par défaut"
            class="fa-user">
        <section class="infos-tuteur">
            <section>
                <p>Prénom :</p>
                <p>d,qzd,qdq</p>
            </section>
            <section>
                <p>Nom :</p>
                <p>DQZDQ</p>
            </section>
            <section>
                <p>Email :</p>
                <p>guigui67480&#8203;@gmail&#8203;.com</p>
            </section>
        </section>
    </section>
    <section>
        <section>
            <p>Date de naissance :</p>
            <p>11 mai 2004</p>
        </section>
        <section>
            <p>Age :</p>
            <p>19</p>
        </section>
        <section>
            <p>Adresse :</p>
            <p>19 rue des tests, Strasbourg, 67000</p>
        </section>
        <section>
            <p>Promotion gérées</p>
            <p>A1, A2, A3</p>
        </section>
        <section>
            <p>Centre :</p>
            <p>Strasbourg</p>
        </section>
    </section>
    <section class="boutons-tuteur">
        <button type="button">Modifier tuteur</button>
    </section>
</section>
    `
  );
  var boutonPromotions = document.querySelector("#bouton-promotions");
  var optionsList = document.querySelector("#liste-options-promotions");

  boutonPromotions.addEventListener("click", function () {
    optionsList.classList.toggle("visible");
  });
}

function AfficherFiltresEtudiant() {
  ClearRecherche();
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
        <input type="reset" name="reset" id="reset-filtre" value="Réinitialiser">
        <input type="button" name="ajout" class="ajout" value="Ajouter etudiant"> ` +
    StatsEntreprisesOuOffres() +
    `
    </section>
        `;

  document.querySelector("#affichage-filtre").insertAdjacentHTML(
    "afterbegin",
    `

        <section class="etudiant">
        <section>
            <img src="../assets/fontawesome/svgs/solid/user.svg" alt="Icône utilisateur par défaut"
                class="fa-user">
            <section class="infos-etudiant">
                <section>
                    <p>Prénom :</p>
                    <p>d,qzd,qdq</p>
                </section>
                <section>
                    <p>Nom :</p>
                    <p>DQZDQ</p>
                </section>
                <section>
                    <p>Email :</p>
                    <p>guigui67480&#8203;@gmail&#8203;.com</p>
                </section>
            </section>
        </section>
        <section>
            <section>
                <p>Date de naissance :</p>
                <p>11 mai 2004</p>
            </section>
            <section>
                <p>Age :</p>
                <p>19</p>
            </section>
            <section>
                <p>Adresse :</p>
                <p>19 rue des tests, Strasbourg, 67000</p>
            </section>
            <section>
                <p>Promotion :</p>
                <p>BAC +1</p>
            </section>
            <section>
                <p>Centre :</p>
                <p>Strasbourg</p>
            </section>
            <section>
                <p>Candidatures effectuées :</p>
                <p>47</p>
            </section>
            <section>
                <p>Stages effectués :</p>
                <p>3</p>
            </section>
        </section>
        <section class="boutons-etudiant">
            <button type="button">Gérer ses offres de stage</button>
            <button type="button">Gérer sa wishlist</button>
            <button type="button">Modifier étudiant</button>
        </section>
    </section>
        `
  );
}

function ClearRecherche() {
  const affichageFiltre = document.getElementById("affichage-filtre");

  affichageFiltre.innerHTML = "<button>+ Afficher plus</button>";
}

function Slider() {
  const SliderRecup = document.querySelectorAll(".slider");

  SliderRecup.forEach(function (slider) {
    const min = slider.min;
    const max = slider.max;
    const value = slider.value;

    slider.style.background = `linear-gradient(to right, #5899E2 0%, #5899E2 ${
      ((value - min) / (max - min)) * 100
    }%, #FFFFFF ${((value - min) / (max - min)) * 100}%, #FFFFFF 100%)`;

    slider.addEventListener("input", function () {
      this.style.background = `linear-gradient(to right, #5899E2 0%, #5899E2 ${
        ((this.value - this.min) / (this.max - this.min)) * 100
      }%, #FFFFFF ${
        ((this.value - this.min) / (this.max - this.min)) * 100
      }%, #FFFFFF 100%)`;
    });
  });
}

function ResetCouleurSlider() {
  const SliderRecup = document.querySelectorAll(".slider");

  SliderRecup.forEach(function (slider) {
    slider.style.background = `white`;
  });
}

function fetchAndDisplayLogo(entrepriseNom, container) {
  const viewportWidth = window.innerWidth;
  const imageSize = Math.min(viewportWidth * 0.2, 150);
  const apiUrl = `https://autocomplete.clearbit.com/v1/companies/suggest?query=${encodeURIComponent(
    entrepriseNom
  )}`;
  fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
      const domain = data[0]?.domain;
      const logoUrl = `https://logo.clearbit.com/${domain}`;
      const imageElement = document.createElement("img");
      imageElement.src = logoUrl;
      imageElement.classList.add("logo-image");
      imageElement.alt = entrepriseNom;
      imageElement.style.width = `${imageSize}px`;

      const existingElement = container.firstChild;

      if (existingElement) {
        container.replaceChild(imageElement, existingElement);
      } else {
        container.appendChild(imageElement);
      }
    })
    .catch((error) =>
      console.error("Erreur lors de la récupération des données:", error)
    );
}

window.onresize = function () {
  resizeImages();
};

function resizeImages() {
  const viewportWidth = window.innerWidth;
  const imageSize = Math.min(viewportWidth * 0.3, 150);
  const imageElements = document.querySelectorAll(".logo-image");
  imageElements.forEach(function (imageElement) {
    imageElement.style.width = `${imageSize}px`;
  });
}

function displayGrade(grade) {
  const rateWrappers = document.querySelectorAll(".gradeWrapper");
  const emptystar =
    "<img width='20' height='20' src='https://img.icons8.com/windows/30/star--v1.png' alt='star--v1' />";
  const fullstar =
    "<img width='20' height='20' src='https://img.icons8.com/windows/30/filled-star.png' alt='filled-star' />";
  const halfstar =
    "<img width='20' height='20' src='https://img.icons8.com/windows/30/star-half-empty.png' alt='star-half-empty' />";

  rateWrappers.forEach(function (wrapper) {
    let html = "";
    let full = Math.floor(grade);
    let half = grade % 1 >= 0.5 ? 1 : 0;
    let empty = 5 - full - half;
    for (let i = 0; i < full; i++) {
      html += fullstar;
    }
    if (half > 0) {
      html += halfstar;
    }
    for (let i = 0; i < empty; i++) {
      html += emptystar;
    }
    wrapper.innerHTML = html;
  });
}
