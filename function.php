<?php
function rechercher()
{
	
include("include/config.inc.php3");    //fichier de config
include("include/form.php3");          //formulaire de recherche
if (!isset($debut)) $debut = 0;       
if (!empty($recherche))
    {
    $recherche=strtolower($recherche);                //on passe en minuscule
    $mots = str_replace("+", " ", trim($recherche));  //on remplace les + par des espaces
    $mots = str_replace("\"", " ", $mots);               //idem pour \
    $mots = str_replace(",", " ", $mots);               //idem pour ,
    $mots = str_replace(":", " ", $mots);               //idem pour :
    $recherche=rawurlencode($recherche);              //on encode la recherche

    $tab=explode(" " , $mots);
    $nb=count($tab);

    $sql="select * from search where 1 and mot_cles like \"%$tab[0]%\" ";

    for($i=1 ; $i<$nb; $i++)
        {
        $sql.="$operateur mot_cles like \"%$tab[$i]%\" ";
        }

    $sql2=$sql;                      //requete permettant de connaitre le nombre de résultats
    $sql.=" Limit $debut,$limit ";   // requête limitante.
    
    mysql_connect($host,$user, $passwd);
    $result2 = mysql_db_query($db,$sql2);
    $result = mysql_db_query($db,$sql);

    if($result)
        {
        $nrows  = mysql_num_rows($result2);
        $flag = 1;
        if(mysql_num_rows($result)==0) echo "<center><b>Pas de Résultat</b></center><br>"; 
        else
            {

            while($row = mysql_fetch_array($result)) 
                {
                echo $row["id"]." | ".$row["titre"];
                $url = $row["url"];
                echo " | <a href=\"$url\">$url</a><br>";
                echo "Description : ".$row["description"]."<br><br>";
                }

            mysql_free_result($result);
    
        
        


/****************** Mise en place de la navigation. ************************************/
        $nombre=ceil($nrows/$limit);

        if($debut>0) 
            {
            echo "<a href=search.php3?recherche=$recherche&operateur=$operateur&debut=".($debut-$limit)."><<</a>  ";    
            }            
        
        if ($nombre>1) 
            {
            for($i=1; $i<=$nombre; $i++)
                {
                echo "<a href=search.php3?recherche=$recherche&operateur=$operateur&debut=".(($i-1)*$limit).">".$i."</a> ";
                }
            }
        if(($debut+$limit)<$nrows)
            {
            echo "<a href=search.php3?recherche=$recherche&operateur=$operateur&debut=".($debut+$limit).">>></a>";
            }
        
        echo "</CENTER>";

            }

        }
    echo "La requete SQL execute est : $sql" ;
    }

else
    {
     echo("<center><br><b>Entrer au moins un mot</b></center>");
    }
	
	
}

?>


<?php

function listfiles()
{
	$dir_nom = '.'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($dossier as $lien){
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
}

if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des fichiers/documents accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($fichier as $lien) {
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
 }

	
}
$dir_nom = '.'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers

while($element = readdir($dir)) {
	if($element != '.' && $element != '..') {
		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($dossier as $lien){
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
}

if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	echo "Liste des fichiers/documents accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($fichier as $lien) {
			echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
 }
 ?>