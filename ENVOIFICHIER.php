//ENVOI DE FICHIER VERS LE SERVEUR 

//JQUERY 

						var file_data = $('#inp_img').prop('files')[0];
						var image = new FormData();
						image.append('file', file_data);
                        image.append('nom', nom);
                        image.append('prenom', prenom);
                        image.append('id', id);
                        $.ajax({
                            url: '<?= $this->baseUrl() ?>personne/upload', 
                            type: "POST",             
                            data: image, 				// Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false,       // The content type used when sending data to the server.
                            cache: false,             // To unable request pages to be cached
                            processData: false       // To send DOMDocument or non processed data file it is set to false

                            , success: function (nomImage) {
							
							
							}
							})
//Controlleur PHP

		$nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $id = $_POST['id'];
		
        if($_POST['file'] != 'undefined'){							//Non necessaire (utile pour savoir si un fichier a été choisie)		
		
            $sourcePath = $_FILES['file']['tmp_name'];       // Chemin d'origine du fichier

            $targetPath = "images/" . $nom . "_" . $prenom . "-" . date('YmdHis') . ".png"; // Chemin et nom du fichier

            move_uploaded_file($sourcePath, $targetPath);				//copie du fichier

            $nomImage = substr($targetPath, 7);						
        }else{																	
            $nomImage = "undefined.png";
        }

		
		$model_personne = new App_Model_Table_Personne();				//stockage du nom de l'image
        $model_personne->setImagePersonneById($id, $nomImage);
		echo $nomImage;  												//renvoi du nom de l'image à l'ajax 