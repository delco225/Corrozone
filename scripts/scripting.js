/*
* par Ahoussi Armand SAY 
* ahoussi.say@telecom-bretagne.eu
* Auteur de corro_zone 
*/

//getsion de la bare des menus -------------------

$(document).ready( function() {
	
$('#correction').click(
		
		function( ){ 
	
		$('div.navbar li[class="active"]').removeClass('active');
  		$('#correction').addClass('active');
	    $('#mon_espace').remove();// suppression de l ancien contenu
		var $contain=$('<div id="mon_espace"></div>');
		$contain.load('Vues/display_corro.php') ;
		$contain.prependTo('#dispaly_corro');
					}
						) ;
}) ;
$(document).ready( function() {
	
	
$('#alerte').click(
		function( ){ 
		
		$('div.navbar li[class="active"]').removeClass('active');
  		$('#alerte').addClass('active');
		$('#mon_espace').remove();// suppression de l ancien contenu 
		var $contain=$('<div id="mon_espace"></div>');
		$contain.load('Vues/alerte_corro.php') ;
		$contain.prependTo('#dispaly_corro');
	
					}
						) ; 
						
}) ;

// affichage des page de corrections 
$(document).ready(function() {
    $('.mts').click(
	function (event){
		event.preventDefault();
		$('div.navbar li[class="active"]').removeClass('active');
  		$('#correction').addClass('active');
	    $('#mon_espace').remove();// suppression de l ancien contenu
		var $contain=$('<div id="mon_espace"></div>');
		$contain.load('display_corro_file.php') ;
		$contain.prependTo('#dispaly_corro');
        		
		}
	);
});
