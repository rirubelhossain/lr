<?php


class Database 
{	
	public $pdo ;

	function __construct()
	{
		$dsn = "mysql:dbname=db_lr;host=localhost";
		$username = "root";
		$pass = "";
		if(!isset($this->pdo)){
			try{
				$link = new PDO($dsn , $username,$pass);
				//echo "Connected successfully!";
				$this->pdo = $link ;
			}catch(PDOExecption $e){
				echo "Connection failed ".$e->getMessage();
			}
		}	
	}
	 
}


?>