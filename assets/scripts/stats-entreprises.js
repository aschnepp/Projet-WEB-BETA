document.addEventListener("DOMContentLoaded", function () {
  // Initialisation de l'API google pour les graphiques (geochart, corechart) et la clé API (sécurisée)
  google.charts.load("current", {
    packages: ["geochart", "corechart"],
    mapsApiKey: "AIzaSyAgxHvp2OvCHEjca05FzbQRJGz9b7Z27Dc",
  });

  // Formattage des données de secteurs pour le graphique en camembert
  formattedSectors = sectors.map((sector) => [sector.nom, sector.total]);
  formattedSectors.unshift(["Secteur", "Nombre d'entreprises"]);

  // Chargements pour affichages des graphiques
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawRegionsMap);

  // Formattage de l'URL pour les logos des entreprises pour les afficher
  var domain = new URL(logo1).hostname;
  domain = domain.replace("www.", "");
  fetchAndDisplayLogo(domain, "logo1-container");
  var domain2 = new URL(logo2).hostname;
  domain2 = domain2.replace("www.", "");
  fetchAndDisplayLogo(domain2, "logo2-container");
  var domain3 = new URL(logo3).hostname;
  domain3 = domain3.replace("www.", "");
  fetchAndDisplayLogo(domain3, "logo3-container");

  // Affichage du nom des postes les plus wishlisted
  document.getElementById("logo1-name").textContent = "1 - " + name1;
  document.getElementById("logo2-name").textContent = "2 - " + name2;
  document.getElementById("logo3-name").textContent = "3 - " + name3;
});

// Fonction pour la heatmap
function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ["Region", "Entreprises"],
    ["Alsace", Math.ceil(regions[10].Total_Entreprises / 3)],
    ["Aquitaine", Math.floor(regions[13].Total_Entreprises / 3)],
    ["Auvergne", Math.floor(regions[15].Total_Entreprises / 2)],
    ["Basse-Normandie", Math.floor(regions[8].Total_Entreprises / 2)],
    ["Bourgogne", Math.floor(regions[7].Total_Entreprises / 2)],
    ["Bretagne", regions[12].Total_Entreprises],
    ["Centre", regions[6].Total_Entreprises],
    ["Champagne-Ardenne", Math.floor(regions[10].Total_Entreprises / 3)],
    ["Corse", regions[17].Total_Entreprises],
    ["Franche-Comté", Math.ceil(regions[7].Total_Entreprises / 2)],
    ["Guadeloupe", regions[0].Total_Entreprises],
    ["Guyane", regions[2].Total_Entreprises],
    ["Haute-Normandie", Math.ceil(regions[8].Total_Entreprises / 2)],
    ["Île-de-France", regions[5].Total_Entreprises],
    ["La Réunion", regions[3].Total_Entreprises],
    ["Languedoc-Roussillon", Math.floor(regions[14].Total_Entreprises / 2)],
    ["Limousin", Math.ceil(regions[13].Total_Entreprises / 3)],
    ["Lorraine", Math.ceil(regions[10].Total_Entreprises / 3)],
    ["Martinique", regions[1].Total_Entreprises],
    ["Mayotte", regions[4].Total_Entreprises],
    ["Midi-Pyrénées", Math.ceil(regions[14].Total_Entreprises / 2)],
    ["Nord-Pas-de-Calais", Math.floor(regions[9].Total_Entreprises / 2)],
    ["Pays de la Loire", regions[11].Total_Entreprises],
    ["Picardie", Math.ceil(regions[9].Total_Entreprises / 2)],
    ["Poitou-Charentes", Math.ceil(regions[13].Total_Entreprises / 3)],
    ["Provence-Alpes-Côte d'Azur", regions[16].Total_Entreprises],
    ["Rhône-Alpes", Math.ceil(regions[15].Total_Entreprises / 2)],
  ]);
  var options = {
    region: "FR",
    resolution: "provinces",
    displayMode: "regions",
    colorAxis: { minValue: 0, colors: ["#dae3e5", "#507dbc"] },
    legend: "none",
  };
  var chart = new google.visualization.GeoChart(
    document.getElementById("regions_div")
  );
  chart.draw(data, options);
}

// Fonction pour le camembert
function drawChart() {
  var data = google.visualization.arrayToDataTable(formattedSectors);

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

// Fonction pour récupérer et afficher le logo de l'entreprise
function fetchAndDisplayLogo(entrepriseNom, containerId) {
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

      const container = document.getElementById(containerId);
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

// Function to resize the images based on viewport width
function resizeImages() {
  const viewportWidth = window.innerWidth;
  const imageSize = Math.min(viewportWidth * 0.2, 150); // Adjust the percentage or maximum size as needed
  const imageElements = document.getElementsByClassName("logo-image");
  for (let i = 0; i < imageElements.length; i++) {
    imageElements[i].style.width = `${imageSize}px`;
  }
}

// Redimensionnement des graphiques et des images lors du redimensionnement de la fenêtre
window.onresize = function () {
  drawRegionsMap();
  drawChart();
  resizeImages();
};
