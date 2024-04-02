<?php
/* Smarty version 4.5.1, created on 2024-04-02 16:23:43
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660c14ef620b89_57596689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb31ee6ee427b40f3b21ea41ba56311bafd831c3' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\header.tpl',
      1 => 1712067810,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c14ef620b89_57596689 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <section id="header-gauche">
        <a href="index.html" id="image-accueil"><img src="/assets/images/Logo.webp" alt="logo" id="logo" /></a>
        <p id="header-p">Stage Catalyst</p>
    </section>

    <section id="header-milieu">
        <?php if ((isset($_smarty_tpl->tpl_vars['connected']->value)) && $_smarty_tpl->tpl_vars['connected']->value) {?>
            <input type="text" name="recherche" id="recherche" placeholder="Rechercher">
            <i class="fa fa-search" id="loupe" aria-hidden="true"></i>
        <?php } else { ?>
        <?php }?>
    </section>

    <section id="header-droite">
        <!-- Menu Burger -->
        <div id="menu-burger-header">
            <div class="barre-haut"></div>
            <div class="barre-milieu"></div>
            <div class="barre-bas"></div>
        </div>

        <!-- Contenu du header-droite -->
        <?php if ((isset($_smarty_tpl->tpl_vars['connected']->value)) && $_smarty_tpl->tpl_vars['connected']->value) {?>
            <a class="fa fa-heart liens-header" id="wishlist" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <?php if ((isset($_smarty_tpl->tpl_vars['type']->value)) && ($_smarty_tpl->tpl_vars['type']->value == "tuteur" || "admin")) {?>
                <a class="fa fa-building liens-header" id="entreprise" aria-hidden="true" rel="preconnect" href="test.html"></a>
                <a class="fa fa-briefcase liens-header" id="job" aria-hidden="true" rel="preconnect" href="test.html"></a>
            <?php }?>
            <a class="fa fa-cog liens-header" aria-hidden="true" rel="preconnect" href="test.html"></a>
        <?php } else { ?>
            <a class="liens-header boutons-header" rel="preconnect" href="pages/login.html" title="Connexion">Connexion</a>
        <?php }?>

    </section>
</header><?php }
}
