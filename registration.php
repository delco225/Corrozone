<?php
session_start();

require_once('data_site.php'); 
$sender="address_email_de_lebergement";

//test ' existance de l utilisateur 
if (isset ($_GET['mail']) and isset ($_GET['token'])) {
	
	if( userDetect($_GET['mail'],$_GET['token'])) {
		
		// redirection vers la page de connexion  -----------------------------------
						header("location:index.php") ;
	}
	else {
		
		// effectuer une redirection vers une page d 'erreur 
		
		}
	}
	
if(isset($_POST['mail']) and isset($_POST['invite'])and isset ($_SESSION['mail'])) {
   //generation de mot de pass aleatoire 
    $pass=str_generator(10) ;
	$pass_hash=sha1($pass);
   // generation de token 
	$token=str_generator(20) ;
	$psd="Aucun" ;
	$nivauzero=0 ;
	//**************************************securite attention masquer les identifiant de connexion *****************//
	//**********************************masquer les identification de connexion****************************************
	//****************************************FAILLELLLELLLLELLLLELLLELELLELLL*****************************************
	$connection=connect("localhost","root","","bd_corro_zone") ;
	
	$req=$connection->prepare("INSERT INTO utilisateur(mail,pass,pseudo,niveau,nb_connexion,token) VALUES(:mail,:pass,:pseudo,:niveau,:nb_connexion,:token)") ;
	 $req->execute(array(
          'mail'=>$_POST['mail'],
		  'pass'=>$pass_hash,
		  'pseudo'=>$psd,
		  'niveau'=>$nivauzero,
		  'nb_connexion'=>$nivauzero,
		  'token'=>$token
	 ));
	 
	// print_r($query) ;
	
	// création de la relation d 'amitité 
	$req=$connection->prepare("INSERT INTO ami(mail_inviteur ,mail_invite ,date_invitation ) VALUES ( :mail_inviteur ,:mail_invite ,CURDATETIME())");
	$query=array(
								'mail_inviteur'=>$_SESSION['mail'],
								'mail_invite'=>$_POST['mail']
								     );
								
	
	$req->execute($query);
	$_SESSION['invite'][$_POST['mail']]="INVITE SUCCES"; 
	header('location:index.php') ;	
	
	
	// fin de l enregistrement de l 'utilisateur  //
	
	
	
	
	// envoie de mail pour de mande de verificaton de l addresse e-mail 
	
	// envoieMail($sender,$post['mail'],$token,$pass); 
	 
	
	
	}
	

?>