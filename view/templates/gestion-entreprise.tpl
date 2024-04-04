{extends file="./project.tpl"}
{block name=title}
    Gestion entreprises
{/block}
{block name=head append}
    <meta name="description" content="Page de gestion des entreprises">
    <link rel="preload" href="/assets/styles/gestion-entreprise.css" as="style">
    <link rel="stylesheet" href="/assets/styles/gestion-entreprise.css" />
    <script rel="preload" src="/assets/scripts/previsualisation-logo.js"></script>
    <script rel="preload" src="/assets/scripts/autocomplete-adresses-entreprise.js"></script>
    <script rel="preload" src="/assets/scripts/verification-formulaire.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
{/block}

{block name=main}
    <section id="section-formulaire">
        <h2>
            {if !empty($entreprise)}
                Modification
            {else}
                Création
            {/if}
            d'entreprise
    </h2>
    <form id="formulaire">
        <section id="nom">
            <label for="nom-entreprise">Nom*</label>
            <div>
                <input type="text" name="nom-entreprise" id="nom-entreprise" required placeholder="Nom" {if !empty($entreprise)} value={$entreprise->firm_name} {/if}>
            </div>
        </section>

        <datalist id="liste-regions">
            {foreach from=$regions item=$region key=$key}
            <option value={$region}>{$region}</option>
            {/foreach}
        </datalist>

        {if !empty($entreprise) && !empty($addresses)}
        {foreach from=$addresses item=$value key=$key}

        {if !$value@first}
        <hr class="adresse-separator">
        {/if}

        <section class="adresse-cp-entreprise">
            <label for="adresse-entreprise-{$value@iteration}">Adresse*</label>
            <label for="street_number-entreprise-{$value@iteration}">Numéro</label>
            <label for="postal_code-entreprise-{$value@iteration}">Code postal*</label>
            <div><input type="text" name="adresse-entreprise-{$value@iteration}" id="adresse-entreprise-{$value@iteration}" required placeholder="Adresse" value={$value->street_name}></div>
            <div><input type="text" name="street_number-entreprise-{$value@iteration}" id="street_number-entreprise-{$value@iteration}" required placeholder="Numéro" value={$value->street_number}></div>
            <div><input type="text" name="postal_code-entreprise-{$value@iteration}" id="postal_code-entreprise-{$value@iteration}" required placeholder="Code Postal" value={$value->postal_code}></div>
        </section>

        <section class="ville-region-entreprise">
            <label for="locality-entreprise-{$value@iteration}">Ville*</label>
            <label for="administrative_area_level_{$value@iteration}-entreprise-{$value@iteration}">Region*</label>
            <div><input type="text" name="locality-entreprise-{$value@iteration}" id="locality-entreprise-{$value@iteration}" required placeholder="Ville" value={$value->city_name}></div>
            <div><input type="text" name="administrative_area_level_{$value@iteration}-entreprise-{$value@iteration}" id="administrative_area_level_{$value@iteration}-entreprise-{$value@iteration}" required placeholder="Région" value={$value->region_name} list="liste-regions"></div>
        </section>
        {/foreach}
        {else}
        <section class="adresse-cp-entreprise">
            <label for="adresse-entreprise-1">Adresse*</label>
            <label for="street_number-entreprise-1">Numéro</label>
            <label for="postal_code-entreprise-1">Code postal*</label>
            <div>
                <input type="text" name="adresse-entreprise-1" id="adresse-entreprise-1" required placeholder="Adresse">
            </div>
            <div>
                <input type="text" name="street_number-entreprise-1" id="street_number-entreprise-1" placeholder="Numéro">
            </div>
            <div>
                <input type="text" name="postal_code-entreprise-1" id="postal_code-entreprise-1" required placeholder="Code Postal">
            </div>
        </section>

        <section class="ville-region-entreprise">
            <label for="locality-entreprise-1">Ville*</label>
            <label for="administrative_area_level_1-entreprise-1">Region*</label>
            <div>
                <input type="text" name="locality-entreprise-1" id="locality-entreprise-1" required placeholder="Ville">
            </div>
            <div>
                <input type="text" name="administrative_area_level_1-entreprise-1" id="administrative_area_level_1-entreprise-1" required placeholder="Région" list="liste-regions">
            </div>
        </section>
        {/if}


        <section id="ajouter-adresse">
            <button type="button" id="btn-ajouter-adresse">Ajouter une adresse</button>
            {if !empty($addresses)}
            <button type="button" id="suppr-adresse">Supprimer la dernière adresse</button>
            {/if}
        </section>

        <section id="secteur-activite">
            <label for="secteur-activite-entreprise">Secteur(s) d'activité*</label>
                <div id="div-secteur-activite-entreprise" class="secteurs-activite">
                    <button type="button" id="secteur-activite-entreprise" class="bouton-popup-checkbox">Secteur(s)d'activité</button>
                        <ul id="liste-secteurs-activite" class="popup-checkbox">
                            {foreach from=$listeSecteurs item=$secteur key=$key}
                                <li>
                                    <input 
                            {if in_array($secteur,$listeSecteursChecked,true)} checked 
                            {/if} type="checkbox" id=
                            {htmlspecialchars($secteur)}>
                                    <label for=
                            {htmlspecialchars($secteur)}>{$secteur}</label>
                                </li>
                        {/foreach}
                        </ul>
                    </div>
                </section>
                <section id="site-web">
                    <label for="site-web-entreprise">Site web (Touche "Entrer" pour visualiser le logo)*</label>
                    <div>
                        <input type="text" name="site-web-entreprise" id="site-web-entreprise" required placeholder="Site web" 
                        {if !empty($entreprise)} value={$entreprise->website} 
                        {/if}>
                    </div>
                </section>

                <section id="previsualisation-logo">
                </section>

                <section id="description-activite">
                    <label for="description-entreprise" id="label-description-entreprise">Description
                        entreprise*</label>
                    <div>
                        <textarea type="text" name="description-entreprise" id="description-entreprise" required placeholder="Description de l'entreprise (30 caractères min et 1500 caractères max)">{if !empty($entreprise)}{$entreprise->description_firm}{/if}</textarea>
                    </div>
                </section>

                <section id="note-entreprise">
                    <label for="star5" class="labels">Note</label>
                    <div id="rate-wrapper">
                        <div class="rate">
                            {section name="Stars" loop=11 step=-1 max=10}
                                {if ($smarty.section.Stars.iteration+1) is div by 2}
                                    <input type="radio" id="star{$smarty.section.Stars.index/2}" name="rating" value="{$smarty.section.Stars.index /2 }" />
                                    <label for="star{$smarty.section.Stars.index/2}" {if $smarty.section.Starts.iteration == 1}title="Awesome"{/if} ></label>
                                {else}
                                        <input type="radio" id="star{$smarty.section.Stars.index/2}" name="rating" value="{$smarty.section.Stars.index/2}"/>
                                        <label for="star{$smarty.section.Stars.index/2}" class="half"></label>
                                {/if}    
                            {/section}
                        </div>
                    </div>
                    <div id="div-reset-note">
                        <button type="button" class="reset" id="reset-note">Retirer la note</button>
                    </div>
                </section>

                <section id="section-commentaire-entreprise">
                    <label for="commentaire-entreprise" class="labels">Commentaire</label>
                    <div>
                        <textarea id="commentaire-entreprise" name="commentaire-entreprise" placeholder="Commentaire (uniquement si on met une note et doit faire 30 caractères min et 1500 max)">{if !empty($review->comment)}{$review->comment}{/if}</textarea>
                    </div>
                </section>

                <section id="status-entreprise">
                    <label for="inactivite-entreprise">Inactive</label>
                    <div>
                        <input type="checkbox" name="inactivite-entreprise" id="inactivite-entreprise" 
                        {if !empty($entreprise) && $entreprise->inactif} checked 
                        {/if}>
                    </div>
                </section>

                <section id="bouton-class-id" class="boutons">
                    <button type="submit" name="submit" value={if !empty($entreprise)}
                            "update"
                        {else}
                            "create"
                        {/if}>
                        {if !empty($entreprise)}
                            Modifier
                        {else}
                            Créer
                        {/if}
                        l'entreprise</button>
                        {if !empty($entreprise)}
                        <button type="submit" name="submit" value="delete">Supprimer l'entreprise</button>
                        {/if}
                    <button type="reset" class="reset" id="reset" value="reset">Réinitialiser</button>
                    <button type="button" onclick="javascript:window.history.back();">Annuler</button>
                </section>

                <section id="champs-obligatoires">
                    <p>* : Champs obligatoires</p>
                </section>
                <input type="hidden" name="user_id" value={$user_id}>
            </form>
        </section>
    {/block}