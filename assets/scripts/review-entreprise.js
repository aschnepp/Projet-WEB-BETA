var grade = 4.4;

document.addEventListener("DOMContentLoaded", function () {
    var entreprise1 = document.getElementById("website");
    var domain = new URL(entreprise1).hostname;
    domain = domain.replace("www.", "");
    fetchAndDisplayLogo(domain, "logo-container");
    displayGrade(grade);
});

window.onresize = function () {
    resizeImages();
};

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
      imageElement.classList.add("logo-image"); // Add a class to the image element for easier selection
      imageElement.alt = entrepriseNom;
      imageElement.style.width = `${imageSize}px`;

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

function displayGrade(grade) {
  const wrapper = document.getElementById("gradeWrapper");
  const emptystar = "<img width='20' height='20' src='https://img.icons8.com/windows/20/star--v1.png' alt='star--v1' />";
  const fullstar = "<img width='20' height='20' src='https://img.icons8.com/windows/20/filled-star.png' alt='filled-star' />";
  const halfstar = "<img width='20' height='20' src='https://img.icons8.com/windows/20/star-half-empty.png' alt='star-half-empty' />";
  
  let html = "";
  let full = Math.floor(grade);
  let half = ((grade % 1) >= 0.5) ? 1 : 0; 
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
}
