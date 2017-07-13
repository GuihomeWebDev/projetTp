
function eventManager(event, option) {
    // Declaration des variables
    var i, tabcontent, tablinks;

    // recupérer tous les éléments avec la class  "tabcontent" et cachez-les
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // recupérer  tous les éléments avec class  "tablages" et supprimez la classe "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Affiche l'onglet actuel et ajoute une classe "active" au bouton qui a ouvert l'onglet
    document.getElementById(option).style.display = "block";
    event.currentTarget.className += " active";
} 

