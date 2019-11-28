//  Mise en place d'écouteurs d'évènements sur les boutons "ajouter au panier"
if (document.querySelector(".card button") != null) {
    let listButton = document.querySelectorAll('.card button');
    listButton.forEach(button => {
        button.addEventListener('click', addPanier);
    });
}
//  Fonction ajouter au panier
function addPanier() {
    let parent = this.parentNode;
    let article = parent.firstChild.innerText;
    let panier = document.querySelector('#panier');

    console.log(panier);
    let count = panier.querySelector('input[name="count"]').value;
    let articleId = parent.querySelector('input[name="articleId"]').value;
    let articleImg = parent.querySelector('img[name="articleImg"]').value;
    if (count == null) {
        count = 0;
    }

    // Incrémentation du panier à mesure de la sélection des articles
    count++;
    panier.querySelector('input[name="count"]').value = count;
    let input = document.createElement('input');
    let img = document.createElement('img');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'article' + count);
    input.setAttribute('value', articleId);
    img.setAttribute('src', articleImg);

    // Création d'une notification de l'article ajouté (au panier)
    let articleDone = document.createElement('p');
    let articleDoneImg = document.createElement('img');
    articleDone.innerText = article + " x1";
    articleDoneImg.innerHTML = article + " ";

    // creation du bouton de suppresion relié à l'article selectionné (au panier)
    let articleDelete = document.createElement('button');
    articleDelete.innerText = article - " ";

    // Récupération et affichage des éléments du panier
    panier.appendChild(articleDone);
    panier.appendChild(input);
    panier.appendChild(articleDoneImg);
    panier.appendChild(articleDelete);
}

// Création du cookie de sauvegarde du panier
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}