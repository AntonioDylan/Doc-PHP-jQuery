
// A METTRE DANS FICHIER A PART 

//\\ ATTENTION //\\ Pour le bon fonctionnement du verificateur les input doivent avoir comme id : 'inp_' au debut 
// exemple : inp_nom , inp_prenom , inp_ville ...
// Si vous voulez les appeller autrement il faudra modifier la partie de code dans le JS après " var message = 'Vous devez renseigner obligatoirement'; "

function requiredInput(selectors){

    var lesMessages = new Array();							//ce tableau dans l'êtat est une simple base , l'utilisation peut être modulaire en fonction du besoin
    lesMessages['nom'] = "<br>- le nom";					//si autre input obligatoire ajouter ici le message correspondant 
    lesMessages['prenom'] = "<br>- le prenom ";
    lesMessages['ville'] = "<br>- la ville ";
    lesMessages['cp'] = "<br>- le code postal ";
    lesMessages['tel'] = "<br>- le N° de téléphone ";
    lesMessages['mel'] = "<br>- le mel ";
    lesMessages['adresse'] = "<br>- l'adresse ";
    lesMessages['commentaire'] = "<br>- le commentaire ";



    var message = 'Vous devez renseigner obligatoirement';
    for(var i = 0; i< selectors.length; i++){
        if($('#inp_'+selectors[i]).val() ==''){
            message += lesMessages[selectors[i]];
            $('#inp_'+selectors[i]).css('border', '1px solid #F00');
        }else{
            $('#inp_'+selectors[i]).css('border', '1px solid #dbdbdb');
        }
    }
    if (message != 'Vous devez renseigner obligatoirement') {
        /* Pour recentrer le bloc */
        $('#inputObli').html(message);
        var largeur_message = $('#inputObli').width();
        var position_gauche = ((largeur_fenetre - largeur_message) / 2 );
        $('#inputObli').css('margin-left', position_gauche + 'px');
        $('#inputObli').show();
        setTimeout(function () {
            $('#inputObli').hide();
        }, 4000);
    }else{
        return true;
    }
}


//A METTRE DANS LE MEDIA.INI
;verifInput.js
media.verifInput.scripts[]   = "%MEDIA_BASE_URL%/verifInput/verifInput.js"

//A METTRE DANS LE STYLE 

    .messageOK {
        position: absolute;
        padding: 15px 40px;
        border: 5px solid #000;
        border-radius: 5px;
        box-shadow: 3px 3px 10px #000;
        background-color: #FFF;
        color: #F60;
        font-weight: bolder;
        font-size: 1.5em;
        z-index: 10000;
        display: none;
    }
	



//A METTRE DANS LE PHTML
<div class="messageOK" id="inputObli"></div>
var selectors = ['nom','prenom','adresse','ville','cp','tel','mel','commentaire']; // input obligatoire
if(requiredInput(selectors))
{
	//... code en cas de succés 			 
}