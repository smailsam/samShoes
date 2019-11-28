//...........Nommer l'URL
if (document.querySelector("#userView button") != null) {
    let btnEdit = document.querySelector("#userView button");
    btnEdit.addEventListener('click', switchView);
}

function switchView() {
    let userView = document.querySelector("#userView");
    let userUpdate = document.querySelector("#userUpdate");

    userView.style.display = 'none';
    userUpdate.style.display = 'block';
}

function changeUrl(url) {
    var pathName = window.location.pathname;
    pathName = pathName.split('/');
    var folder = pathName[1];
    history.replaceState(null, null, window.location.protocol + "//" + window.location.host + '/' + folder + '/' + url);
}


//------------------JS  USER - CONFIRMATION SUPPRESSION PROFIL ------------------ 
if (document.querySelector("userUpdate button") != null) {
    let btnSuppUser = document.querySelector("#userUpdate button");
    btnSuppUser.addEventListener("click", suppUser);
}

function suppUser() {
    if (confirm("Voulez vous supprimer votre compte ?")) {
        window.location.replace("User/delete/");
    }
}

// ------------------ AFFICHAGE MODIFICATION PROFIL ------------------ //
if (document.querySelector("#userView button") != null) {
    let btnModifProfil = document.querySelector("#userView button");
    btnModifProfil.addEventListener("click", modifView);

    function modifView() {
        let userView = document.querySelector("#userView");
        let userUpdate = document.querySelector("#userUpdate");

        userView.style = "display:none";
        userUpdate.style = "display:block";
    }
}

// ------------------ VERIF FORMULAIRE INSCRIPTION ------------------ //
// Récupération des inputs dans une variable correspondante
if (document.querySelector("input[name='nom']") != null) {
    let nom = document.querySelector("input[name='nom']");
    let prenom = document.querySelector("input[name='prenom']");
    let adresse = document.querySelector("input[name='adresse']");
    let email = document.querySelector("input[name='email']");
    let pass = document.querySelector("input[name='mdp']");
    /*    let pass2 = document.querySelector("input[name='pass2']");
     */
    // Déclaration des regexp
    let regNom = /^[A-Za-zÀ-ÖØ-öø-ÿ]+$/;
    let regPrenom = /^[A-Za-zÀ-ÖØ-öø-ÿ]+$/;
    let regAdresse = /^[A-Za-z0-9À-ÖØ-öø-ÿ]+$/;
    let regEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
    let regPass = /^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[&?:\/=+§^¤£@\#!()"$]).*$/;

    // Déclaration des messages
    let messNom = "Le nom doit contenir uniquement des lettres";
    let messPrenom = "Le prenom doit contenir uniquement des lettres";
    let massageAdresse = "Une adresse correcte est requise";
    let messEmail = "l'email n'est pas valide";
    let messPass = 'Le mot de passe doit avoir : <ul><li>Au moins une majuscule</li><li>Au moins un chiffre</li><li>Au moins 6 caractères</li><li>Au moins un caractère spécial</li></ul>';

    // Ajout d'écouteur d'évènement au changement de la valeur des inputs
    // le 1er paramètre de l'écouteur d'évènement est le type d'évènement (input)
    // le 2ème paramètre de l'écouteur d'évènement est une fonction anonyme qui fait
    // appel à la fonction paramétrée verif

    nom.addEventListener("input", function () {
        verif(nom, regNom, '#nom', messNom);
    });
    prenom.addEventListener("input", function () {
        verif(prenom, regPrenom, '#prenom', messPrenom);
    });
    email.addEventListener("input", function () {
        verif(email, regEmail, '#email', messEmail);
    });
    pass.addEventListener("input", function () {
        verif(pass, regPass, '#mdp', messPass);
    });
    /*    pass2.addEventListener("input",verifPass);
     */
    /*  // Declaration de la fonction paramétrée verif
       // la fonction vérif est composée de 4 paramètres :
       - inputToTest : le nom de la variable correspondant à l'input que l'on veut tester
       - reg : le regexp correspondant à l'input que l'on veut tester
       - idInfo : le nom de l'identifiant de la div où l'ont veut afficher le message
       - message : le message */

    function verif(inputToTest, reg, idInfo, message) {
        // stockage dans la variable info de la div où l'ont veut afficher le message
        let info = document.querySelector(idInfo);
        // Si la longueur de la valeur de l'input est supérieure à 0
        if (inputToTest.value.length > 0) {
            // Si l'expression régulière est différente de la valeur de l'input
            if (!reg.test(inputToTest.value)) {
                // J'insert le message dans la div où l'ont veut afficher le message
                info.innerHTML = message;
                // J'applique une box shadow rouge à l'input
                inputToTest.style = "box-shadow: 0 0 0.3vw red";
            } else {
                // Je supprime le message
                info.innerHTML = "";
                // J'applique une box shadow vert à l'input 
                inputToTest.style = "box-shadow: 0 0 0.3vw green";
            }
        } else {
            // Je supprime le message
            info.innerHTML = "";
            // Je supprime le box shadow
            inputToTest.style = "box-shadow: none";
        }
    }
}