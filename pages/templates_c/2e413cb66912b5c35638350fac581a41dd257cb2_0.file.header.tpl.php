<?php
/* Smarty version 4.5.1, created on 2024-03-28 10:53:12
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66053e08ee0534_78587122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e413cb66912b5c35638350fac581a41dd257cb2' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\header.tpl',
      1 => 1711619208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66053e08ee0534_78587122 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
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
</header><?php }
}
