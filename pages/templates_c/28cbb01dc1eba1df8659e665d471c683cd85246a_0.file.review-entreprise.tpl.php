<?php
/* Smarty version 4.5.1, created on 2024-03-28 11:34:46
  from 'C:\Users\maxim\OneDrive\Documents\CESI\A2\4-Développement-WEB\Projet\Projet-WEB\view\templates\review-entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660547c60d8bf6_95641171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28cbb01dc1eba1df8659e665d471c683cd85246a' => 
    array (
      0 => 'C:\\Users\\maxim\\OneDrive\\Documents\\CESI\\A2\\4-Développement-WEB\\Projet\\Projet-WEB\\view\\templates\\review-entreprise.tpl',
      1 => 1711622084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./header.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_660547c60d8bf6_95641171 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Main -->
    <meta charset="utf-8" />
    <title>Notation Entreprise</title>
    <meta name="description" content="Cette page vous permet de noter et commenter une entreprise dans laquelle vous avez effectué un stage." />
    <link rel="icon" type="image/x-icon" href="../assets/images/Logo.ico">

    <!-- Preload -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="../assets/images/Logo.webp" as="image" type="image/webp" />
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/menuburger.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 rel="preload" src="../assets/scripts/review-entreprise.js"><?php echo '</script'; ?>
>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/review-entreprise.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:./header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>
        <form id="myForm" method="post">
            <fieldset>
                <legend>Entreprise</legend>
                <div id="entreprise-review">
                    <div id="logo-container"></div>
                    <div class="contentEntreprise">
                        <section class="headerEntreprise">
                            <h2><?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->firm_name;?>
</h2>
                            <section id="gradeWrapper">
                                <div class="rate2">

                                </div>
                            </section>
                        </section>
                        <div class="bodyEntreprise">
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png" alt="domain" />
                                <a href="<?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->website;?>
" target="_blank" id="website">Site Web</a>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png" alt="map-marker" />
                                <p><?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->street_number;?>
 <?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->street_name;?>
, <?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->postal_code;?>
 <?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->city_name;?>
</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/client-company.png" alt="client-company" />
                                <p><?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->activity_sector_name;?>
</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png" alt="groups" />
                                <p><?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->total_postulations;?>
 personne(s)</p>
                            </section>
                        </div>
                    </div>
                    <div class="description">
                        <fieldset>
                            <legend>Description</legend>
                            <p><?php echo $_smarty_tpl->tpl_vars['entreprise']->value[$_smarty_tpl->tpl_vars['nentreprise']->value]->description_firm;?>
</p>
                        </fieldset>
                    </div>
                </div>

                <label for="star5" class="labels">Note</label>
                <div id="rate-wrapper">
                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" required />
                        <label for="star5" title="Awesome"></label>
                        <input type="radio" id="star4.5" name="rating" value="4.5" />
                        <label for="star4.5" class="half"></label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4"></label>
                        <input type="radio" id="star3.5" name="rating" value="3.5" />
                        <label for="star3.5" class="half"></label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3"></label>
                        <input type="radio" id="star2.5" name="rating" value="2.5" />
                        <label for="star2.5" class="half"></label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2"></label>
                        <input type="radio" id="star1.5" name="rating" value="1.5" />
                        <label for="star1.5" class="half"></label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1"></label>
                        <input type="radio" id="star0.5" name="rating" value="0.5" />
                        <label for="star0.5" class="half"></label>
                    </div>
                </div>
                <label for="motiv" class="labels">Commentaire</label>
                <textarea id="motiv" name="motiv" required placeholder="Commentaire"></textarea>
                <div id="loginbtns">
                    <input type="submit" value="Envoyer" />
                    <input type="reset" value="Réinitialiser" />
                    <input type="button" onclick="javascript:window.history.back();" value="Annuler" />
                </div>
            </fieldset>
        </form>
    </main>
    <?php $_smarty_tpl->_subTemplateRender('file:./footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>

</html><?php }
}
