<?php
function envoieMail($sender,$receiver ) {
	
$msg_html="<html><head></head><body> <b>Bienvenue nouveau corroteur</b> valide ta messagerie en cliquant <a href=\"http://facebook.fr/armand.say\">ici</a> <body> <html>";
$passage_ligne="\n";
$boundary = "-----=".md5(rand());
	
	//=====Création du header de l'e-mail
$header = "From: \"CorroZone\"<".$sender.">".$passage_ligne;
$header .= "Reply-to: \"CorroZone\"<".$sender.">".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"".$boundary."\"".$passage_ligne;

	//===========frontière du message

    //=====Définition du sujet.
$sujet = "Bienvenu nouveau corroteur";
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$msg_html.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
return mail($receiver,$sujet,$message,$header);
 
	
}
envoieMail("armand@delco.esy.es","ahoussi.say@telecom-bretagne.eu") ;
echo("mail envoyer") ; 

?>