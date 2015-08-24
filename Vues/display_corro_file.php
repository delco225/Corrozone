
<?php


require_once('C:\\wamp\\www\\corro_zone\\data_site.php');
$directory=scandir('C:\\wamp\\www\\corro_zone\\Vues\\',1);

?>

<!--File Template  afficheur de repertoire de correction -->

<div id="mon_espace">
  <h3>Mes corros <small> <a>#MTS </a> <a>#204</a></small></h3> 
 <div class="panel panel-default row " >
  <div class="panel-heading"><h3 style="font-size:16px;"><a> #Folder path </a></h3></div>
  <div class="panel-body">
     <!--Listes des corrections --> 
  <table class="table table-striped" style="width:100%">
  <?php
  $i=0;
  for($i==0;$i<count($directory)-2;$i++ )
  		{
  $taille =FileSizeConvert(filesize("Vues/".$directory[$i])) ;
  echo(" <tr>
   <td><a>".$directory[$i]."<a></td>
   <td>".$taille."</td>
       </tr>"
	   );
		
		}
  
  ?>
 
   
</table>    
     
     
  </div>
</div>


<div>
