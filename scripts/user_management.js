/*  
*   By Ahoussi Armand SAY 
*   ahoussi.say@telecom-bretagne.eu
*   Author of corro_zone 
*/


// chat session and asynchronous action 
       // Host 
	   serverUrl = 'ws://localhost:8000'; 
      // user ID during connexion 
       var user_id = 0;
	   
	   $(document).ready(function() {
		
                // creating a new socket depending on the web browsers
                if (window.MozWebSocket) {
					// for mozilla 
                    socket = new MozWebSocket(serverUrl);
					//for other Web Browsers 
                } else if (window.WebSocket) {
                    socket = new WebSocket(serverUrl);
                }
				   // set up The binary type 
				
				socket.binaryType = 'blob';
		/*
		    OnSocket Open function  
		*/		
                socket.onopen = function(msg) {
                    /*
					 here on the user UI set connexion state 
					*/
					
					
                    register_user();
                    return true;
                };
				
		/*-
		*  When we received a message we call this function for processing the good Action   
		*/	        //On message received  
					socket.onmessage = function(msg) {
                    var response;
					// Parse the message in a Json object for easy management  
                    response = JSON.parse(msg.data);
					// CheckJson Analyse the message received and reacte instead 
                    checkJson(response);
                    return true;
                };
		/*
		*  When a connexion is closed  we performe an action on a user UI  
		*/
				
				socket.onclose = function(msg) {
                    $('#status').html('<span class="label label-danger">Disconnected</span>');
                    setTimeout(function(){
                            $('#status').html('<span class="label label-warning">Reconnecting</span>');
                        }
                    ,5000);
                    setTimeout(function(){
                            location.reload();
                        }
                    ,10000);
                    return true;
                };
				
				
				
				
				function checkJson(res) {
                    console.log(res);
					// action registred call when a user is registrated  
                    if(res.action=='registred'){
						
                    // action for a chat Text received on User UI                             
                    }else if(res.action=='chat_text'){
                        
                        }
						/* performed other actions here 
						.
						.
						.
						.
						.*/
						
				}
				
			// We use register_user() to registered a user when he start a new connexion 	
			function register_user(){
                    payload = new Object();
                    payload.action 	= 'register';
					var usermail = $document().ready(function() { $('#drop_acount').text() ;});
					payload.mail = usermail;
                    socket.send(JSON.stringify(payload));
                }
				
	  
	   });