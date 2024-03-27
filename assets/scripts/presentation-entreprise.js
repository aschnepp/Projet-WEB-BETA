var grade = 4.2;

document.addEventListener("DOMContentLoaded", function () {
    var entreprise = document.querySelector(".entreprise");
    var website = entreprise.querySelector(".website").getAttribute("href");
    var domain = new URL(website).hostname.replace("www.", "");
    var container = entreprise.querySelector(".logo-container");
    fetchAndDisplayLogo(domain, container);

    displayGrade(grade);
});

function fetchAndDisplayLogo(entrepriseNom, container) {
    const viewportWidth = window.innerWidth;
    const imageSize = Math.min(viewportWidth * 0.2, 150);
    const apiUrl = `https://autocomplete.clearbit.com/v1/companies/suggest?query=${encodeURIComponent(entrepriseNom)}`;
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

            resizeImages();
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
    const imageSize = Math.min(viewportWidth * 0.3, 200);
    const imageElements = document.querySelectorAll(".logo-image");
    imageElements.forEach(function (imageElement) {
        imageElement.style.width = `${imageSize}px`;
    });
}

function displayGrade(grade) {
    const rateWrappers = document.querySelectorAll(".gradeWrapper");
    const emptystar = "<img width='20' height='20' src='https://img.icons8.com/windows/30/star--v1.png' alt='star--v1' />";
    const fullstar = "<img width='20' height='20' src='https://img.icons8.com/windows/30/filled-star.png' alt='filled-star' />";
    const halfstar = "<img width='20' height='20' src='https://img.icons8.com/windows/30/star-half-empty.png' alt='star-half-empty' />";

    rateWrappers.forEach(function (wrapper) {
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
    });
}
