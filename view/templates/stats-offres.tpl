<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Statistiques Offres</title>
    <meta name="description" content="Cette page vous permet de voir les statistiques des différentes offres de la plateforme." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />

    <link rel="preconnect" href="https://maps.googleapis.com" />
    <link rel="preconnect" href="https://logo.clearbit.com" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/stats-offres.js"></script>
    <script rel="preload" src="../assets/scripts/autocomplete-adresse.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/stats-offres.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Scripts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../assets/scripts/stats-offres.js"></script>
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
            <section id="menu-burger-main">
            </section>
        </div>

        <div id="stats-offres">
            <div></div>
            <h2>Répartition par secteur</h2>
            <div id="piechart" class="graphiques, piecharts"></div>
            <h2>Répartition par localité</h2>
            <div id="heatmap" class="graphiques"></div>
            <h2>Top Offres</h2>
            <section id="podium">
                <div id="first" class="places">
                    <h1>🥇</h1>
                    <p id="logo1-name"></p>
                    <div id="logo1-container"></div>
                </div>
                <div id="second" class="places">
                    <h1>🥈</h1>
                    <p id="logo2-name"></p>
                    <div id="logo2-container"></div>
                </div>
                <div id="third" class="places">
                    <h1>🥉</h1>
                    <p id="logo3-name"></p>
                    <div id="logo3-container"></div>
                </div>
            </section>
            <h2>Durée de stage</h2>
            <div id="duree-offres" class="graphiques"></div>
            <h2>Promotions</h2>
            <div id="promo-piechart" class="graphiques, piecharts"></div>
            <a href="https://clearbit.com" id="attributions">Logos provided by Clearbit</a>
        </div>
    </main>
    <footer>
        <section id="liens-footer">
            <a href="cgu.html" class="a-footer">CGU</a>
            <a href="about.html" class="a-footer">A Propos</a>
            <a href="contact.html" class="a-footer">Contact</a>
        </section>
        <p>Stage Catalyst © 2024</p>
    </footer>
</body>

</html>