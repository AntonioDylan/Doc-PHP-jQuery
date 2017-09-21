public function sendMail ($file,$filename , $to , $cc, $subject){
    //

    //********************************
    //  Conception et envoi du mail
    //********************************

    $mail = new Zend_Mail('UTF-8');

    // cette méthode permet d'insérer une image dans le corps du mail
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    $mail->setType(Zend_Mime::MULTIPART_MIXED);

    // Définition de l'objet logo Orange
    $logo_orange = new Zend_Mime_Part(file_get_contents(dirname(__DIR__) . DS . 'media' . DS . 'component-library' . DS . 'G2R0' . DS . 'images' . DS . 'logo_orange.png'));
    $logo_orange->id = $mail->createMessageId();
    $logo_orange->type = 'image/png';
    $logo_orange->disposition = Zend_Mime::DISPOSITION_INLINE;
    $logo_orange->encoding = Zend_Mime::ENCODING_BASE64;
    $logo_orange->filename = 'logo_orange.png';
    $mail->addAttachment($logo_orange);

    // Définition de l'objet logo Owf
    $logo_owf = new Zend_Mime_Part(file_get_contents(dirname(__DIR__) . DS . 'media' . DS . 'component-library' . DS . 'G2R0' . DS . 'images' . DS . 'logoOwf.png'));
    $logo_owf->id = $mail->createMessageId();
    $logo_owf->type = 'image/png';
    $logo_owf->disposition = Zend_Mime::DISPOSITION_INLINE;
    $logo_owf->encoding = Zend_Mime::ENCODING_BASE64;
    $logo_owf->filename = 'logoOwf.png';
    $mail->addAttachment($logo_owf);

    // Définition de l'objet pièce jointe

    $fichier              = new Zend_Mime_Part(file_get_contents($file));
//   $fichier->type        = 'application/vnd.ms-excel';
    $fichier->type        = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
    $fichier->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
    $fichier->encoding    = Zend_Mime::ENCODING_BASE64;
    $fichier->filename    = $filename;
    $mail->addAttachment($fichier);

    // Définition du message à integrer dans le corps du mail
    $message_mail = '<div style="margin:10px;padding:10px;font-family:arial,helvetica, sans-serif;font-size:0.9em;" >';
    $message_mail .= "<table style='width:600px'><tr><td>";
    $message_mail .= "<img src='cid:" . $logo_orange->id . "' border='0' alt='Orange'> ";
    $message_mail .= "<div style='margin:10px;font-family:arial,helvetica, sans-serif;font-size:0.9em;max-width:30%;' >";

    $message_mail .= "Bonjour,

            Veuillez trouver en pièce jointe le fichier des instances.
            
                                  Merci de ne pas répondre à ce mail.
            
                                  Cordialement.
                                  
                                  ";
    $message_mail .= "<br><img src='cid:" . $logo_owf->id . "' border='0' alt='Orange'> ";
    $message_mail = nl2br($message_mail);
    $message_mail .= "</div></td></tr></table>";
    $mail->setFrom('wholesale.suivicommandes@orange.com', 'Wholesale suivi de commandes')
          // ->addTo($to)
         //  ->addCc($cc)
          // ->addBcc($this->_addressMailBcc)
         ->addTo('')                                             //Recepteur
         ->setSubject($subject)
         ->setBodyHtml($message_mail);

    // Envoi du mail
    $mail->send();

}







