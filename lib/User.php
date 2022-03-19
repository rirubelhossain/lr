<?php
	include_once 'Session.php';
	include 'Database.php';

class User
{
	private $db ; /// this is a property in this property represent by db object 
	function __construct()
	{	
		$this->db = new Database() ;
	}
}

?>