<?php
	include_once 'Session.php';
	include 'Database.php';

class User
{
	private $db ; /// this is a property in this property represent by db object 
	function __construct()
	{	
		$this->db = new Database() ;
		// $this->db->test();
	}
	public function userRegistration($data){
		$name = $data['name'] ;
		$username = $data['username'] ;
		$email = $data['email'];
		$pass = $data['password'];

		echo $name ."<br>";
		echo $username."<br>";
		echo $email ."<br>";
		echo $pass."<br>";

		echo "Print from User page ";
	}

}



?>