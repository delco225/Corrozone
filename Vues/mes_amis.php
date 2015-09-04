   
   <section class="col-md-3 row" id="formulaire" style="width:350px;height:900px; 
                                              position:absolute;
                                              display:inline-block;
                                              left:640px;
                                              margin-left:5px; 
                                              margin-right:5px;
                                              -webkit-border-radius: 5px;
                                              -moz-border-radius: 5px;
                                                  border-radius: 5px;
                                                  border-width:1px;
                                                  border-style: solid;
                                                  border-color:#0eb3c2;
                                                  ">
                                                  <div class="panel panel-default">
                                                  <div class="panel-heading" data-toggle="collapse" href="#mon_invite" expanded="true" aria-controls="#mon_invite">
                                                                      
                                                 <h4 class="panel-title" style="margin-left:40px;"> inviter un ami <span class="caret"></span> </h4>
                                                 </div>
                                                 
                                                 <div class="panel-body" id="mon_invite">
                                    <form style="margin: 10px ;" action="registration.php"  method="post">
                                                  <div style="margin-left: 55px ; margin-right: auto;">
                                                  <img src="img/corrozonelogo.jpg" width="150px" height="150px" />
                                                  </div>
                                                  
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">son email Telecom Bretagne </label>
                                      <input type="email" class="form-control" id="mail" name="mail" placeholder="Email">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary" name="invite" value="invite"> inviter </button>
                                  </form>
                                  </div>
                                  
                                  
                                  <div class="panel-heading">
                                   <h3 class="panel-title text-center">Mes amis</h3>
                                   </div>
                                  <div class="panel-body">
                                 <?php 
		$Query ="SELECT mail,status from utilisateur where not mail='".$_SESSION['mail']."' order by status desc" ;
								       
									   $stmt=DatabaseRequest($Query);
									   
									    
									   		while( $row=$stmt->fetch()){
												
												$Usernamenone_split=explode("@",$row['mail']);
												$user=$Usernamenone_split[0];
												$Username=explode(".",$user) ;
												
												
												
												echo("
                                                 <div id=\"freind_module\" >
                                                 <img src=\"img/icon_de_qualite/moyen.jpg\" width=\"40px\" height=\"40px\" 
                                                 style=\"float:left; 
                                                 margin-top:10px ;
                                                 margin-left:5px;
                                                 position:absolute;\">
                                                 <div id=\"user_description\" style=\"padding-left:60px;
                                                              border-width:1px;
                                                              border-style: solid;");
												if( $row['status']==1 ) {
												
                                                 echo("  border-color:#0eb3c2;\" >
                                                    <h4 class=\"username\" >".$Username[0]." </br> 
												 
													 </h4>
                                                  <small> en ligne   </small>
												  
												  
                                                 </div>
                                                 
                                                 </div>");}
												  else{echo(" 
												     border-color:#FF00FF;\" >
                                                    <h4 class=\"username\" >".$Username[0]."  </br> </h4>  <small> en ligne il ya .... </small>
                                                    
                                                
                                                 </div>
                                                 
                                                 </div>");}
											}
                                       ?>          
                                               
                                    </div>
                                  
                                   
                                  
                </section>