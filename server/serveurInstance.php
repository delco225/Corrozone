<?php
include "Socket.php";
include "Server.php";
include "Connection.php";

class serveurInstance {
	
	public $server;
	
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
		}

}
 
/*OnData received est invoquer à la reception de donnée */
public function onDataReceive($connection_id,$data){

    echo "\nData received from $connection_id :";
		
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