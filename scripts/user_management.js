/*  
*   By Ahoussi Armand SAY 
*   ahoussi.say@telecom-bretagne.eu
*   Author of corro_zone 
*/
//MESSAGE TYPE DEFINITION 

    CHAT_MSG 				         = "chat_message" ;
	ACK_MSG  				         = "ack_message"  ;
	UPDATE_USER_MAIL    	         = "update_user_mail" ;
	BADGE_UPDATE_MSG    			 = "badge_update_msessage";
	ALERTE_MSG          			 = "alerte_message" ;
	ACTUALITY_UPDATE_MSG   			 = "actuality_update_message" ;
	USER_STATUS             		 = "user_status"
	ADVICE_CORRO_ZONE_SPECIAL_MSG    = "Ad_cr_zone_sp_ms";
	
//MESSAGE ATTRIBUTE DEFINITION 

  //CHAT_MSG
    MSG_ID							  = "message_id" ;
	SENDER_MAIL						  = "sender_mail";
	RECEIVER_MAIL					  = "receiver_mail";
	DATE                              = "date" ;
  // ACK_MSG 
    STATE	                          = "state" ;
	RECEIVED                          = "received" ;
	RECEIVED_READ                     = "received_read";
	RECEIVED_READ_TYPING              = "received_read-typing";
     //MSG_ID DEFINE EARLY 
	 //SENDER_MAIL
	 //RECEIVER_MAIL
	 //DATE
 // UPDATE_USER_MAIL 
 
     MAIL                            = "mail";
     CONNECTION_ID                   = "connection_id" ;
	 
 //  BADGE UPDATE 
     TARGET                          = "target" ;
	  //RECEIVER MAIL DONE
	  //DATE DONE
 // ALERTE_MSG	
      FROM                           = "from" ;
	  TO                             = "to" ; 
	   //DATE 
	  TAG                            = "tag" ;
	  MSG                            = "message" ;
	  
 // ACTUALITY_UPDATE_MSG 
      CASE                           = "case" ;
	   //DATE
	   //TAG 
	   //MSG 
 // USER STATUS 
 
      STAUTS                         = "status" ;
	  CONNECTED                      = "connected" ;
	  DISCONECTED                    = "disconected" ;  
	  //MAIL DONE 
	  
 //  ADVICE CORROZONE 
 
      //FROM DONE 
	  SRC_TYPE                       = "src_type" ;
	  HTML_CODE                      = "html_code" ;
	  IMAGE                          = "image" ;
	  SRC                            = "src" ;
	  	   
	  
 	 	   
   	
   	
	
	
	

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