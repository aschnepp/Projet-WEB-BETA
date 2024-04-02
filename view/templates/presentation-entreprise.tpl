<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <meta name="description" content="Presentation entreprise.">
    <title>Presentation entreprise</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preload" as="image" href="../assets/images/Logo.webp" type="image/webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/presentation-entreprise.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/presentation-entreprise.css" />
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
            <!-- Menu de recherche se fait tout seul dans le JS-->
        </section>

        <section id="header-droite">
            <section id="menu-burger-header">
                <section class="barre-haut"></section>
                <section class="barre-milieu"></section>
                <section class="barre-bas"></section>
            </section>

            <!-- Icônes se font tout seul en JS-->
        </section>
    </header>

    <main>
        <section id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </section>


        <section class="entreprise">
            <div class="logo-container"></div>
            <section class="contentEntreprise">
                <section class="headerEntreprise">
                    <h2>CESI</h2>
                    <section class="gradeWrapper">
                        <div class="rate2">

                        </div>
                    </section>
                </section>
                <section class="bodyEntreprise">
                    <div class="items">
                        <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png" alt="domain" />
                        <a href="https://www.amazon.fr/" target="_blank" class="website">amazon.com</a>
                    </div>
                    <div class="items">
                        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png" alt="map-marker" />
                        <p>2 allée des foulons, 67380 Lingolsheim</p>
                    </div>
                    <div class="items">
                        <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/client-company.png" alt="client-company" />
                        <p>Education / Formation</p>
                    </div>
                    <div class="items">
                        <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png" alt="groups" />
                        <p>30 personnes</p>
                    </div>
                </section>

            </section>
            <section class="description">
                <fieldset>
                    <legend>Description</legend>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus,
                        neque tempora! Cum
                        quae
                        pariatur veniam enim vel amet eligendi fuga dolor suscipit ea? Fugiat unde ex expedita alias
                        minus
                        voluptatibus.
                    </p>
                </fieldset>
            </section>
        </section>

        <section id="avis">
            <h3>Avis :</h3>
            <section class="avis-utilisateur">
                <section class="gradeWrapper">
                    <div class="rate2">

                    </div>
                </section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laboriosam minus ea itaque asperiores
                    illo quaerat! Consectetur, incidunt veritatis voluptatibus voluptatem ipsum, assumenda cum quae
                    vitae quas laboriosam id explicabo?</p>
            </section>

            <section class="avis-utilisateur">
                <section class="gradeWrapper">
                    <div class="rate2">

                    </div>
                </section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laboriosam minus ea itaque asperiores
                    illo quaerat! Consectetur, incidunt veritatis voluptatibus voluptatem ipsum, assumenda cum quae
                    vitae quas laboriosam id explicabo?</p>
            </section>

            <section class="avis-utilisateur">
                <section class="gradeWrapper">
                    <div class="rate2">

                    </div>
                </section>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laboriosam minus ea itaque asperiores
                    illo quaerat! Consectetur, incidunt veritatis voluptatibus voluptatem ipsum, assumenda cum quae
                    vitae quas laboriosam id explicabo?</p>
            </section>
        </section>

        <button type="button" id="afficher-plus">+ Afficher plus</button>
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