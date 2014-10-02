<?php

/*


EncryPaste Build 1.0 Beta 1 by ihtasham.
This is an open-source project, feel free to use and modify it
but please leave credits. Don't be a dick!

ihtasham.com
github.com/redrails


*/

include("database.class.php");
include("generate.use.php");
global $getRow;

class EncryPaste
{

protected $database;

	public function __construct(){

		$this->database = new database; 	//Initialize database class to form connection.

	}

	public function encrypt($data, $key){		//This is all the encryption bit, uses AES-256 masked with BASE64.
	
	$this->key = $key;
	$this->data = $data;
	
		return rtrim(
			base64_encode(
				mcrypt_encrypt(
					MCRYPT_RIJNDAEL_256,
					$this->key, $this->data, 
					MCRYPT_MODE_ECB, 
					mcrypt_create_iv(
						mcrypt_get_iv_size(
							MCRYPT_RIJNDAEL_256, 
							MCRYPT_MODE_ECB
						), 
					MCRYPT_RAND)
				)
			), "\0"
		);
		
	
	}
	
	function decrypt($encryptedData, $reqKey){		//This function is for the decryption. Don't need to mess with these funcs.
	
	$this->givenKey = $reqKey;
	$this->encryptedData = $encryptedData;
	
	return rtrim(
		mcrypt_decrypt(
			MCRYPT_RIJNDAEL_256, 
			$this->givenKey, 
			base64_decode($this->encryptedData), 
			MCRYPT_MODE_ECB,
			mcrypt_create_iv(
				mcrypt_get_iv_size(
					MCRYPT_RIJNDAEL_256,
					MCRYPT_MODE_ECB
				), 
				MCRYPT_RAND
			)
		), "\0"
	);
	
	}
	
	function send(){	 //This function is to run the execute function which basically does pdo::execute();
	
		return $this->database->execute();
	
	}
	
	function executeEncry($iData, $iKey){		//This is the main function which executes the insert query for the paste into the db.
	
		$this->genClass = new generate;
		
		$this->random = md5($this->genClass->RandomString(rand(0,26)));
	
		$this->database->query('INSERT INTO pastes (ID, paste, date, insertIP) VALUES (:ID, :paste, :date, :insertIP)');
	
		$this->encryptedOutput = $this->encrypt($iData, $iKey);
		$this->database->bind(":paste", $this->encryptedOutput);
		$this->database->bind(":ID", $this->random);
		$this->database->bind(":insertIP", $_SERVER['REMOTE_ADDR']);
		$this->database->bind(":date", date("l jS \of F Y h:i:s A"));
		
		$this->send();
	
		
		echo "Click here to view your paste: <a href='retrieve.php?id=". $this->random ."'>". $this->random ."</a>";
			
	}
	
	
	function viewPaste($id){		//Viewing paste function for the basic viewing, requires $id we use: $_GET['id'] from the retrieve.php.
	
		$this->database->query("SELECT ID, paste, insertIP, date FROM pastes WHERE ID = :pid");
		$this->database->bind(":pid", $id);
		
		$this->getRow = $this->database->single();
		
		
		return $this->getRow;
			
	}

}



?>
