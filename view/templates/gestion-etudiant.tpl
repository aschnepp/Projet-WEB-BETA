<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <meta name="description" content="Page de gestion des étudiants.">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/autocomplete-adresse.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/gestion-etudiant.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
            <h2>Création d'étudiants</h2>
            <form id="formulaire">
                <section id="nom">
                    <label for="nom-etudiant">Nom*</label>
                    <div>
                        <input type="text" name="nom-etudiant" id="nom-etudiant" required placeholder="Nom">
                    </div>
                </section>

                <section id="prenom">
                    <label for="prenom-etudiant">Prénom*</label>
                    <div>
                        <input type="text" name="prenom-etudiant" id="prenom-etudiant" required placeholder="Prénom">
                    </div>
                </section>

                <section id="email">
                    <label for="email-etudiant">Email*</label>
                    <div>
                        <input type="email" name="competence" id="email-etudiant" required placeholder="Email">
                    </div>
                </section>

                <section id="date-naissance">
                    <label for="date-naissance-etudiant">Date de naissance*</label>
                    <div>
                        <input type="text" name="date-naissance-etudiant" id="date-naissance-etudiant" required placeholder="Date de naissance">
                    </div>
                </section>

                <section id="adresse-cp-etudiant">
                    <label for="adresse-etudiant">Adresse*</label>
                    <label for="street_number-etudiant">Numéro</label>
                    <label for="postal_code-etudiant">Code postal*</label>
                    <input type="text" name="adresse-etudiant" id="adresse-etudiant" required placeholder="Adresse">
                    <input type="text" name="street_number-etudiant" id="street_number-etudiant" required placeholder="Numéro">
                    <input type="text" name="postal_code-etudiant" id="postal_code-etudiant" required placeholder="Code Postal">
                </section>

                <section id="ville-region-etudiant">
                    <label for="locality-etudiant">Ville*</label>
                    <label for="administrative_area_level_1-etudiant">Region*</label>
                    <input type="text" name="locality-etudiant" id="locality-etudiant" required placeholder="Ville">
                    <input type="text" name="administrative_area_level_1-etudiant" id="administrative_area_level_1-etudiant" required placeholder="Région">
                </section>

                <section id="promotion">
                    <label for="promotion-etudiant">Promotion*</label>
                    <div>
                        <input type="text" name="promotion-etudiant" id="promotion-etudiant" required placeholder="Promotion">
                    </div>
                </section>

                <section id="centre">
                    <label for="centre-etudiant">Centre*</label>
                    <div>
                        <input type="text" name="centre-etudiant" id="centre-etudiant" required placeholder="Centre">
                    </div>
                </section>

                <section id="bouton-class-id" class="boutons">
                    <button type="button" id="submit" value="envoyer">Créer l'étudiant</button>
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