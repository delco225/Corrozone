<div class="navbar navbar-inverse row " style="width:auto;padding-left:60px;">
                  <div class="collapse navbar-collapse">
                      <div class="navbar-header">
                          <a href="/" class="navbar-brand"> Corro Zone </a>
                      </div>
                      <ul class="nav navbar-nav">
                      <li class="active" id="correction">  <a href="#"> Corrections </a>	      </li> 
                      <li id="alerte">  <a href="#" >Alertes <span class="badge"> +3 </span> </a>      </li>
                      <li id="message">  <a href="#" >Messages <span class="badge"> +5 </span> </a>       </li>
                      <li id="groupe">  <a href="#">Corro Chanel </a>      </li> 
                       
                      
                      
                        <form class="navbar-form navbar-left" role="search" action="" method="" >
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="trouver une corro" >
                        </div>
                        <button type="submit" class="btn btn-danger" >OK</button>
                        </form>   
                        
                        <ul class="nav navbar-nav" >
                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="drop_account" aria-haspopup="true" aria-expanded="true">  <?php 
                            														 	if (!isset($_SESSION['register'] )){echo( " Mon compte" ) ;}
                                                                                        else echo($_SESSION['mail']) ;
                                                                                         ?>	 
                                                                                             <span class="caret"> </span> </a> 
                                <ul class="dropdown-menu" aria-labelledby="drop_account">
                                <li>  <a href="#">   <span class="glyphicon glyphicon-arrow-down "> </span> ajout </a>      </li>
                                <li>  <a href="#">  <span class="glyphicon glyphicon-log-out"> </span>  Autres correction </a>   </li>
                                <li>  <a href="#">  <span class="glyphicon glyphicon-user"> </span> compte Correction </a>      </li>
                                <li>  <a href="#"> <span class="glyphicon glyphicon-edit">  </span> Reinitialiser pass</a>	    </li> 
                                <li>  <a href="#"> <span class="glyphicon glyphicon-off">  </span> deconnexion</a>	    </li>
                                </ul>
                        </li>
                        </ul>  
                        </ul>
                        
                  </div>
                  
                 
                        
              </div>