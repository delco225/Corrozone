<div style="margin-left:50px; margin-right:50px;">
 			  <section class="page-header"> 
               			<div >
                        <h2>Corro Zone <small> don't waste time anymore !</small> </h2>
                        </div>
               </section>
                
               <section id="nav_left_zone" style=" width:390px;margin-right:auto; " >
               
               <p class="text-justify" style="font-size:18px;">
              <b> CorroZone </b> est un site conçu pour permettre aux étudiants de Télécom-Bretagne 
               de pouvoir mieux preparer les  <a >TP</a>,<a >CC </a> , <a >CS</a> et <a >Projets </a> en leur offrant un espace de partage 
               des corrections et d 'échange d 'avis     
               </p>
			   </section>
			   
			   
           <section id="formulaire" style="width:390px;height:auto;margin-right:auto; 
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
                                               
                                               
                                  <form style="margin:10px;"
								  <?php echo("action=\"".$_SERVER['PHP_SELF']."\"  method=\"get\"");?>
                                  >
                                                <div style="margin-left:100px;">
                            <img src="img/corrozonelogo.jpg" width="150px" height="150px" class="img-circle" >
                                                </div>
                                                
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
              <div class="page-header"></div>
              <div id="footer" style="bottom:5px;" class="page-footer" >
              <p> Powered by delco </p>
              </div>
			   

</div>