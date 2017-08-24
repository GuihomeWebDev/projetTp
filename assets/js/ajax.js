$(function () {
    //L'evenement blur fonctionne au moment où le champ perd le focus
    $('#login').blur(function () {
        /**La méthode post attends plusieurs instructions : 
         * _L'url de la page PHP à executer
         * _Les paramètres à passer en POST
         * _Les actions à effectuer avec le retour du PHP
         * _Le format de donnée utilisé en retour de PHP
         **/
        $.post('controllers/userCtrl.php',
                {
                    verifLogin: $('#login').val() //le $_POST['verifLogin'] prend le contenu de l'input
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    response = data.response;
                    //Si response est = à 1 c'est que le login existe déjà
                    if (response == 0) {
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
    // script ajax pour l'injection des données évènements dans la modale 
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
                    console.log(events);
                    //équivalent à un foreach PHP. on réalise un "foreach" sur events et on exécute la fonction anonyme
                    //qui permet d'ajouter(append) tout ce qui va bien.
                    jQuery.each(events, function () {
                        //on rempli la modal avec le json
                        $('.modal-body').append('<ul class="list-unstyled modalEvent delete"><li>' + 'Auteur du post :<br><span class="nameEvent"> ' + this.login + '</span></li><br><li>' + 'Membre du :<br><span class="nameEvent"> ' + this.groupTypeName + ' : ' + this.groupName + '</span></li><br><li>' + 'Nom de l\'événement :<br><span class="nameEvent"> ' + this.eventName + '</span></li><br><li>' + 'Date de début : <br><span class="nameEvent">' + this.startDate + '</span></li><br><li>' + 'heure de début : <br><span class="nameEvent">' + this.startTime + '</span></li><br><li>' + 'date de fin : <br><span class="nameEvent">' + this.endDate + '</span></li><br><li>' + 'Description des festivités : <br><span class="nameEvent">' + this.description + '</span></li><br><li>' + 'Adresse : <br><span class="nameEvent"> ' + this.location + '</span></li><br><li>' + 'Coût d\'entrée en euros : <br><span class="nameEvent">' + this.contribution + '</span></li><br></ul>');
                    });
                },
                'JSON');

//script ajax pour le remplissage de mon formulaire modification évènement 
        $('#myModal').modal('show');
    });
    // declenchement à la selection dans le 'select'
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
    });
    //script ajax pour remplir le select groupName
    $('#groupType').change(function(){
        $.post('../controllers/addUserCtrl.php',
                {
                    selectedGroup: $('#groupType').val()
                },
                function (data) {
                    //dans data c'est le json généré dans le controlleur grâce à la méthode json_encode
                    selectedGroup = data.response;
                    $('#groupName').empty();
                    if(selectedGroup.length != 0){
                        $('#inputCreateGroup').hide();
                    }else{
                        $('#inputCreateGroup').show();
                    }
                    jQuery.each(selectedGroup,function(){
                        $('#groupName').append('<option value="' + this.id + '">' + this.name + '</option>');
                    });
                    $('#groupName').append('<option value="0">Nouveau</option>');
                },
                'JSON');
    });
});


