$(function () {    
    //L'evenement blur fonctionne au moment où le champ perd le focus
    $('#login').blur(function () {
        /**La méthode post attends plusieurs instructions : 
         * _L'url de la page PHP à executer
         * _Les paramètres à passer en POST
         * _Les actions à effectuer avec le retour du PHP
         * _Le format de donnée utilisé en retour de PHP
        **/
        $.post('controllers/indexCtrl.php',
                {
                    verifLogin: $('#login').val() //le $_POST['verifLogin'] prend le contenu de l'input
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    response = data.response;
                    //Si response est = à 1 c'est que le login existe déjà
                    if(response == 1){
                        //On affiche le message d'erreur et on cache le message de succès
                        $('#error').show();
                        $('#success').hide();
                    }else{     
                        //On affiche le message de succès et on cache le message d'erreur
                        $('#error').hide();
                        $('#success').show();
                    }
                },
                'JSON');
    });    
});


