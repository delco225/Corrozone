<?php 
// Initialisation de la variable de message. 
$message = ""; 

// Traitement du formulaire si il y a un fichier envoyé sur le serveur. 
if (isset($_POST["valid"]))
{ 
	// Récupére les informations sur le fichier. 
	$oFileInfos = $_FILES["fichier"]; 
 
	// nom du fichier. 
	$nom = $oFileInfos["name"]; 

	// le type MIME.  
	$type_mime = $oFileInfos["type"]; 

	// la taille. 
	$taille = $oFileInfos["size"]; 

	// emplacement du fichier temporaire. 
	$fichier_temporaire = $oFileInfos["tmp_name"]; 

	// le code d’erreur. 
	$code_erreur = $oFileInfos["error"]; 

	switch ($code_erreur)
	{ 
		case UPLOAD_ERR_OK : 
			// Fichier bien reçu. 
			// Détermine sa destination finale. 
			$destination = "tutoriels/$nom"; 

			// Copie le fichier temporaire 
			if (copy($fichier_temporaire,$destination))
			{ 
				// Copie OK
				$message  = "Transfert termine - Fichier = $nom - "; 
				$message .= "Taille = $taille octets - "; 
				$message .= "Type MIME = $type_mime."; 
			}
			else
			{ 
				// Problème de copie => message d’erreur. 
				$message = "Probleme de copie sur le serveur."; 
			} 
			break; 

		case UPLOAD_ERR_NO_FILE : 
			// Pas de fichier saisi. 
			$message = "Pas de fichier saisi."; 
			break; 

		case UPLOAD_ERR_INI_SIZE : 
			// Taille fichier > upload_max_filesize. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= " (taille > upload_max_filesize)"; 
			break; 

		case UPLOAD_ERR_FORM_SIZE : 
			// Taille fichier > MAX_FILE_SIZE. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(taille > MAX_FILE_SIZE)"; 
			break; 

		case UPLOAD_ERR_PARTIAL : 
			// Fichier partiellement transféré. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(problème lors du tranfert)"; 
			break; 

		case UPLOAD_ERR_NO_TMP_DIR : 
			// Pas de répertoire temporaire. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(pas de répertoire temporaire)"; 
			break; 

		case UPLOAD_ERR_CANT_WRITE : 
			// Erreur lors de l’écriture du fichier sur disque. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(erreur lors de l'écriture du fichier sur le serveur)"; 
			break; 

		case UPLOAD_ERR_EXTENSION : 
			// Transfert stoppé par l’extension. 
			$message  = "Fichier ".$nom." non transfere "; 
			$message .= "(transfert stoppé par l'extension)"; 
			break; 

		default : 
			// Erreur non prévue ! 
			$message  = "Fichier non transfere "; 
			$message .= "(erreur inconnue : ".$code_erreur.")"; 
	}

} // fin du isset POST


?>

<html xmlns="http://www.w3.org/1999/xhtml"> 
<head><title>Upload</title></head> 
	<body> 
		<form action="file_upload_php.php" method="post" enctype="multipart/form-data"> 
			<div> 
				Fichier :  
				<input size="100" type="file" name="fichier" value="" /> 
				<input type="submit" name="valid" value="Envoyer le fichier" /><br /> 
				<?php echo $message; ?> 
			</div> 
		</form> 
	</body> 
</html>