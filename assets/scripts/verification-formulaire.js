document.addEventListener('DOMContentLoaded', () => {
    Verif();
});

function Verif() {
    var currentPageURL = window.location.href;
    var form = document.querySelector("form");
    var reset = document.querySelector("form #reset");

    if (currentPageURL.indexOf("gestion-etudiant") !== -1) {
        VerifEtudiant();
        form.addEventListener("input", VerifEtudiant);
        form.addEventListener("click", VerifEtudiant);
        reset.addEventListener("click", function () {
            setTimeout(function () {
                VerifEtudiant();
            }, 50);
        });
    }

    else if (currentPageURL.indexOf("gestion-tuteur") !== -1) {
        VerifTuteur();
        form.addEventListener("input", VerifTuteur);
        form.addEventListener("click", VerifTuteur);
        reset.addEventListener("click", function () {
            setTimeout(function () {
                VerifTuteur();
            }, 50);
        });
    }

    else if (currentPageURL.indexOf("gestion-offre") !== -1) {
        VerifOffre();
        form.addEventListener("input", VerifOffre);
        form.addEventListener("click", VerifOffre);
        reset.addEventListener("click", function () {
            setTimeout(function () {
                VerifOffre();
            }, 50);
        });
    }

    else {
        VerifEntreprise();
        form.addEventListener("input", VerifEntreprise);
        form.addEventListener("click", VerifEntreprise);
        reset.addEventListener("click", function () {
            setTimeout(function () {
                VerifEtudiant();
            }, 50);
        });
    }
}

/*----------Fonctions globales----------*/

function ChangerIcone(element, classesAjout, classesSuppression) {
    var iconeExistant = element.parentNode.querySelector('.fa');
    if (iconeExistant) {
        classesSuppression.forEach(classesSuppression => {
            iconeExistant.classList.remove(classesSuppression);
        });
        classesAjout.forEach(classesAjout => {
            iconeExistant.classList.add(classesAjout);
        });
    } else {
        var nouvelIcone = document.createElement("i");
        nouvelIcone.classList.add("fa");
        classesAjout.forEach(classesAjout => {
            nouvelIcone.classList.add(classesAjout);
        });
        element.parentNode.insertBefore(nouvelIcone, element.nextSibling);
    }
}

function ajouterIconeInput(element, valide) {
    var classesSucces = ["fa-check-circle", "validation-icone-input"];
    var classesErreur = ["fa-times-circle", "no-validation-icone-input"];
    var classesAjout = valide ? classesSucces : classesErreur;
    var classesSuppression = valide ? classesErreur : classesSucces;
    ChangerIcone(element, classesAjout, classesSuppression);
}

function ajouterIconeLabel(element, valide) {
    var classesSucces = ["fa-check-circle", "validation-icone-label"];
    var classesErreur = ["fa-times-circle", "no-validation-icone-label"];
    var classesAjout = valide ? classesSucces : classesErreur;
    var classesSuppression = valide ? classesErreur : classesSucces;
    ChangerIcone(element, classesAjout, classesSuppression);
}

function ChangerEtatBouton() {
    var bouton = document.querySelector("#submit");

    function scrollTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    if (document.querySelector(".fa-times-circle")) {
        bouton.setAttribute('type', 'button');
        bouton.addEventListener('click', scrollTop);
    } else {
        bouton.removeEventListener('submit', scrollTop);
        setTimeout(function () {
            bouton.setAttribute('type', 'submit');
        }, 50);
    }
}

/*----------Fonctions de Verification pour Etudiant----------*/

function VerifNomEtudiant(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}

function VerifPrenomEtudiant(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}

function VerifEmailEtudiant(valeur) {
    var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifDateNaissanceEtudiant(valeur) {
    console.log(valeur)
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}


function VerifAdresseEtudiant(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    }
    else {
        return false;
    }
}

