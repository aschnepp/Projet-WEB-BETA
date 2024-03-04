google.charts.load("current", { packages: ["geochart"] });
google.charts.setOnLoadCallback(drawRegionsMap);
function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ["Region", "Offres"],
    ["Alsace", 200],
    ["Aquitaine", 300],
    ["Auvergne", 400],
    ["Basse-Normandie", 500],
    ["Bourgogne", 600],
    ["Bretagne", 700],
    ["Centre", 800],
    ["Champagne-Ardenne", 900],
    ["Corse", 1000],
    ["Franche-Comté", 1100],
    ["Guadeloupe", 1200],
    ["Guyane", 1300],
    ["Haute-Normandie", 1400],
    ["Île-de-France", 1500],
    ["La Réunion", 1600],
    ["Languedoc-Roussillon", 1700],
    ["Limousin", 1800],
    ["Lorraine", 1900],
    ["Martinique", 2000],
    ["Mayotte", 2100],
    ["Midi-Pyrénées", 2200],
    ["Nord-Pas-de-Calais", 2300],
    ["Pays de la Loire", 2400],
    ["Picardie", 2500],
    ["Poitou-Charentes", 2600],
    ["Provence-Alpes-Côte d'Azur", 2700],
    ["Rhône-Alpes", 2800],
  ]);
  var options = {
    region: "FR",
    resolution: "provinces",
    displayMode: "regions",
    colorAxis: { minValue: 0, colors: ["lightgray", "teal"] },
  };
  var chart = new google.visualization.GeoChart(
    document.getElementById("regions_div")
  );
  chart.draw(data, options);
}
