<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Gestion des entreprises</title>
    <meta name="description" content="Page de gestion des entreprises.">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/previsualisation-logo.js"></script>
    <script rel="preload" src="../assets/scripts/autocomplete-adresses-entreprise.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/gestion-entreprise.css" />
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
            <h2>Création d'entreprise</h2>
            <form id="formulaire">
                <section id="nom">
                    <label for="nom-entreprise">Nom*</label>
                    <div>
                        <input type="text" name="nom-entreprise" id="nom-entreprise" required placeholder="Nom">
                    </div>
                </section>

                <section class="adresse-cp-entreprise">
                    <label for="adresse-entreprise-1">Adresse*</label>
                    <label for="street_number-entreprise-1">Numéro</label>
                    <label for="postal_code-entreprise-1">Code postal*</label>
                    <input type="text" name="adresse-entreprise-1" id="adresse-entreprise-1" required placeholder="Adresse">
                    <input type="text" name="street_number-entreprise-1" id="street_number-entreprise-1" required placeholder="Numéro">
                    <input type="text" name="postal_code-entreprise-1" id="postal_code-entreprise-1" required placeholder="Code Postal">
                </section>

                <section class="ville-region-entreprise">
                    <label for="locality-entreprise-1">Ville*</label>
                    <label for="administrative_area_level_1-entreprise-1">Region*</label>
                    <input type="text" name="locality-entreprise-1" id="locality-entreprise-1" required placeholder="Ville">
                    <input type="text" name="administrative_area_level_1-entreprise-1" id="administrative_area_level_1-entreprise-1" required placeholder="Région">
                </section>

                <section id="ajouter-adresse">
                    <button type="button" id="btn-ajouter-adresse">Ajouter une adresse</button>
                </section>

                <section id="secteur-activite">
                    <label for="secteur-activite-entreprise">Secteur d'activité*</label>
                    <div>
                        <input type="text" name="secteur-activite-entreprise" id="secteur-activite-entreprise" required placeholder="Secteur d'activité">
                    </div>
                </section>

                <section id="site-web">
                    <label for="site-web-entreprise">Site web (Touche "Entrer" pour visualiser le logo)*</label>
                    <div>
                        <input type="text" name="site-web-entreprise" id="site-web-entreprise" required placeholder="Site web">
                    </div>
                </section>

                <section id="previsualisation-logo">
                </section>

                <section id="description-activite">
                    <label for="description-entreprise">Description entreprise*</label>
                    <div>
                        <textarea name="description-entreprise" id="description-entreprise" required placeholder="Description de l'entreprise"></textarea>
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