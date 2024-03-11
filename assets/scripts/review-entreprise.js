var entreprise1 = "Facebook";

document.addEventListener("DOMContentLoaded", function () {
    fetchAndDisplayLogo(entreprise1, "logo-container");
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