<?php
/* Smarty version 4.5.1, created on 2024-04-02 16:23:43
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\stats-offres.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660c14ef4786a8_01988760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfcf6d9f0ef9d3ca1557d2f612a71fb9a8ca667a' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\stats-offres.tpl',
      1 => 1712067668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_660c14ef4786a8_01988760 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Statistiques Offres</title>
    <meta name="description" content="Cette page vous permet de voir les statistiques des différentes offres de la plateforme." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/autocomplete-adresse.js"><?php echo '</script'; ?>
>
    <link rel="preconnect" href="https://maps.googleapis.com" />
    <link rel="preconnect" href="https://logo.clearbit.com" />
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/menuburger.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/stats-offres.js"><?php echo '</script'; ?>
>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/stats-offres.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Scripts -->
    <?php echo '<script'; ?>
 src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/scripts/stats-offres.js"><?php echo '</script'; ?>
>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:./header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>

        <div id="stats-offres">
            <div></div>
            <h2>Répartition par compétences</h2>
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
    <?php $_smarty_tpl->_subTemplateRender('file:./footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>

</html><?php }
}
