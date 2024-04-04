<?php
/* Smarty version 4.5.1, created on 2024-04-04 10:35:39
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660e665be84973_53663514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4ed4d71a0e07955b175a7876ef63778d489a0b2' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\profil.tpl',
      1 => 1712219735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e665be84973_53663514 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/menuburger.js"><?php echo '</script'; ?>
>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/profil.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                        <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['prenom']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                    </section>
                    <section>
                        <p>Nom</p>
                        <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['nom']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                    </section>
                    <section>
                        <p>Email</p>
                        <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['email']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                    </section>
                </section>
            </section>
            <section>
                <section>
                    <p>Date de naissance</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['birthday']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Age</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['age']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Adresse</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['formattedAddress']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <?php if ($_smarty_tpl->tpl_vars['type']->value == "Tuteur") {?>
                <section>
                    <p>Promotion gérées</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['promos']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Centre</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['campus']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "Etudiant") {?>
                    <section>
                    <p>Promotion</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['promo']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Centre</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['campus']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Nombre de postulation</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['candidature']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <section>
                    <p>Nombre de stages</p>
                    <p><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['stage']->value), ENT_QUOTES, 'UTF-8');?>
</p>
                </section>
                <?php }?>
            </section>
            <section id="btn-section">
                <?php if ($_smarty_tpl->tpl_vars['type']->value == "Admin") {?>
                    <button><img src=" ../assets/fontawesome/svgs/solid/user-pen.svg" alt="Icône pour le bouton 'Gérer les étudiants'">Gérer les étudiants</button>
                    <button><img src="../assets/fontawesome/svgs/solid/user-pen.svg" alt="Icône pour le bouton 'Gérer les tuteurs'">Gérer les tuteurs</button>
                    <button><img src="../assets/fontawesome/svgs/solid/arrow-right-from-bracket.svg" alt="Icône 'Se déconnecter'">Se déconnecter</button>
                <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == "Tuteur") {?>
                    <button><img src=" ../assets/fontawesome/svgs/solid/user-pen.svg" alt="Icône pour le bouton 'Gérer les étudiants'">Gérer les étudiants</button>
                    <button><img src="../assets/fontawesome/svgs/solid/arrow-right-from-bracket.svg" alt="Icône 'Se déconnecter'">Se déconnecter</button>
                <?php } else { ?>
                    <button><img src="../assets/fontawesome/svgs/solid/arrow-right-from-bracket.svg" alt="Icône 'Se déconnecter'">Se déconnecter</button>
                <?php }?>
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

</html><?php }
}
