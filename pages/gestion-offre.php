<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Gestion des offres</title>
    <meta name="description" content="Page de gestion des offres de stage.">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/autocomplete-adresse.js"></script>
    <script rel="preload" src="../assets/scripts/verification-formulaire.js"></script>
    <script rel="preload" src="../assets/scripts/gestionOffres.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/gestion-offre.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <header>
        <section id="header-gauche">
            <a href="../index.html" id="image-accueil"><img src="../assets/images/Logo.webp" alt="logo" id="logo" /></a>
            <p id="header-p">Stage Catalyst</p>
        </section>

        <section id="header-milieu">
            <input type="text" name="recherche" id="recherche" placeholder="Rechercher">
            <i class="fa fa-search" id="loupe" aria-hidden="true"></i>
        </section>

        <section id="header-droite">
            <!-- Menu Burger -->
            <div id="menu-burger-header">
                <div class="barre-haut"></div>
                <div class="barre-milieu"></div>
                <div class="barre-bas"></div>
            </div>

            <!-- Contenu du header-droite -->
            <a class="fa fa-heart liens-header" id="wishlist" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="test.html"></a>
        </section>
    </header>


    <main>
        <div id="menu-burger-flou">
            <div id="menu-burger-main">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem sit doloribus, exercitationem
                    architecto iure esse labore maiores officiis. Deserunt sint sapiente recusandae sequi soluta,
                    sit
                    aperiam totam explicabo! Rem, tenetur.</p>
                <div>zdq</div>
                <div>zdqz</div>
            </div>
        </div>
        <section id="section-formulaire">
            <h2>Création d'offre</h2>
            <form action="/model/GestionOffres.php" method="post" id="formulaire" onsubmit="submitForm(event)">
                <section id="nom">
                    <label for="nom-offre">Nom*</label>
                    <div>
                        <input type="text" name="nom-offre" id="nom-offre" required placeholder="Nom">
                    </div>
                </section>

                <section id="secteur-activite">
                    <label for="secteur-activite-offre">Secteur(s) d'activité*</label>
                    <div id="div-secteur-activite-offre" class="secteurs-activite">
                        <button type="button" id="secteur-activite-offre" class="bouton-popup-checkbox">Secteur(s)
                            d'activité</button>
                        <ul id="liste-secteurs-activite" class="popup-checkbox">
                            <?php
                            include("{$_SERVER["DOCUMENT_ROOT"]}/model/Secteurs.php");
                            $Secteurs = new Secteurs;
                            $Secteurs->getSecteursList();
                            ?>
                        </ul>
                    </div>
                </section>

                <section id="competences">
                    <label for="competences-offres">Compétences*</label>
                    <div id="div-competences-offres">
                        <button type="button" id="competences-offres" class="bouton-popup-checkbox">Compétence(s)
                            offres</button>
                        <ul id="liste-competences" class="popup-checkbox">
                            <?php
                            include("{$_SERVER["DOCUMENT_ROOT"]}/model/Competences.php");
                            $Competences = new Competences;
                            $Competences->getCompetencesList();
                            ?>
                        </ul>
                    </div>
                </section>


                <datalist id="liste-entreprises">
                    <?php
                    include("{$_SERVER["DOCUMENT_ROOT"]}/model/Entreprises.php");
                    $Entreprises = new Entreprises;
                    $Entreprises->getEntreprisesOptions();
                    ?>
                </datalist>

                <section id="entreprise-formulaire">
                    <label for="entreprise-offre">Entreprise*</label>
                    <div>
                        <input type="text" name="entreprise-offre" id="entreprise-offre" required placeholder="Entreprise" list="liste-entreprises">
                    </div>
                </section>

                <section id="promotions">
                    <label for="promotions-concernees-offre">Promotions concernées*</label>
                    <div id="div-promotions-concernees">
                        <button type="button" id="promotions-concernees-offre" class="bouton-popup-checkbox">Promotion(s)
                            concernée(s)</button>
                        <ul id="liste-promotions" class="popup-checkbox">
                            <?php
                            include("{$_SERVER["DOCUMENT_ROOT"]}/model/Promotions.php");
                            $Promotions = new Promotions;
                            $Promotions->getPromotionsList();
                            ?>
                        </ul>
                    </div>
                </section>

                <section id="adresse-cp-offre">
                    <label for="adresse-offre">Adresse*</label>
                    <label for="street_number-offre">Numéro</label>
                    <label for="postal_code-offre">Code postal*</label>
                    <div>
                        <input type="text" name="adresse-offre" id="adresse-offre" required placeholder="Adresse">
                    </div>
                    <div>
                        <input type="text" name="street_number-offre" id="street_number-offre" required placeholder="Numéro">
                    </div>
                    <div>
                        <input type="text" name="postal_code-offre" id="postal_code-offre" required placeholder="Code Postal">
                    </div>
                </section>

                <datalist id="liste-regions">
                    <?php
                    include("{$_SERVER["DOCUMENT_ROOT"]}/model/Regions.php");
                    $Regions = new Regions;
                    $Regions->getRegionsOptions();
                    ?>
                </datalist>

                <section id="ville-region-offre">
                    <label for="locality-offre">Ville*</label>
                    <label for="administrative_area_level_1-offre">Region*</label>
                    <div>
                        <input type="text" name="locality-offre" id="locality-offre" required placeholder="Ville">
                    </div>
                    <div>
                        <input type="text" name="administrative_area_level_1-offre" id="administrative_area_level_1-offre" required placeholder="Région" list="liste-regions">
                    </div>
                </section>

                <section id="dates">
                    <label for="duree-offre">Durée (en semaines)*</label>
                    <label for="date-debut-offre">Date de début*</label>
                    <div>
                        <input type="text" name="duree-offre" id="duree-offre" required placeholder="Durée">
                    </div>
                    <div>
                        <input type="date" name="date-debut-offre" id="date-debut-offre" required placeholder="Date de début">
                    </div>
                </section>

                <section id="informations-supplementaires">
                    <label for="remuneration-offre">Rémunération (en €/h)*</label>
                    <label for="nombre-places-offre">Nombre de places*</label>
                    <div>
                        <input type="text" name="remuneration-offre" id="remuneration-offre" required placeholder="Rémunération">
                    </div>
                    <div>
                        <input type="text" name="nombre-places-offre" id="nombre-places-offre" required placeholder="Nombre de places">
                    </div>
                </section>

                <section id="description">
                    <label for="description-offre">Description offre*</label>
                    <div>
                        <textarea type="text" name="description-offre" id="description-offre" required placeholder="Description de l'offre (30 caractères min et 1500 max)"></textarea>
                    </div>
                </section>

                <section id="bouton-class-id" class="boutons">
                    <button type="submit" id="submit" value="envoyer">Créer l'entreprise</button>
                    <button type="reset" id="reset" value="reset">Réinitialiser</button>
                    <button type="button" onclick="javascript:window.history.back();">Annuler</button>
                </section>

                <section id="champs-obligatoires">
                    <p>* : Champs obligatoires</p>
                </section>
            </form>
        </section>
    </main>

    <footer>
        <section id="liens-footer">
            <a href="cgu.html" title="CGU" class="a-footer">CGU</a>
            <a href="about.html" title="A Propos" class="a-footer">A Propos</a>
            <a href="contact.html" title="Contact" class="a-footer">Contact</a>
        </section>
        <p>Stage Catalyst © 2024</p>
    </footer>
</body>

</html>