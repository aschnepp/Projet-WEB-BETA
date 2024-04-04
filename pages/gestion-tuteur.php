<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Gestion des tuteurs</title>
    <meta name="description" content="Page de gestion des tuteurs.">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/autocomplete-adresse.js"></script>
    <script rel="preload" src="../assets/scripts/verification-formulaire.js"></script>
    <script rel="preload" src="../assets/scripts/gestionUsers.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/gestion-tuteur.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <h2>Création des tuteurs</h2>
            <form action="/model/GestionUsers.php" method="post" id="formulaire" onsubmit="submitForm(event)">
                <section id="nom">
                    <label for="nom-tuteur">Nom*</label>
                    <div>
                        <input type="text" name="nom-tuteur" id="nom-tuteur" required placeholder="Nom">
                    </div>
                </section>

                <section id="prenom">
                    <label for="prenom-tuteur">Prénom*</label>
                    <div>
                        <input type="text" name="prenom-tuteur" id="prenom-tuteur" required placeholder="Prénom">
                    </div>
                </section>

                <section id="email">
                    <label for="email-tuteur">Email*</label>
                    <div>
                        <input type="email" name="email-tuteur" id="email-tuteur" required placeholder="Email">
                    </div>
                </section>

                <section id="numero-telephone">
                    <label for="numero-telephone-tuteur">Numéro de téléphone*</label>
                    <div>
                        <input type="text" name="numero-telephone-tuteur" id="numero-telephone-tuteur" required placeholder="Téléphone (06....) ">
                    </div>
                </section>

                <section id="date-naissance">
                    <label for="date-naissance-tuteur">Date de naissance*</label>
                    <div>
                        <input type="date" name="date-naissance-tuteur" id="date-naissance-tuteur" required placeholder="Date de naissance (JJ/MM/AAAA)">
                    </div>
                </section>

                <section id="adresse-cp-tuteur">
                    <label for="adresse-tuteur">Adresse*</label>
                    <label for="street_number-tuteur">Numéro</label>
                    <label for="postal_code-tuteur">Code postal*</label>
                    <div>
                        <input type="text" name="adresse-tuteur" id="adresse-tuteur" required placeholder="Adresse">
                    </div>
                    <div>
                        <input type="text" name="street_number-tuteur" id="street_number-tuteur" required placeholder="Numéro">
                    </div>
                    <div>
                        <input type="text" name="postal_code-tuteur" id="postal_code-tuteur" required placeholder="Code Postal">
                    </div>
                </section>

                <datalist id="liste-regions">
                    <?php
                    include("{$_SERVER["DOCUMENT_ROOT"]}/model/Regions.php");
                    $Regions = new Regions;
                    $Regions->getRegionsOptions();
                    ?>
                </datalist>

                <section id="ville-region-tuteur">
                    <label for="locality-tuteur">Ville*</label>
                    <label for="administrative_area_level_1-tuteur">Region*</label>
                    <div>
                        <input type="text" name="locality-tuteur" id="locality-tuteur" required placeholder="Ville">
                    </div>
                    <div>
                        <input type="text" name="administrative_area_level_1-tuteur" id="administrative_area_level_1-tuteur" required placeholder="Région" list="liste-regions">
                    </div>
                </section>

                <section id="promotion">
                    <label for="promotions-tuteur">Promotion*</label>
                    <div id="div-secteur-promotions-tuteur" class="promotions-tuteur">
                        <button type="button" id="promotions-tuteur" class="bouton-popup-checkbox">Promotion(s)
                            gérée(s)</button>
                        <ul id="liste-promotions" class="popup-checkbox">
                            <?php
                            include("{$_SERVER["DOCUMENT_ROOT"]}/model/Promotions.php");
                            $Promotions = new Promotions;
                            $Promotions->getPromotionsList();
                            ?>
                        </ul>
                    </div>
                </section>

                <datalist id="liste-centres">
                    <?php
                    include("{$_SERVER["DOCUMENT_ROOT"]}/model/Centres.php");
                    $Centres = new Centres;
                    $Centres->getCentresOptions();
                    ?>
                </datalist>

                <section id="centre">
                    <label for="centre-tuteur">Centre*</label>
                    <div>
                        <input type="text" name="centre-tuteur" id="centre-tuteur" required placeholder="Centre" list="liste-centres">
                    </div>
                </section>

                <section id="bouton-class-id" class="boutons">
                    <button type="submit" id="submit" value="envoyer">Créer l'étudiant</button>
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