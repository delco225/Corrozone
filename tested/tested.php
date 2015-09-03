<?php
require_once("../data_site.php");
$request="UPADTE utilisateur set status=:status where mail=:mail" ;
$mail='ahoussi.say@telecom-bretagne.eu';
$status =1;
$arra_data=array('mail'=>$mail,'status'=>$status);
Databaseupdate($request,$arra_data);
echo("ok bien connecté ");

?>