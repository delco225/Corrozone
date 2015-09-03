
<?php

#fonction de connection à la base de donnée 

function connect($host,$user,$pass,$bd){
try
{
	$bdd = new PDO("mysql:host=".$host.";dbname=".$bd.";charset=utf8", $user , $pass);
	
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
return $bdd ;
}

# fin de la fonction de connexion à la base de donnés    ------------------------------------------------------------1 

# fonction de verification d 'existance de l 'utilisateur dans la base de donnée 

function userExist($mail,$pass){
	$find=false ;
	//**********************************masquer les identification de connexion****************************************
	//****************************************FAILLELLLELLLLELLLLELLLELELLELLL*****************************************
	$connexion=connect("localhost","root","","bd_corro_zone") ;
	$reponse = $connexion->query("SELECT mail,pass FROM utilisateur WHERE mail= '".$mail."' AND pass= '".$pass."'") ;
	if($reponse->fetch()){
		
		$find=true ;
		}
	return $find ;
	}
# fin de la fonction de verification du mot de pass de l 'utilisateur Existance  -------------------------------------2
function userDetect($mail,$token){
	$find=false ;
	//**********************************masquer les identification de connexion****************************************
	//****************************************FAILLELLLELLLLELLLLELLLELELLELLL*****************************************
	$connexion=connect("localhost","root","","bd_corro_zone") ;
	$reponse = $connexion->query("SELECT mail,pass FROM utilisateur WHERE mail= '".$mail."' AND token ='".$token."'") ;
	if($reponse->fetch()){
		
		$find=true ;
		}
	return $find ;
	}

#fonction d 'envoi de mail
 
function envoieMail($sender,$receiver,$token,$pass) {
	
$msg_html="<html><head></head><body> <b>Bienvenue nouveau corroteur</b>
 valide ta messagerie en cliquant
  <a href=\"http://localhost:8080/Boostrap/index.php?token=".$token."&mail=".$receiver."\">ici</a>
  </br>
  <strong>Mot de passe :".$pass."  
    <body> <html>";
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

// ==================================formulaire d invitation 






 
	
}



 function str_generator($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}
/**
FileSizeConvert converti ka tailles des fichier en taille lisible par l humain 
*/
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

// cette fonction sert à interroger la base de données 
//elle retourne directement le resultat en format de données itérative  

function DatabaseRequest($request){
		
		 $connexion = connect("localhost","root","","bd_corro_zone") ;
	     $reponse = $connexion->query($request) ;	
		 return $reponse ;
		 
	
	}
function Databaseupdate($Qquery,$array_data) {
	
				$connexion = connect("localhost","root","","bd_corro_zone") ;
	     		$result=$connexion->prepare($Qquery);
				$result->execute($array_data);
				return $result;
					
	
	
	}
   

?>
