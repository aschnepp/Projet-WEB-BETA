let enterPressed = false;

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector("#site-web-entreprise").addEventListener("keypress", function (e) {
        if (e.key === 'Enter' && document.querySelector("#site-web-entreprise").value.trim() !== "") {
            enterPressed = true;
            setTimeout(() => {
                previewLogo();
                enterPressed = false;
            }, 100);
        }
        if (e.key === 'Enter' && !enterPressed) {
            enterPressed = true;
            setTimeout(() => {
                document.querySelector("#previsualisation-logo").innerHTML = "";
                enterPressed = false;
            }, 100);
        }
    });

    document.querySelector("#site-web-entreprise").addEventListener("input", function () {
        if (document.querySelector("#site-web-entreprise").value.trim() == "") {
            document.querySelector("#previsualisation-logo").innerHTML = "";
        }
    });
});

function previewLogo() {
    var entrepriseValue = document.getElementById("site-web-entreprise").value;
    var entrepriseNom = entrepriseValue.replace("www.", "");
    fetchAndDisplayLogo(entrepriseNom, "previsualisation-logo");
}

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

function resizeImages() {
    const viewportWidth = window.innerWidth;
    const imageSize = Math.min(viewportWidth * 0.3, 150);
    const imageElements = document.getElementsByClassName("logo-image");
    for (let i = 0; i < imageElements.length; i++) {
        imageElements[i].style.width = `${imageSize}px`;
    }
}
