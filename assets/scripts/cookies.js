function submitForm(event) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('myForm'));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../assets/back/controller/cookies.php', true);
    xhr.send(formData);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                window.location.href = "../pages/accueil-login.html";
            } else {
                console.log(xhr.responseText)
            }
        }
    };
}
