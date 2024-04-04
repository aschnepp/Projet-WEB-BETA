<!DOCTYPE html>
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
    <script rel="preload" src="../assets/scripts/menuburger.js"></script>
    <script rel="preload" src="../assets/scripts/review-entreprise.js"></script>

    <!-- Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/styles/review-entreprise.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    {include file='./header.tpl'}
    <main>
        <div id="menu-burger-flou">
            <section id="menu-burger-main">
            </section>
        </div>
        <form id="myForm" method="post" action="review-entreprise.php">
            <fieldset>
                <legend>Entreprise</legend>
                <div id="entreprise-review">
                    <div id="logo-container"></div>
                    <div class="contentEntreprise">
                        <section class="headerEntreprise">
                            <h2>{$entreprise[$nentreprise]->firm_name}</h2>
                            <section id="gradeWrapper">
                                <div class="rate2">

                                </div>
                            </section>
                        </section>
                        <div class="bodyEntreprise">
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios/45/domain.png" alt="domain" />
                                <a href="{$entreprise[$nentreprise]->website}" target="_blank" id="website">Site Web</a>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/map-marker.png" alt="map-marker" />
                                <p>{$entreprise[$nentreprise]->street_number} {$entreprise[$nentreprise]->street_name}, {$entreprise[$nentreprise]->postal_code} {$entreprise[$nentreprise]->city_name}</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/45/client-company.png" alt="client-company" />
                                <p>{$entreprise[$nentreprise]->activity_sector_name}</p>
                            </section>
                            <section class="items">
                                <img width="30" height="30" src="https://img.icons8.com/ios-filled/45/groups.png" alt="groups" />
                                <p>{$entreprise[$nentreprise]->total_postulations} personne(s)</p>
                            </section>
                        </div>
                    </div>
                    <div class="description">
                        <fieldset>
                            <legend>Description</legend>
                            <p>{$entreprise[$nentreprise]->description_firm}</p>
                        </fieldset>
                    </div>
                </div>

                <label for="star5" class="labels">Note</label>
                <div id="rate-wrapper">
                    <div class="rate">
                        <input type="radio" id="star5" name="rating" value="5" required />
                        <label for="star5" title="Awesome"></label>
                        <input type="radio" id="star4.5" name="rating" value="4.5"/>
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
                <textarea id="motiv" name="motiv" required placeholder="Commentaire">{$comment}</textarea>
                <div id="loginbtns">
                    <input type="submit" value="Envoyer" />
                    <input type="reset" value="Réinitialiser" />
                    <input type="button" onclick="javascript:window.history.back();" value="Annuler" />
                </div>
            </fieldset>
        </form>
    </main>
    {include file='./footer.tpl'}
</body>

</html>