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
                    if (response == 1) {
                        //On affiche le message d'erreur et on cache le message de succès
                        $('#error').show();
                        $('#success').hide();
                    } else {
                        //On affiche le message de succès et on cache le message d'erreur
                        $('#error').hide();
                        $('#success').show();
                    }
                },
                'JSON');
    });
    //ce script 
    // declenchement au click
    $('.days').click(function () {
        //la variable timestamp récupère la valeur de l'id de l'élément sur lequel l'utilisateur a appuyer.
        // En sachant que l'id correspond au timestamp du jour
        var timestamp = $(this).attr('id');
        //efface le contenu de la class delete pour eviter le duplicata d'évènements
        $('.delete').remove();
        $.post('../controllers/calendarCtrl.php',
                {
                    timestamp: timestamp
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    events = data.events;
                    //équivalent à un foreach PHP. on réalise un "foreach" sur events et on exécute la fonction anonyme
                    //qui permet d'ajouter(append) tout ce qui va bien.
                    jQuery.each(events, function () {
                        //on rempli la modal avec le json
                        $('.modal-body').append('<ul class="list-unstyled test delete"><li>'+'Nom de l\'événement : ' + this.name + '</li><li>'+'Date de début : ' + this.startDate + '</li><li>'+'heure de début : ' + this.startTime + '</li><li>'+'date de fin : ' + this.endDate + '</li><li>'+'Description des festivités : ' + this.description + '</li><li>'+'Adresse :' + this.location + '</li><li>'+'Coût d\'entrée en euros : ' + this.contribution + '</li></ul>');
                    })
                },
                'JSON');
//on afiche la modal
        $('#myModal').modal('show');
    });
    // declenchement au click
    $('#events').change(function (event) {
        event.preventDefault();
        $.post('../controllers/memberAreaCtrl.php',
                {
                    eventUpdate: $('#events').val()
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    selectedEvent = data.events;
                    $('#nameModify').val(selectedEvent.name);
                    $('#startDateModify').val(selectedEvent.startDate);
                    $('#startTimeModify').val(selectedEvent.startTime);
                    $('#endDateModify').val(selectedEvent.endDate);
                    $('#descriptionModify').text(selectedEvent.description);
                    $('#locationModify').val(selectedEvent.location);
                    $('#contributionModify').val(selectedEvent.contribution);
                },
                'JSON');

    })
});


