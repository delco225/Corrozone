<?php
include "Socket.php";
include "Server.php";
include "Connection.php";

class serveurInstance {

	
	  public           $server;
	  //key value paire  keys are user connexio ID and value are user mail 
	  
	  public           $user_mail                          = array() ;
	  
	  //Connexion IDs  
	  public           $connections                        = array() ;
	  
	  //MESSAGE TYPE DEFINITION 

            public   $CHAT_MSG 				               = "chat_message" ;
	        public   $ACK_MSG  				               = "ack_message"  ;
	        public   $UPDATE_USER_MAIL    	               = "update_user_mail" ;
	        public   $BADGE_UPDATE_MSG    			       = "badge_update_msessage";
	        public   $ALERTE_MSG          			       = "alerte_message" ;
	        public   $ACTUALITY_UPDATE_MSG   			   = "actuality_update_message" ;
	        public   $USER_STATUS             		       = "user_status" ;
	        public   $ADVICE_CORRO_ZONE_SPECIAL_MSG        = "Ad_cr_zone_sp_ms";
	
//MESSAGE ATTRIBUTE DEFINITION 

  //CHAT_MSG
            public   $MSG_ID							   = "message_id" ;
	        public   $SENDER_MAIL						   = "sender_mail";
	        public   $RECEIVER_MAIL					       = "receiver_mail";
	        public   $DATE                                 = "date" ;
  // ACK_MSG 
            public   $STATE	                               = "state" ;
	        public   $RECEIVED                             = "received" ;
	        public   $RECEIVED_READ                        = "received_read";
	        public   $RECEIVED_READ_TYPING                 = "received_read-typing";
     //MSG_ID DEFINE EARLY 
	 //SENDER_MAIL
	 //RECEIVER_MAIL
	 //DATE
 // UPDATE_USER_MAIL 
 
             public   $MAIL                                = "mail";
             public   $CONNECTION_ID                       = "connection_id" ;
	 
 //  BADGE UPDATE 
             public   $TARGET                              = "target" ;
	  //RECEIVER MAIL DONE
	  //DATE DONE
 // ALERTE_MSG	
             public   $FROM                                = "from" ;
	         public   $TO                                  = "to" ; 
	   //DATE 
	         public   $TAG                                 = "tag" ;
	         public   $MSG                                 = "message" ;
	  
 // ACTUALITY_UPDATE_MSG 
            public   $CASE                                = "case" ;
	   //DATE
	   //TAG 
	   //MSG 
 // USER STATUS 
 
             public   $STAUTS                              = "status" ;
	         public   $CONNECTED                           = "connected" ;
	         public   $DISCONECTED                         = "disconected" ;  
	  //MAIL DONE 
	  
 //  ADVICE CORROZONE 
 
      //FROM DONE 
	          public   $SRC_TYPE                           = "src_type" ;
	          public   $HTML_CODE                          = "html_code" ;
	          public   $IMAGE                              = "image" ;
	          public   $SRC                                = "src" ;		 
	
/*
constructeur de notre classe*/ 	
	
public function __construct(){
 		//server parameters  
  		$this->server = new Server('0.0.0.0', 8000, false);
		//server max clients [ if over 100 drop incoming connexion ]  
		$this->server->setMaxClients(100);
		$this->server->setCheckOrigin(false);
		$this->server->setAllowedOrigin('192.168.1.153');
		$this->server->setMaxConnectionsPerIp(100);
		$this->server->setMaxRequestsPerMinute(2000);
		$this->server->setHook($this);
		$this->server->run();
		
       	
		
}
 // return the user mail when knowing user connexion ID 
public  function findUserMailByCoonectionID($connextionID) {
	
	
	    if (isset($this->user_mail["$connextionID"])) {
			     
				 return $this->user_mail["$connextionID"] ;
			    }  
	
	}
	
	
// return the user ID when we have the user mail 
	
public function findUserIdByMail($usermail) {
	
	    $key  = array_search($usermail,$this->user_mail) ;
		
		return $key ;
	}


	
	
	

   /* we call this function on  the connexion */
public function onConnect($connection_id){

		echo "\nOn connect called : $connection_id";
        return true;
		
    }
 
/* on appelle OnDisconnecte lors de la deconnexion */
public function onDisconnect($connection_id){
		echo "\nOn disconnect called : $connection_id";
		
		if(isset($this->connections[$connection_id])){
			unset($this->connections[$connection_id]);
			if (isset($this->user_mail['$connection_id'])) {
				
				 unset ($this->user_mail['$connection_id']);
				}
		}

}
 
/*OnData received est invoquer à la reception de donnée */
public function onDataReceive($connection_id,$data){

    echo "\nData received from $connection_id : $data ";
		
		$data = json_decode($data,true);
		print_r($data);
		
		 
		
		if(isset($data['action'])){
			$action = 'action_'.$data['action'];
			if( method_exists($this,$action)){
				unset($data['action']);
				$this->$action($connection_id,$data);
			}else{
				echo "\n Caution : Action handler '$action' not found!";
			}
		}


}
 

	/* Used to send data to particular connection */
	public function sendDataToConnection($connection_id,$action,$data){
		$this->server->sendData($connection_id,$action,$data);
	}
	///// ACTIONS ////
	public function action_register($connection_id,$data){
		
		
		 print_r($data) ;
		 $usermail = $data['mail'] ; 
		 $var_mail = array($connection_id => $usermail );
		 $this->user_mail=$this->user_mail+$var_mail ;
		
		$this->connections[$connection_id] = max($this->connections) + 1;
		
		$data = array();
		$data['action']     = 'registrated' ;
		$data['type']       = 'update_user_mail';
		$data ['mail']      =  $usermail ;
		$data['connection_id'] = $this->connections[$connection_id];
			
		$this->server->sendData($connection_id,'registred',$data);
	}
	
	
	
	
	public function action_chat_message($connection_id,$data){
		       
		  $mail=$data["receiver_mail"];
		  
		 
		 $receiver_connexion_id = array_search($mail,$this->user_mail);
		 
		  echo( " \n this is the receiver mail". urldecode($mail)   ) ;
          echo("and is ids "+$receiver_connexion_id ); 		
		if(isset($data["message"]) && strlen($data["message"])>0){
				 $this->server->sendData($receiver_connexion_id,$this->CHAT_MSG,$data);
			
		          	
		 }
		
	}
	
	 
	
	
	
	

	}
	
// we start the serveur here  	

$app = new serveurInstance();

?>