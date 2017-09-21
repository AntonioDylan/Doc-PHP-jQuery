POP UP

//////JQUERY/////

//A mettre en debut de script 
    /* INITIALISATION DES VARIABLES GLOBALES DE LA TAILLE DE L'ECRAN*/
        largeur_fenetre = $(window).width();
        hauteur_fenetre = $('.oft-global').height();

        /* INITIALISATION DES VARIABLES POUR LE POPUP*/
        var opaque = $('<div>').css('position', 'absolute')
            .css('top', '0px')
            .css('left', '0px')
            .css('width', '100%')
            .css('height', hauteur_fenetre)
            .css('z-index', '100')
            .css('background-color', '#000')
            .css('opacity', '0.6')
            .css('display', 'none')
            .addClass('opaque');
        var attente = $('<i>').addClass('attente fa fa-refresh fa-spin fa-fw margin-bottom')
            .css('font-size', '10em')
            .css('z-index', '110')
            .css('color', '#FFF')
            .css('text-shadow', '2px 2px 10px #000')
            .css('display', 'none');

        attente.appendTo('body');

        var haut = ((hauteur_fenetre - $('.attente').height()) / 2 + $(window).scrollTop());
        var gauche = ((largeur_fenetre - $('.attente').width()) / 2 + $(window).scrollLeft());

        $('.attente').css({position: 'absolute', top: haut, left: gauche});

        opaque.appendTo('body');
		
		
// EVENEMENT JQUERY A METTRE EN FIN DE SCRIPT/////

        /* LORS DE L'APPUIE DE LA ZONE GRISE DU POPUP, FERME LE POPUP*/
        $('.opaque').live('click', function () {
            $('.formulaireAjout').hide()
            $('.formulaireAjout').appendTo('body');
            $('.popup').remove();
            $('.opaque').hide();
            $('.attente').hide();
            $('#bulle').remove();
            $('#pointe_bulle').remove();
        });
        /* LORS DE L'APPUIE DU BOUTON CROIX DU POPUP, FERME LE POPUP */
        $('.close').live('click', function () {
            $('.formulaireAjout').hide();
            $('.formulaireAjout').appendTo('body');
            $('.popup').remove();
            $('.opaque').hide();
            $('.attente').hide();
            $('#bulle').remove();
            $('#pointe_bulle').remove();
        });
		
		
		
// A METTRE DANS EVENEMENT JQUERY UTILISANT LE POP UP 
  var image = '<?php echo $this->baseUrlMedia() . 'component-library/G2R0/images/btn_close.png';?>';  //image croix de fermeture du pop up

            var close = $('<img>').attr('src', image)
                .attr('name', 'Fermer')
                .css('position', 'absolute')
                .css('top', '-10px')
                .css('right', '-10px')
                .css('cursor', 'pointer')
                .css('z-index', '120')
                .addClass('close overBulle');

            var titrePopup = $('<div>').addClass('gradient')
                .css('color', '#F60')
                .css('border-radius', '5px 5px 0 0')
                .css('width', '100%')
                .css('height', '20px')
                .css('text-align', 'center')
                .css('font-weight', 'bolder')
                .html("Ajout d'une personne");				//Titre pop up

            var popup = $('<div>').addClass('popup')
                .css('background-color', '#FFF')
                .css('border-radius', '5px')
                .css('z-index', '110')
                .css('position', 'absolute')
                .css('top', '25%')
                .css('left', '25%')							//debut de placement popup par la gaucje
                .css('width', '50%')						//largeur pop up
                .css('height', 'auto')
                .css('box-shadow', '0 0 30px #000')
                .css('padding-bottom', '10px')
                .append(titrePopup);

            popup.append(close);
            $('.formulaireAjout').show();						//Element mis dans le pop up 
            popup.append($('.formulaireAjout'));				//Dans ce cas un  formulaire
            $('.opaque').show();
            popup.appendTo('body');
			
			
//// A METTRE DANS EVENEMENT JQUERY LORS DE LA FERMETURE DU POP UP 
								$('.formulaireAjout').hide()				//element à l'interieur
                                $('.formulaireAjout').appendTo('body');		//du pop up
                                $('.popup').remove();
                                $('.opaque').hide();
                                $('.attente').hide();
                                $('#bulle').remove();
                                $('#pointe_bulle').remove();