function VerifNumeroEtudiant(valeur) {
    var regex = /^\d+[a-zA-Z]?$|^$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifCodePostalEtudiant(valeur) {
    var regex = /^\d{5}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifVilleEtudiant(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifRegionEtudiant(valeur) {
    var datalist = document.querySelector("#administrative_area_level_1-etudiant");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifPromotionEtudiant(valeur) {
    var datalist = document.querySelector("#promotion-etudiant");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifCentreEtudiant(valeur) {
    var datalist = document.querySelector("#centre-etudiant");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifEtudiant() {
    var nomEtudiant = document.querySelector("#nom-etudiant");
    var ValidationNom = VerifNomEtudiant(nomEtudiant.value);
    ajouterIconeInput(nomEtudiant, ValidationNom);

    var PrenomEtudiant = document.querySelector("#prenom-etudiant");
    var ValidationPrenom = VerifPrenomEtudiant(PrenomEtudiant.value);
    ajouterIconeInput(PrenomEtudiant, ValidationPrenom);

    var EmailEtudiant = document.querySelector("#email-etudiant");
    var ValidationEmail = VerifEmailEtudiant(EmailEtudiant.value);
    ajouterIconeInput(EmailEtudiant, ValidationEmail);

    var DateNaissanceEtudiant = document.querySelector("#date-naissance-etudiant");
    var ValidationDateNaissance = VerifDateNaissanceEtudiant(DateNaissanceEtudiant.value);
    ajouterIconeInput(DateNaissanceEtudiant, ValidationDateNaissance);

    var AdresseEtudiant = document.querySelector("#adresse-etudiant");
    var ValidationAdresse = VerifAdresseEtudiant(AdresseEtudiant.value);
    ajouterIconeInput(AdresseEtudiant, ValidationAdresse);

    var NumeroAdresseEtudiant = document.querySelector("#street_number-etudiant");
    var ValidationNumero = VerifNumeroEtudiant(NumeroAdresseEtudiant.value);
    ajouterIconeInput(NumeroAdresseEtudiant, ValidationNumero);

    var CodePostalEtudiant = document.querySelector("#postal_code-etudiant");
    var ValidationCodePostal = VerifCodePostalEtudiant(CodePostalEtudiant.value);
    ajouterIconeInput(CodePostalEtudiant, ValidationCodePostal);

    var VilleEtudiant = document.querySelector("#locality-etudiant");
    var ValidationVille = VerifVilleEtudiant(VilleEtudiant.value);
    ajouterIconeInput(VilleEtudiant, ValidationVille);

    var RegionEtudiant = document.querySelector("#administrative_area_level_1-etudiant");
    var ValidationRegion = VerifRegionEtudiant(RegionEtudiant.value);
    ajouterIconeInput(RegionEtudiant, ValidationRegion);

    var PromotionEtudiant = document.querySelector("#promotion-etudiant");
    var ValidationPromotion = VerifPromotionEtudiant(PromotionEtudiant.value);
    ajouterIconeInput(PromotionEtudiant, ValidationPromotion);

    var CentreEtudiant = document.querySelector("#centre-etudiant");
    var ValidationCentre = VerifCentreEtudiant(CentreEtudiant.value);
    ajouterIconeInput(CentreEtudiant, ValidationCentre);

    ChangerEtatBouton();
}


/*----------Fonctions de Verification pour Tuteur----------*/

function VerifNomTuteur(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}

function VerifPrenomTuteur(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}

function VerifEmailTuteur(valeur) {
    var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifDateNaissanceTuteur(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}


function VerifAdresseTuteur(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    }
    else {
        return false;
    }
}

function VerifNumeroTuteur(valeur) {
    var regex = /^\d+[a-zA-Z]?$|^$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifCodePostalTuteur(valeur) {
    var regex = /^\d{5}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifVilleTuteur(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifRegionTuteur(valeur) {
    var datalist = document.querySelector("#administrative_area_level_1-tuteur");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifPromotionTuteur(valeur) {
    var datalist = document.querySelector("#promotion-tuteur");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifCentreTuteur(valeur) {
    var datalist = document.querySelector("#centre-tuteur");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifTuteur() {
    var nomTuteur = document.querySelector("#nom-tuteur");
    var ValidationNom = VerifNomTuteur(nomTuteur.value);
    ajouterIconeInput(nomTuteur, ValidationNom);

    var PrenomTuteur = document.querySelector("#prenom-tuteur");
    var ValidationPrenom = VerifPrenomTuteur(PrenomTuteur.value);
    ajouterIconeInput(PrenomTuteur, ValidationPrenom);

    var EmailTuteur = document.querySelector("#email-tuteur");
    var ValidationEmail = VerifEmailTuteur(EmailTuteur.value);
    ajouterIconeInput(EmailTuteur, ValidationEmail);

    var DateNaissanceTuteur = document.querySelector("#date-naissance-tuteur");
    var ValidationDateNaissance = VerifDateNaissanceTuteur(DateNaissanceTuteur.value);
    ajouterIconeInput(DateNaissanceTuteur, ValidationDateNaissance);

    var AdresseTuteur = document.querySelector("#adresse-tuteur");
    var ValidationAdresse = VerifAdresseTuteur(AdresseTuteur.value);
    ajouterIconeInput(AdresseTuteur, ValidationAdresse);

    var NumeroAdresseTuteur = document.querySelector("#street_number-tuteur");
    var ValidationNumero = VerifNumeroTuteur(NumeroAdresseTuteur.value);
    ajouterIconeInput(NumeroAdresseTuteur, ValidationNumero);

    var CodePostalTuteur = document.querySelector("#postal_code-tuteur");
    var ValidationCodePostal = VerifCodePostalTuteur(CodePostalTuteur.value);
    ajouterIconeInput(CodePostalTuteur, ValidationCodePostal);

    var VilleTuteur = document.querySelector("#locality-tuteur");
    var ValidationVille = VerifVilleTuteur(VilleTuteur.value);
    ajouterIconeInput(VilleTuteur, ValidationVille);

    var RegionTuteur = document.querySelector("#administrative_area_level_1-tuteur");
    var ValidationRegion = VerifRegionTuteur(RegionTuteur.value);
    ajouterIconeInput(RegionTuteur, ValidationRegion);

    var PromotionTuteur = document.querySelector("#promotion-tuteur");
    var ValidationPromotion = VerifPromotionTuteur(PromotionTuteur.value);
    ajouterIconeInput(PromotionTuteur, ValidationPromotion);

    var CentreTuteur = document.querySelector("#centre-tuteur");
    var ValidationCentre = VerifCentreTuteur(CentreTuteur.value);
    ajouterIconeInput(CentreTuteur, ValidationCentre);

    ChangerEtatBouton();
}

/*----------Fonctions de Verification pour Offre----------*/


function VerifNomOffre(valeur) {
    if (valeur.trim() !== '') {
        return true;
    }
    else {
        return false;
    }
}

function VerifSecteurOffre(valeur) {
    var datalist = document.querySelector("#secteur-activite-offre");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
}

function VerifCompetencesOffre(valeur) {
    var datalist = document.querySelector("#competences-offre");
    var options = datalist.querySelectorAll("option");

    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifEntrepriseOffre(valeur) {
    var datalist = document.querySelector("#entreprise-offre");
    var options = datalist.querySelectorAll("option");

    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifPromotionsOffre(valeur) {
    var datalist = document.querySelector("#promotions-concernees-offre");
    var options = datalist.querySelectorAll("option");

    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
    // TODO Faire lien avec Base de données
}

function VerifAdresseOffre(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    }
    else {
        return false;
    }
}

function VerifNumeroOffre(valeur) {
    var regex = /^\d+[a-zA-Z]?$|^$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifCodePostalOffre(valeur) {
    var regex = /^\d{5}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifVilleOffre(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifRegionOffre(valeur) {
    var datalist = document.querySelector("#administrative_area_level_1-offre");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifDureeOffre(valeur) {
    var regex = /^\d+(\.\d{1,2})?$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifDateDebutOffre(valeur) {
    if (valeur.trim() !== '') {
        return true;
    } else {
        return false;
    }
}

function VerifRemunerationOffre(valeur) {
    var regex = /^\d+(\.\d{1,2})?$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifNombrePlacesOffre(valeur) {
    var regex = /^\d+$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifDescriptionOffre(valeur) {
    if (valeur.trim().length > 30) {
        return true;
    }
    else {
        return false;
    }
}

function VerifOffre() {
    var NomOffre = document.querySelector("#nom-offre");
    var ValidationNom = VerifNomOffre(NomOffre.value);
    ajouterIconeInput(NomOffre, ValidationNom);

    var SecteurOffre = document.querySelector("#secteur-activite-offre");
    var ValidationSecteur = VerifSecteurOffre(SecteurOffre.value);
    ajouterIconeInput(SecteurOffre, ValidationSecteur);

    var CompetencesOffre = document.querySelector("#competences-offre");
    var ValidationCompetences = VerifCompetencesOffre(CompetencesOffre.value);
    ajouterIconeInput(CompetencesOffre, ValidationCompetences);

    var EntrepriseOffre = document.querySelector("#entreprise-offre");
    var ValidationEntreprise = VerifEntrepriseOffre(EntrepriseOffre.value);
    ajouterIconeInput(EntrepriseOffre, ValidationEntreprise);

    var PromotionsConcernees = document.querySelector("#promotions-concernees-offre");
    var ValidationPromotions = VerifPromotionsOffre(PromotionsConcernees.value);
    ajouterIconeInput(PromotionsConcernees, ValidationPromotions);

    var AdresseOffre = document.querySelector("#adresse-offre");
    var ValidationAdresse = VerifAdresseOffre(AdresseOffre.value);
    ajouterIconeInput(AdresseOffre, ValidationAdresse);

    var NumeroAdresseOffre = document.querySelector("#street_number-offre");
    var ValidationNumero = VerifNumeroOffre(NumeroAdresseOffre.value);
    ajouterIconeInput(NumeroAdresseOffre, ValidationNumero);

    var CodePostalOffre = document.querySelector("#postal_code-offre");
    var ValidationCodePostal = VerifCodePostalOffre(CodePostalOffre.value);
    ajouterIconeInput(CodePostalOffre, ValidationCodePostal);

    var VilleTuteur = document.querySelector("#locality-offre");
    var ValidationVille = VerifVilleOffre(VilleTuteur.value);
    ajouterIconeInput(VilleTuteur, ValidationVille);

    var RegionOffre = document.querySelector("#administrative_area_level_1-offre");
    var ValidationRegion = VerifRegionOffre(RegionOffre.value);
    ajouterIconeInput(RegionOffre, ValidationRegion);

    var DureeOffre = document.querySelector("#duree-offre");
    var ValidationDuree = VerifDureeOffre(DureeOffre.value);
    ajouterIconeInput(DureeOffre, ValidationDuree);

    var DateDebutOffre = document.querySelector("#date-debut-offre");
    var ValidationDateDebut = VerifDateDebutOffre(DateDebutOffre.value);
    ajouterIconeInput(DateDebutOffre, ValidationDateDebut);

    var RemunerationOffre = document.querySelector("#remuneration-offre");
    var ValidationRemuneration = VerifRemunerationOffre(RemunerationOffre.value);
    ajouterIconeInput(RemunerationOffre, ValidationRemuneration);

    var NombrePlacesOffre = document.querySelector("#nombre-places-offre");
    var ValidationNombrePlaces = VerifNombrePlacesOffre(NombrePlacesOffre.value);
    ajouterIconeInput(NombrePlacesOffre, ValidationNombrePlaces);

    var DescriptionOffre = document.querySelector("#description-offre");
    var ValidationDescription = VerifDescriptionOffre(DescriptionOffre.value);
    ajouterIconeLabel(DescriptionOffre, ValidationDescription);

    ChangerEtatBouton();
}

/*----------Fonctions de Verification pour Entreprise----------*/

function VerifNomEntreprise(valeur) {
    if (valeur.trim() !== '') {
        return true;
    }
    else {
        return false;
    }
}

function VerifAdresseEntreprise(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    }
    else {
        return false;
    }
}

function VerifNumeroEntreprise(valeur) {
    var regex = /^\d+[a-zA-Z]?$|^$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifCodePostalEntreprise(valeur) {
    var regex = /^\d{5}$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifVilleEntreprise(valeur) {
    var regex = /^[a-zA-Z\s'éèêâçœ.-]+$/;
    if (regex.test(valeur)) {
        return true;
    } else {
        return false;
    }
}

function VerifRegionEntreprise(valeur) {
    var datalist = document.querySelector("#administrative_area_level_1-entreprise-1");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
    }
    return false;
}

function VerifSecteurActiviteEntreprise(valeur) {
    var datalist = document.querySelector("#secteur-activite-entreprise");
    var options = datalist.querySelectorAll("option");
    for (var i = 0; i < options.length; i++) {
        if (options[i].value === valeur) {
            return true;
        }
        return false;
    }
}

function VerifSiteWebEntreprise(valeur) {
    var regex = /^((https?|ftp|smtp):\/\/)?(www.)?[a-z0-9]+(\.[a-z]{2,}){1,3}(#?\/?[a-zA-Z0-9#]+)*\/?(\?[a-zA-Z0-9-_]+=[a-zA-Z0-9-%]+&?)?$/;
    if (regex.test(valeur)) {
        return true;
    }
    else {
        return false;
    }
}

function VerifDescriptionEntreprise(valeur) {
    if (valeur.trim().length > 30) {
        return true;
    }
    else {
        return false;
    }
}

function VerifCommentaireEntreprise(valeur) {
    if (valeur.trim().length > 30) {
        return true;
    }
    else {
        return false;
    }
}

function VerifEntreprise() {
    var nomEntreprise = document.querySelector("#nom-entreprise");
    var secteurActiviteEntreprise = document.querySelector("#secteur-activite-entreprise");
    var siteWebEntreprise = document.querySelector("#site-web-entreprise");
    var descriptionEntreprise = document.querySelector("#description-entreprise");
    var noteEntreprise = document.querySelector("#note-entreprise");
    var commentaireEntreprise = document.querySelector("#commentaire-entreprise");

    var btnResetNote = noteEntreprise.querySelector("#reset-note");
    var radios = document.querySelectorAll('input[name="rating"]');
    var radioChecked = false;

    btnResetNote.addEventListener("click", function () {
        radios.forEach(function (radio) {
            radio.checked = false;
            var iconeCommentaire = document.querySelector("#section-commentaire-entreprise i");
            if (iconeCommentaire) {
                iconeCommentaire.remove();
            }
        });
        radioChecked = false;
    });

    radios.forEach(function (radio) {
        if (radio.checked) {
            radioChecked = true;
        }
    });

    var ValidationNom = VerifNomEntreprise(nomEntreprise.value);
    ajouterIconeInput(nomEntreprise, ValidationNom);

    var adressesCPEntreprise = document.querySelectorAll(".adresse-cp-entreprise");
    adressesCPEntreprise.forEach(adresse => {
        var adresseInput = adresse.querySelector("div:nth-child(4) input");
        if (adresseInput) {
            ajouterIconeInput(adresseInput, VerifAdresseEntreprise(adresseInput.value));
            adresseInput.addEventListener('input', function () {
                VerifEntreprise;
            });
        }

        var numeroInput = adresse.querySelector("div:nth-child(5) input");
        if (numeroInput) {
            ajouterIconeInput(numeroInput, VerifNumeroEntreprise(numeroInput.value));
        }

        var codePostalInput = adresse.querySelector("div:nth-child(6) input");
        if (codePostalInput) {
            ajouterIconeInput(codePostalInput, VerifCodePostalEntreprise(codePostalInput.value));
        }
    });

    var villesRegionsEntreprise = document.querySelectorAll(".ville-region-entreprise");
    villesRegionsEntreprise.forEach(villeRegion => {
        var villeInput = villeRegion.querySelector("div:nth-child(3) input");
        if (villeInput) {
            ajouterIconeInput(villeInput, VerifVilleEntreprise(villeInput.value));
        }

        var regionInput = villeRegion.querySelector("div:nth-child(4) input");
        if (regionInput) {
            ajouterIconeInput(regionInput, VerifRegionEntreprise(regionInput.value));
        }
    });

    var secteurActiviteEntrepriseValide = VerifSecteurActiviteEntreprise(secteurActiviteEntreprise.value);
    ajouterIconeInput(secteurActiviteEntreprise, secteurActiviteEntrepriseValide);

    var siteWebValide = VerifSiteWebEntreprise(siteWebEntreprise.value);
    ajouterIconeInput(siteWebEntreprise, siteWebValide);

    var descriptionValide = VerifDescriptionEntreprise(descriptionEntreprise.value);
    ajouterIconeLabel(descriptionEntreprise, descriptionValide);

    if (radioChecked) {
        var commentaireValide = VerifCommentaireEntreprise(commentaireEntreprise.value);
        ajouterIconeLabel(commentaireEntreprise, commentaireValide);
    }

    ChangerEtatBouton();
}