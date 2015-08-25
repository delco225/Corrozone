<div id="add_corro" class="mon_espace">


    
    <form>
		<div id="setup" style="margin-top:5px;">
 
	<div class="btn-group">
	 
		 <button type="button" class="btn btn-success">source</button>
         <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenu1">
                                              
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          	</button>
          	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
             	<li> <a href="#"><input type="checkbox"  name="Personnelle"  />Perso</a></li>
             	<li><a href="#"> <input type="checkbox"  name="Autre" />Externe</a></li>
             
          	 </ul>
   </div>
  
  <!--selection d' UV -->
  			<div class="btn-group">
              <button type="button" class="btn btn-success">UV</button>
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                 <li> <input type="checkbox" name="mts" />   MTS  </li>
                 <li> <input type="checkbox"  name="info" /> INFO</li>
                 <li> <input type="checkbox"  name="esh"  /> ESH </li>
                 <li> <input type="checkbox"  name="res"  /> RES</li>
                 <li> <input type="checkbox"  name="elp"  /> ELP</li>
              </ul>
              
              </div>
     <!-- Numero d' UV -->
     	<div class="btn-group">
     				<button type="button" class="btn btn-success">N°</button>
                   <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                 <li> <input type="checkbox"  name="201"  />201</li>
                 <li> <input type="checkbox"  name="202" />202</li>
                 <li> <input type="checkbox"  name="203"  />203</li>
                 <li> <input type="checkbox"  name="204"  />204</li>
                 <li> <input type="checkbox"  name="205"  />205</li>
                 <li> <input type="checkbox"  name="206"  />206</li>
                 <li> <input type="checkbox"  name="301" />301</li>
                 <li> <input type="checkbox"  name="302"  />302</li>
                 <li> <input type="checkbox"  name="303"  />303</li>
                 <li> <input type="checkbox"  name="304"  />304</li>
                 <li> <input type="checkbox"  name="305"  />305</li>
                 <li> <input type="checkbox"  name="401" />401</li>
                 <li> <input type="checkbox"  name="402"  />402</li>
                 <li> <input type="checkbox"  name="403"  />403</li>
                 <li> <input type="checkbox"  name="404"  />404</li>
                 <li> <input type="checkbox"  name="405"  />405</li>
              </ul>
              
        </div>
        <div class="btn-group">  
               <button type="button" class="btn btn-success">Evaluation</button>    
               <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          	</button>
          	<ul class="dropdown-menu">
             <li> <input type="checkbox"  name="CC"  />CC</li>
             <li> <input type="checkbox"  name="TP" />TP</li>
             <li> <input type="checkbox"  name="CS" />CS</li>
             <li> <input type="checkbox"  name="Projet" />PROJET</li>
             
          </ul>
          </div>
  
  
</div> <!--END OF BTN groupe -->
        
        </div> <!--END SETUP -->

		<div id="file_upload" style="margin-top:5px;margin-bottom:5px;">
        	<input type="text" placeholder="nom du fichier" style="display:inline-block" class="form-inline"/>
            <button type="file" name="upload" style="display:inline-block" class="btn btn-default">Uploader</button>
        </div>
        
        <input type="submit" value="enregistrer"/>
	</form>
</div>