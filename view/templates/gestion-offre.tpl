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

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/gestion-offre.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css" />
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
            <form id="formulaire">
                <section id="nom">
                    <label for="nom-offre">Nom*</label>
                    <div>
                        <input type="text" name="nom-offre" id="nom-offre" required placeholder="Nom">
                    </div>
                </section>

                <section id="secteur">
                    <label for="secteur-activite-offre">Secteur d'activité*</label>
                    <div>
                        <input type="text" name="secteur-activite-offre" id="secteur-activite-offre" required placeholder="Secteur d'activité">
                    </div>
                </section>

                <section id="competences">
                    <label for="competence-offre">Compétences*</label>
                    <div>
                        <input type="text" name="competence-offre" id="competence-offre" required placeholder="Compétences">
                    </div>
                </section>

                <section id="entreprise-formulaire">
                    <label for="entreprise-offre">Entreprise*</label>
                    <div>
                        <input type="text" name="entreprise-offre" id="entreprise-offre" required placeholder="Entreprise">
                    </div>
                </section>

                <section id="promotions">
                    <label for="promotions-concernees-offre">Promotions concernées*</label>
                    <div>
                        <input type="text" name="promotions-concernees-offre" id="promotions-concernees-offre" required placeholder="Promotions concernées">
                    </div>
                </section>

                <section id="adresse-cp-offre">
                    <label for="adresse-offre">Adresse*</label>
                    <label for="street_number-offre">Numéro</label>
                    <label for="postal_code-offre">Code postal*</label>
                    <input type="text" name="adresse-offre" id="adresse-offre" required placeholder="Adresse">
                    <input type="text" name="street_number-offre" id="street_number-offre" required placeholder="Numéro">
                    <input type="text" name="postal_code-offre" id="postal_code-offre" required placeholder="Code Postal">
                </section>

                <section id="ville-region-offre">
                    <label for="locality-offre">Ville*</label>
                    <label for="administrative_area_level_1-offre">Region*</label>
                    <input type="text" name="locality-offre" id="locality-offre" required placeholder="Ville">
                    <input type="text" name="administrative_area_level_1-offre" id="administrative_area_level_1-offre" required placeholder="Région">
                </section>

                <section id="dates">
                    <label for="duree-offre">Durée (en semaines)*</label>
                    <label for="date-debut-offre">Date de début*</label>
                    <input type="text" name="duree-offre" id="duree-offre" required placeholder="Durée">
                    <input type="text" name="date-debut-offre" id="date-debut-offre" required placeholder="Date de début">
                </section>

                <section id="informations-supplementaires">
                    <label for="remuneration-offre">Rémunération (en €/h)*</label>
                    <label for="nb-places-offre">Nombre de places*</label>
                    <input type="text" name="remuneration-offre" id="remuneration-offre" required placeholder="Rémunération">
                    <input type="text" name="nb-places-offre" id="nb-places-offre" required placeholder="Nombre de places">
                </section>

                <section id="description">
                    <label for="description-offre">Description offre*</label>
                    <div>
                        <textarea name="description-offre" id="description-offre" required placeholder="Description de l'offre"></textarea>
                    </div>
                </section>

                <section id="bouton-class-id" class="boutons">
                    <button type="button" id="submit" value="envoyer">Créer l'entreprise</button>
                    <input type="reset" id="reset" value="Réinitialiser">
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