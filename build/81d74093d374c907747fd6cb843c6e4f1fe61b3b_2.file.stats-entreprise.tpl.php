<?php
/* Smarty version 4.5.1, created on 2024-04-02 16:25:54
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\stats-entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660c1572a271f3_26854863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81d74093d374c907747fd6cb843c6e4f1fe61b3b' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\stats-entreprise.tpl',
      1 => 1712066490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_660c1572a271f3_26854863 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
 
<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Statistiques Entreprises</title>
    <meta name="description" content="Statistiques des entreprises sur Stage Catalyst" />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preloads -->
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/stats-entreprises.js"><?php echo '</script'; ?>
>
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/menuburger.js"><?php echo '</script'; ?>
>
    <link rel="preconnect" href="https://maps.googleapis.com" />
    <link rel="preconnect" href="https://logo.clearbit.com" />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/stats-entreprise.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Scripts -->
    <?php echo '<script'; ?>
 src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../assets/scripts/stats-entreprises.js"><?php echo '</script'; ?>
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
    <?php $_smarty_tpl->_subTemplateRender('file:./footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>

</html><?php }
}
