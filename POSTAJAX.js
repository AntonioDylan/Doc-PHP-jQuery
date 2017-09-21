//FORMAT POST AVEC jQUERY/AJAX

//exemple 1
var id = this.id;
id = id.substring(2);

//exemple 2 
var id = $('#inp_id').val();

$.ajax({
                type: "POST",
                url: '<?= $this->baseUrl() ?>personne/getpersonne',    // personne = controlleur , getpersonne = Action
                data: {
                    id: id
                }, success: function (retour) {    //retour = echo des fonctions dans le controlleur et le model
				
				
				}
			})
			
