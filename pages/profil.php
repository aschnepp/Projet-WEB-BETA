<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>Profil</title>
    <meta name="description" content="Page de profil du site 'Stage Catalyst'">
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href=" https://fonts.googleapis.com/css?family=Montserrat" rel="preload" as="font" />
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/profil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
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
        <section class="profile">
            <h1>Profil</h1>
            <section>
                <img src="../assets/fontawesome/svgs/solid/user.svg" alt="Icône utilisateur par défaut" id="fa-user">
                <section id="info">
                    <section>
                        <p>Prénom</p>
                        <p>d,qzd,qdq</p>
                    </section>
                    <section>
                        <p>Nom</p>
                        <p>DQZDQ</p>
                    </section>
                    <section>
                        <p>Email</p>
                        <p>guigui67480@gmail.com</p>
                    </section>
                </section>
            </section>
            <section>
                <section>
                    <p>Date de naissance</p>
                    <p>11 mai 2004</p>
                </section>
                <section>
                    <p>Age</p>
                    <p>19</p>
                </section>
                <section>
                    <p>Adresse</p>
                    <p>19 rue des tests, Strasbourg, 67000</p>
                </section>
                <section>
                    <p>Promotion gérées</p>
                    <p>A1, A2, A3</p>
                </section>
                <section>
                    <p>Centre</p>
                    <p>Strasbourg</p>
                </section>
            </section>
            <section id="btn-section">
                <button><img src=" ../assets/fontawesome/svgs/solid/user-pen.svg"
                        alt="Icône pour le bouton 'Gérer les étudiants'">Gérer les étudiants</button>
                <button><img src="../assets/fontawesome/svgs/solid/user-pen.svg"
                        alt="Icône pour le bouton 'Gérer les tuteurs'">Gérer les tuteurs</button>
                <button><img src="../assets/fontawesome/svgs/solid/arrow-right-from-bracket.svg"
                        alt="Icône 'Se déconnecter'">Se déconnecter</button>
            </section>
        </section>
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