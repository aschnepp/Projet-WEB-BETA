<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Stage Catalyst</title>
    <meta name="description" content="Page d'accueil sans connexion du projet WEB pour Stage Catalyst.">
    <link rel="icon" type="image/x-icon" href="assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="assets/images/Logo.webp" type="image/webp">
    <link rel="preload" as="image" href="assets/images/Image_recherche_stage.webp" type="image/webp">
    <link rel="preload" as="image" href="assets/images/Monde.webp" type="image/webp">
    <link rel="preload" as="image" href="assets/images/Entretien_image.webp" type="image/webp">
    <script rel="preload" src="assets/scripts/menuburger.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <header>
        <section id="header-gauche">
            <a href="index.html" id="image-accueil"><img src="assets/images/Logo.webp" alt="logo" id="logo" /></a>
            <p id="header-p">Stage Catalyst</p>
        </section>

        <section id="header-milieu">
        </section>

        <section id="header-droite">
            <!-- Menu Burger -->
            <div id="menu-burger-header">
                <div class="barre-haut"></div>
                <div class="barre-milieu"></div>
                <div class="barre-bas"></div>
            </div>

            <a class="liens-header boutons-header" rel="preconnect" href="pages/login.html" title="Connexion">Connexion</a>
        </section>
    </header>

    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>

        <h1>
            Découvrez nos dernières offres de stages
            disponibles dans toute la France !
        </h1>

        <section id="texte">
            <h3>
                Vous cherchez un stage mais vous n'avez pas de pistes, ou alors vous ne savez pas s'y prendre ?
            </h3>
            <h3>
                Stage Catalyst résout tous vos problèmes en s'associant avec des entreprises prêtes à accueillir des
                stagiaires.
            </h3>
            <h3>N'attendez donc pas plus longtemps et allez postuler !</h3>
        </section>

        <div id="flex-main">
            <section class="blocs">
                <img src="assets/images/Image_recherche_stage.webp" alt="Recherche de stage" id="image1">
                <h2>Plateforme de Recherche de Stage</h2>
                <p>
                    Plus de 85% des étudiants de France ont trouvé leur stage via le site Stage Catalyst.
                </p>
            </section>

            <section class="blocs">
                <img src="assets/images/Monde.webp" alt="Image du monde" id="image2">
                <h2>Opportunités Internationales</h2>
                <p>
                    90% des entreprises sur la platerforme sont des entreprises internationales prêtes à former des
                    stagiaires.
                </p>
            </section>

            <section class="blocs">
                <img src="assets/images/Entretien_image.webp" alt="Image entretien" id="image3">
                <h2>Transition vers l'Emploi</h2>
                <p>
                    Plus de 75% des stages de fin d'études effectués qui ont été trouvés via Stage Catalyst ont résulté
                    en
                    emploi.
                </p>
            </section>
        </div>


    </main>

    <footer>
        <section id="liens-footer">
            <a href="pages/cgu.html" title="CGU" class="a-footer">CGU</a>
            <a href="pages/about.html" title="A Propos" class="a-footer">A Propos</a>
            <a href="pages/contact.html" title="Contact" class="a-footer">Contact</a>
        </section>
        <p>Stage Catalyst © 2024</p>
    </footer>
</body>

</html>