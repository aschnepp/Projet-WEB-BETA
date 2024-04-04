function submitForm(event) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('formulaire'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', "../model/GestionUsers.php", true);
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                if (xhr.responseText) {
                    alert('Utilisateur créé avec succès. Mot de passe : ' + xhr.responseText);
                } else {
                    alert('Requête bien effectuée sans problèmes.');
                }
                window.location.href = "../pages/accueil-login.php";
            } else {
                alert('Une ou plusieurs erreurs ont survenues, vérifier bien les champs.')
                console.log(xhr.responseText)
            }
        }
    };
}
