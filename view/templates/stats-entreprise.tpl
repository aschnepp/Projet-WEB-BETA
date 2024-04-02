<!DOCTYPE html>
<html lang="fr">
 
<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Statistiques Entreprises</title>
    <meta name="description" content="Statistiques des entreprises sur Stage Catalyst" />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preloads -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <script rel="preload" src="../assets/scripts/stats-entreprises.js"></script>
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <link rel="preconnect" href="https://maps.googleapis.com" />
    <link rel="preconnect" href="https://logo.clearbit.com" />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/stats-entreprise.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Scripts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../assets/scripts/stats-entreprises.js"></script>
</head>

<body>
{include file='./header.tpl'}
    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>
        <div id="stats-entreprise">
            <div></div>
            <h2>Répartition par secteur</h2>
            <div id="piechart"></div>
            <h2>Répartition par localité</h2>
            <div id="regions_div"></div>
            <h2>Top entreprises</h2>
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
            <a href="https://clearbit.com" id="attributions">Logos provided by Clearbit</a>
        </div>
    </main>
    {include file='./footer.tpl'}
</body>

</html>