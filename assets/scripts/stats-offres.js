// Chargement des bibliothèques pour les graphiques
google.charts.load("current", {
  packages: ["geochart"],
  mapsApiKey: "AIzaSyAgxHvp2OvCHEjca05FzbQRJGz9b7Z27Dc",
});
google.charts.load("current", { packages: ["corechart"] });

// Définition des variables pour les noms des entreprises et des offres (fetch de la BDD à venir)
const entreprise1 = "Facebook";
const entreprise2 = "Vinci";
const entreprise3 = "Orange France";
const offre1 = "Développeur Web";
const offre2 = "Conduite de travaux";
const offre3 = "Stage de cybersécurité";

// Chargements pour affichages des graphiques
google.charts.setOnLoadCallback(drawCompetencesPie);
google.charts.setOnLoadCallback(drawHeatmap);
google.charts.setOnLoadCallback(drawDuree);
google.charts.setOnLoadCallback(drawPromoPie);
document.addEventListener("DOMContentLoaded", function () {
  fetchAndDisplayLogo(entreprise1, "logo1-container");
  fetchAndDisplayLogo(entreprise2, "logo2-container");
  fetchAndDisplayLogo(entreprise3, "logo3-container");
  document.getElementById("logo1-name").textContent = "1 - " + offre1;
  document.getElementById("logo2-name").textContent = "2 - " + offre2;
  document.getElementById("logo3-name").textContent = "3 - " + offre3;
});

// Fonction pour la carte géographique
function drawHeatmap() {
  var data = google.visualization.arrayToDataTable([
    ["Region", "Offres de stage"],
    ["Alsace", 18],
    ["Aquitaine", 8],
    ["Auvergne", 20],
    ["Basse-Normandie", 12],
    ["Bourgogne", 40],
    ["Bretagne", 9],
    ["Centre", 15],
    ["Champagne-Ardenne", 30],
    ["Corse", 3],
    ["Franche-Comté", 11],
    ["Guadeloupe", 10],
    ["Guyane", 7],
    ["Haute-Normandie", 15],
    ["Île-de-France", 50],
    ["La Réunion", 3],
    ["Languedoc-Roussillon", 13],
    ["Limousin", 17],
    ["Lorraine", 40],
    ["Martinique", 30],
    ["Mayotte", 36],
    ["Midi-Pyrénées", 30],
    ["Nord-Pas-de-Calais", 33],
    ["Pays de la Loire", 48],
    ["Picardie", 36],
    ["Poitou-Charentes", 33],
    ["Provence-Alpes-Côte d'Azur", 28],
    ["Rhône-Alpes", 21],
  ]);
  var options = {
    region: "FR",
    resolution: "provinces",
    displayMode: "regions",
    colorAxis: { minValue: 0, colors: ["#dae3e5", "#507dbc"] },
    legend: "none",
  };
  var chart = new google.visualization.GeoChart(
    document.getElementById("heatmap")
  );
  chart.draw(data, options);
}

// Fonction pour le graphique en camembert de compétences
function drawCompetencesPie() {
  var data = google.visualization.arrayToDataTable([
    ["Secteurs", "Hours per Day"],
    ["Développement Web", 11],
    ["Réseau", 2],
    ["Systèmes Embarqués", 4],
    ["Programmation Orientée Objet", 2],
    ["Travaux Publics", 7],
    ["Conduite de travaux", 1],
  ]);
  var options = {
    pieHole: 0.4,
    legend: { position: "bottom" },
    pieSliceText: "value",
  };
  var chart = new google.visualization.PieChart(
    document.getElementById("piechart")
  );
  chart.draw(data, options);
}

// Fonction pour le graphique en ligne de durée des offres
function drawDuree() {
  var data = google.visualization.arrayToDataTable([
    ["Nombre", "Durée"],
    [12, 24],
    [13, 27],
    [14, 30],
    [15, 20],
  ]);

  var options = {
    curveType: "function",
    legend: "none",
    hAxis: {
      title: "Nombre d'offres",
    },
    vAxis: {
      title: "Durée des offres",
    },
    colors: ["#507dbc"],
  };

  var chart = new google.visualization.LineChart(
    document.getElementById("duree-offres")
  );
  chart.draw(data, options);
}

// Fonction pour le graphique en camembert de répartition par promotions
function drawPromoPie() {
  var data = google.visualization.arrayToDataTable([
    ["Promotions", "Offres"],
    ["A2 Info", 3],
    ["A3 Info", 6],
    ["A4 Info", 10],
    ["A5 Info", 12],
    ["A2 BTP", 4],
    ["A3 BTP", 8],
    ["A4 BTP", 10],
    ["A5 BTP", 14],
    ["A2 S3E", 2],
    ["A3 S3E", 7],
    ["A4 S3E", 9],
    ["A5 S3E", 11],
    ["A2 Géneraliste", 5],
    ["A3 Géneraliste", 8],
    ["A4 Géneraliste", 10],
    ["A5 Géneraliste", 13],
  ]);
  var options = {
    pieHole: 0.4,
    legend: { position: "bottom" },
    pieSliceText: "value",
  };
  var chart = new google.visualization.PieChart(
    document.getElementById("promo-piechart")
  );
  chart.draw(data, options);
}

// Fonction pour récupérer le logo de l'entreprise
function fetchAndDisplayLogo(entrepriseNom, containerId) {
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
      imageElement.classList.add("logo-image"); // Add a class to the image element for easier selection
      imageElement.alt = entrepriseNom;

      document.getElementById(containerId).appendChild(imageElement);
    })
    .catch((error) =>
      console.error("Erreur lors de la récupération des données:", error)
    );
}

// Function pour redimensionner les images
function resizeImages() {
  const viewportWidth = window.innerWidth;
  const imageSize = Math.min(viewportWidth * 0.2, 150); // ajuster ici la taille (et la taille max)
  const imageElements = document.getElementsByClassName("logo-image");
  for (let i = 0; i < imageElements.length; i++) {
    imageElements[i].style.width = `${imageSize}px`;
  }
}

// Ajuster les grapgisues à la taille de la fenêtre
window.onresize = function () {
  drawHeatmap();
  drawCompetencesPie();
  resizeImages();
  drawDuree();
  drawPromoPie();
};
