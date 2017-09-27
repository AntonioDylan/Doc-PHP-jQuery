// A METTRE DANS FICHIER A PART //  
(function($)
{
    $.fn.popUp=function( nomPopUp, largeur, departHaut,type)
    {
        contenu = $(this).selector;
        return this.each(function()
        {
            /* INITIALISATION DES VARIABLES GLOBALES DE LA TAILLE DE L'ECRAN*/
            largeur_fenetre = $(window).width();
            hauteur_fenetre = $('.oft-global').height();
            var number_largeur = parseInt(largeur, 10);
            var position = largeur.indexOf('px');
            if(position == -1){
                position = largeur.indexOf('%');
                if(position != -1){
                    departGauche = (100 - number_largeur ) / 2;
                    departGauche+= "%";
                }else{
                    departGauche = largeur +"%";
                }
            }else{
                position = largeur.indexOf('px');
                if(position != '-1'){

                    departGauche = Math.round((((1-(number_largeur/largeur_fenetre))*100)/2));
                    departGauche+= "%";
                }
            }
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

            var croix = $('<div>').text('+')
                .css('transform','rotate(45deg)')
                .css('font-weight', 'bolder')
                .css('font-size','2em')
                .css('color','#FFF')
                .css('position', 'absolute')
                .css('top', '-5px')
                .css('left', '2px')
                .css('text-shadow','0px 1px 1px #f70718');

            var close = $('<div>').addClass('close overBulle gradientRouge')
                .css('border-radius', '10px')
                .css('border','1px solid #444')
                .css('width', '18px')
                .css('height', '18px')
                .css('padding','0')
                .css('box-shadow','0px 2px 3px #444')
                .css('text-align', 'center')
                .attr('name', 'Fermer')
                .css('position', 'absolute')
                .css('top', '-10px')
                .css('right', '-10px')
                .css('cursor', 'pointer')
                .css('z-index', '120')
                .append(croix);


            var titrePopup = $('<div>').addClass('gradient')
                .css('color', '#F60')
                .css('border-radius', '5px 5px 0 0')
                .css('width', '100%')
                .css('height', '20px')
                .css('text-align', 'center')
                .css('font-weight', 'bolder')
                .html(nomPopUp);                                //Titre pop up


            var popup = $('<div>').addClass('popup')
                .css('background-color', '#FFF')
                .css('border-radius', '5px')
                .css('z-index', '110')
                .css('position', 'fixed')
                .css('top', departHaut)
                .css('left', departGauche)               //debut de placement popup par la gauche
                .css('width', largeur)                   //largeur pop up
                .css('height', 'auto')
                .css('box-shadow', '0 0 30px #000')
                .css('padding-bottom', '10px')
                .append(titrePopup);

            popup.append(close);
            $(this).show();                                        //Element mis
            popup.append($(this));                                  //dans le pop up
            $('.opaque').show();
            popup.appendTo('body');

            /* LORS DE L'APPUIE DU BOUTON CROIX DU POPUP, FERME LE POPUP */
            $('.close').live('click', function () {
                $(contenu).hide();
                $(contenu).appendTo('body');
                $('.popup').remove();
                $('.opaque').remove();
                $('.attente').remove();
                $('#bulle').remove();
                $('#pointe_bulle').remove();
                $('#preview').hide();

            });
            /* LORS DE L'APPUIE DE LA ZONE GRISE DU POPUP, FERME LE POPUP*/
            $('.opaque').live('click', function () {
                if(type == 1){
                    $(contenu).hide();
                    $(contenu).appendTo('body');
                    $('.popup').remove();
                    $('.opaque').remove();
                    $('.attente').remove();
                    $('#bulle').remove();
                    $('#pointe_bulle').remove();
                    $('#preview').hide();
                }
            });



        });
    };
})(jQuery);


// A METTRE DANS LE STYLE CSS
    .gradientRouge {

        /* Navigateurs récents */
        background-image: -webkit-gradient(
            linear,
            left top, left bottom,
            from(#ffffff),
            to(#fb4712)
        );
        background-image: -webkit-linear-gradient(
            to bottom, #ffffff, #fb4712 80%,#f9b252
        );
        background-image: -moz-linear-gradient(
            to bottom, #ffffff, #fb4712 80%,#f9b252
        );
        background-image: -o-linear-gradient(
            to bottom, #ffffff, #fb4712 80%,#f9b252
        );
        background-image: linear-gradient(
            to bottom, #ffffff, #fb4712 80%, #f9b252
        );
    }




// A METTRE DANS FICHIER DANS LA VIEW UTILISANT LE POPUP //  


$('#test1').popUp("test", "40%","30%" ,"30%",1);  ///// param 1 = titre popup || param 2 = marginLeft | param 3 = marginTop | param4 = type
                                                                                                                                                                        ///// type = 1  = popup qui se ferme en cliquant sur le opaque
                                                                                                                                                                        ///// type = 0 = popup qui se ferme pas en cliquant sur le opaque
                        
            // A METTRE DANS FICHIER DANS MEDIA.INI //        
;popUp.js
media.popUp.scripts[]   = "%MEDIA_BASE_URL%/popUp/popUp.js"
