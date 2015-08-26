<!doctype html>
  <html lang="fr">
  
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
       
          <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
  </head>
  <body>
       
       
       

 			  <section class="page-header jumbotron "> 
                              
               	<div style="display:inline-block;width:720px;margin-left:20px;">
                        			<h1 style=";margin-left:20px;">Corro Zone </br> <small> don't waste time anymore !</small> </h1>
                                     <section id="nav_left_zone" style=" width:500px;" >
               
               <p class="text-justify" style="font-size:18px;margin-left:20px;">
              <b> CorroZone </b> est un site conçu pour permettre aux étudiants de Télécom-Bretagne 
               de pouvoir mieux preparer les  <a >TP</a>,<a >CC </a> , <a >CS</a> et <a >Projets </a> en leur offrant un espace de partage 
               des corrections et d 'échange d 'avis     
               </p>
			   </section>
               </div>
               
                <div style="margin-left:75px;display:inline-block;" >

			   
			   
           <section id="formulaire" style="width:390px;height:auto; 
              								-webkit-border-radius: 5px;
											-moz-border-radius: 5px;
												border-radius: 5px;
                                                border-width:1px;
 												border-style: solid;
 												border-color:#0eb3c2;
                                                margin-bottom:15px;
                                                
                                                
                                                ">
                                               <div class="page-header" >
                                               <h3 style="margin:5px;"> Connectez vous </h3>
                                               </div>
                             <!--                      <div style="margin-left:5px;">
                            <img src="img/corrozonelogo.jpg" width="150px" height="150px" class="img-circle" >
                                    </div> -->
                                               
                                               
                                  <form style="margin:10px;"
								  <?php echo("action=\"".$_SERVER['PHP_SELF']."\"  method=\"get\"");?>
                                  >
                            
                                                
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email Telecom Bretagne </label>
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Email">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe </label>
                                    <input type="password" class="form-control" id="passwd" placeholder="Password" name="pass" >
                                  </div>
                                 
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> se souvenir de moi 
                                    </label>
                                  </div>
                                  <button type="submit" class="btn btn-primary" name="submit" value="connexion"> connexion </button>
                                </form>
              </section> 
                          
               </section>
               
            
          
    <div class="container "   >
    	<div name="pub" class="row" style="margin:auto;">
  			<div class="col-sm-6 col-md-4">
    		<div class="thumbnail mts">
      		<img src="img/icon_de_qualite/mal.jpg" alt="MTS" alt="MTS" width="200px" height="200px">
      			<div class="caption">
        		<h3 class="page-header">Plus de 1500 corrections </h3>
        		<p>Téléchargeable</p>
        		
      		</div>
    	</div>
  	</div>
    	<div class="col-sm-6 col-md-4">
    		<div class="thumbnail mts ">
      		<img src="img/icon_de_qualite/mal.jpg" alt="MTS" width="200px" height="200px">
      			<div class="caption">
        		<h3 class="page-header" >Soyez Codeless  </h3>
        		<p>Code Débugué Pret à l'emploi</p>
        		
      		</div>
    	</div>
  	</div>
    
    	<div class="col-sm-6 col-md-4">
    		<div class="thumbnail mts ">
      		<img src="img/icon_de_qualite/mal.jpg" alt="MTS" width="200px" height="200px">
      			<div class="caption">
        		<h3 class="page-header" >DropBox ,SkyDrive ... </h3>
        		<p>des centaines de repertoire pour vous facilité la vie</p>
        		
      		</div>
    	</div>
  	</div>
    
    </div>
    
</div>
                
              
              
              <div class="page-header"></div>
              <div id="footer" style="bottom:5px;" class="container" >
              <p style="margin:auto;"> Powered by Ahoussi Armand and Kouamé Michel   </p>
              </div>
			   


</body>

</html>
