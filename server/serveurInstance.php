<?php
include "Socket.php";
include "Server.php";
include "Connection.php";

class serveurInstance {
	//MESSAGE TYPE DEFINITION 

    private static   $CHAT_MSG 				               = "chat_message" ;
	private static   $ACK_MSG  				               = "ack_message"  ;
	private static   $UPDATE_USER_MAIL    	               = "update_user_mail" ;
	private static   $BADGE_UPDATE_MSG    			       = "badge_update_msessage";
	private static   $ALERTE_MSG          			       = "alerte_message" ;
	private static   $ACTUALITY_UPDATE_MSG   			   = "actuality_update_message" ;
	private static   $USER_STATUS             		       = "user_status" ;
	private static   $ADVICE_CORRO_ZONE_SPECIAL_MSG        = "Ad_cr_zone_sp_ms";
	
//MESSAGE ATTRIBUTE DEFINITION 

  //CHAT_MSG
    private static   $MSG_ID							   = "message_id" ;
	private static   $SENDER_MAIL						   = "sender_mail";
	private static   $RECEIVER_MAIL					       = "receiver_mail";
	private static   $DATE                                 = "date" ;
  // ACK_MSG 
    private static   $STATE	                               = "state" ;
	private static   $RECEIVED                             = "received" ;
	private static   $RECEIVED_READ                        = "received_read";
	private static   $RECEIVED_READ_TYPING                 = "received_read-typing";
     //MSG_ID DEFINE EARLY 
	 //SENDER_MAIL
	 //RECEIVER_MAIL
	 //DATE
 // UPDATE_USER_MAIL 
 
     private static   $MAIL                                = "mail";
     private static   $CONNECTION_ID                       = "connection_id" ;
	 
 //  BADGE UPDATE 
     private static   $TARGET                              = "target" ;
	  //RECEIVER MAIL DONE
	  //DATE DONE
 // ALERTE_MSG	
     private static   $FROM                                = "from" ;
	 private static   $TO                                  = "to" ; 
	   //DATE 
	 private static   $TAG                                 = "tag" ;
	 private static   $MSG                                 = "message" ;
	  
 // ACTUALITY_UPDATE_MSG 
     private static   $CASE                                = "case" ;
	   //DATE
	   //TAG 
	   //MSG 
 // USER STATUS 
 
     private static   $STAUTS                              = "status" ;
	 private static   $CONNECTED                           = "connected" ;
	 private static   $DISCONECTED                         = "disconected" ;  
	  //MAIL DONE 
	  
 //  ADVICE CORROZONE 
 
      //FROM DONE 
	  private static   $SRC_TYPE                           = "src_type" ;
	  private static   $HTML_CODE                          = "html_code" ;
	  private static   $IMAGE                              = "image" ;
	  private static   $SRC                                = "src" ;
	
	  public           $server;
	  public           $user_mail                          = array() ;
	  public           $connections                        = array() ; 
	
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
		
		$this->connections[$connection_id] = max($this->connections) + 1;
		
		$data = array();
		
		$data['user_id'] = $this->connections[$connection_id];
		
		// add the user mail to the connection 
		$var_mail = array($connection_id => $data['mail']);
		
		$this->user_mail=$this->user_mail+$var_mail ;
		
		$data['users_online'] = count($this->connections);
		$this->server->sendData($connection_id,'registred',$data);
	}
	
	
	public function action_chat_text($connection_id,$data){
		$user_id	= $this->connections[$connection_id];
		
		if(isset($data['chat_text']) && strlen($data['chat_text'])>0){
			$data['date_time'] = date('H:i:s');
			foreach($this->connections as $key=>$value){
				$this->server->sendData($key,'chat_text',$data);
			}
		}
		
	}
	
	
	
	

	}
	
// we start the serveur here  	

$app = new serveurInstance();

?>