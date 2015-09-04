  
  <?php
  include_once("data_site.php");
  $stmt=DatabaseRequest("SELECT mail,status from utilisateur where 1 order by status desc");
									   
									    
									   		while( $row=$stmt->fetch()){
												
												$Usernamenone_split=explode("@",$row['mail']);
												$user=$Usernamenone_split[0];
												$Username=explode(".",$user) ;
												setcookie("$Username[0]",$row['mail'],time()+10800) ;
												
											}
	?>
  <!doctype html>
  <html lang="fr">
  
  <?php
  
  
 	if (! session_id()) session_start() ;
						 
						 
  if (isset ($_SESSION['connect_time']) and isset ($_SESSION['mail']) ) {
	  
	  if (($_SESSION['connect_time'] - time() )<0) {
		  				unset( $_SESSION) ;
		  				
						} 
	  		
			}
  
  if (!isset($_SESSION['mail']) and isset($_GET['mail']) ) {
	
	 if (! session_id()) {  
		session_start();}
	// verification de l utilisateur 
	if (userExist($_GET['mail'],$_GET['pass'])) {
		     // etat connecté de l utilisateur 
			// DatabaseRequest("UPADTE utilisateur set status ='1' where mail ='".$_GET['mail']."'");
	
			// enregistrement de la session 
			$_SESSION['mail']=$_GET['mail'];
	
			// limitation de son temps de connexion 
    		$_SESSION['connect_time']=time()+60;
	
			$_SESSION['register']=true;  
			setcookie("user_mail",$_GET['mail'],time()+72000) ;
								 }
		else echo ("utilisateur n existe pas "); 
  }
    
  ?>
  
  <head>
  
      <meta charset="utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Corro Zone le site du corroteur </title>
      
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      
	  
	  <script src="scripts/jquery.js"></script>
       <script src="scripts/scripting.js"></script>
      <script src="scripts/user_management.js"></script>
      
      		
        
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
  </head>
  
  <body>
 
  

  
          
           
              <!-- mise de connexion  avant l etablissement de la la session -->
              <?php if (isset($_SESSION ['mail']) and isset ($_SESSION ['register']  )  ){
					
						//-----------------------menu bar
						 require_once('Vues/user_bar.php');
					?>
                    <div id="contener" class="container row">
  					<!-- corps de notre page à traiter -->
                    
                    <?php 
						 //--zone des amis--------------------------- 
						 require_once('Vues/mes_amis.php');
					 
					 //--file d actalite-------------------------
					     require_once('Vues/file_actualite.php');
						
						
				?>
					 
					 <section  id="dispaly_corro" class="col-md-6 my_space "  >
                     
					 <?php
					 	 //-- contenu--------------------------------
                         //require_once('Vues/display_corro.php');
						require_once('Vues/display_search.php');
						//require_once('Vues/add_file.php');
						// require_once('Vues/alerte_corro.php') ;
						
					  ?>
                     </section>
  
                    
                     <?php
			  
			 
			  }
			  
			    else { header("location:connexion.php");
				
				} ?>
                
 
  
  <!-- file d actualite -->               
               
  <!--fin de file d actualite -->




                    
 
                          
                         
            
             
                 

      
  
  </div>
  
  
  
  
  
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  </body>
  
  
 
  </html>
