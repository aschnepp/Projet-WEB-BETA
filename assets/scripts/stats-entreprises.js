const entreprise1 = "Facebook";
const entreprise2 = "Vinci";
const entreprise3 = "Orange France";

google.charts.load("current", {
  packages: ["geochart"],
  mapsApiKey: "AIzaSyAgxHvp2OvCHEjca05FzbQRJGz9b7Z27Dc",
});
google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawRegionsMap);
document.addEventListener("DOMContentLoaded", function () {
  fetchAndDisplayLogo(entreprise1, "logo1-container");
  fetchAndDisplayLogo(entreprise2, "logo2-container");
  fetchAndDisplayLogo(entreprise3, "logo3-container");
  document.getElementById("logo1-name").textContent = "1 - " + entreprise1;
  document.getElementById("logo2-name").textContent = "2 - " + entreprise2;
  document.getElementById("logo3-name").textContent = "3 - " + entreprise3;
});

function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ["Region", "Entreprises"],
    ["Alsace", 18],
    ["Aquitaine", 8],
    ["Auvergne", 15],
    ["Basse-Normandie", 12],
    ["Bourgogne", 21],
    ["Bretagne", 9],
    ["Centre", 15],
    ["Champagne-Ardenne", 16],
    ["Corse", 6],
    ["Franche-Comté", 8],
    ["Guadeloupe", 2],
    ["Guyane", 4],
    ["Haute-Normandie", 15],
    ["Île-de-France", 25],
    ["La Réunion", 3],
    ["Languedoc-Roussillon", 13],
    ["Limousin", 17],
    ["Lorraine", 20],
    ["Martinique", 10],
    ["Mayotte", 12],
    ["Midi-Pyrénées", 10],
    ["Nord-Pas-de-Calais", 11],
    ["Pays de la Loire", 16],
    ["Picardie", 12],
    ["Poitou-Charentes", 11],
    ["Provence-Alpes-Côte d'Azur", 9],
    ["Rhône-Alpes", 7],
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

function drawChart() {
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

// Function to resize the images based on viewport width
function resizeImages() {
  const viewportWidth = window.innerWidth;
  const imageSize = Math.min(viewportWidth * 0.2, 150); // Adjust the percentage or maximum size as needed
  const imageElements = document.getElementsByClassName("logo-image");
  for (let i = 0; i < imageElements.length; i++) {
    imageElements[i].style.width = `${imageSize}px`;
  }
}

window.onresize = function () {
  drawRegionsMap();
  drawChart();
  resizeImages();
};
