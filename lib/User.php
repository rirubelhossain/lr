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
	public function userRegistration($data){
		$name = $data['name'] ;
		$username = $data['username'] ;
		$email = $data['email'];
		$password = md5($data['password']);
		$chk_email =  $this->emailChek($email);

		if($name  == "" or $username == "" or $email == "" or $password == "" ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>Field must not be empty 	
			</div>";
			return $msg ;
		}
		if(strlen($username) < 3){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>username is too short  	
			</div>";
			return $msg ;
		}
		elseif(preg_match('/[^a-zA-Z0-9_-]+/i',$username) ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>Username must contain alphanumerical and dashes and Underscores! 	
			</div>";
			return $msg ;
		}
		if(filter_var($email , FILTER_VALIDATE_EMAIL) === false){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>The Email address is not valid! 	
			</div>";
			return $msg ;	
		}
		if( $chk_email === true ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>The Email address is already Exist 	
			</div>";
			return $msg ;	
		}

		$sql = "INSERT INTO tbl_user(name , username , email , password) VALUES(:name , :username , :email , :password )";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();

		if($result){
			$msg = "<div class = 'alert alert-success'>
			<strong>
			Success ! 
			</strong>You have been Registerd! 	
			</div>";
			return $msg ;		
		}else{
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Sorry ! 
			</strong>There has been problem inserting  	
			</div>";
			return $msg ;	
		}
	}

	public function emailChek($email){
		$sql = "SELECT email from tbl_user WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email' , $email) ;
		$query->execute();

		if($query->rowCount() > 0 ){
			return true ;
		}else{
			return false ;
		}
	}

	public function getUserLogin($email , $password){
		$sql = "SELECT * from tbl_user where email = :email and password = :password LIMIT 1 ";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result ;
	}

	public function userLogin($data){

		$email = $data['email'];
		$password = md5($data['password']);
		$chk_email =  $this->emailChek($email);

		if( $email == "" or $password == "" ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>Field must not be empty 	
			</div>";
			return $msg ;
		}
		if(filter_var($email , FILTER_VALIDATE_EMAIL) === false){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>The Email address is not valid! 	
			</div>";
			return $msg ;	
		}
		if( $chk_email === true ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>The Email address is already Exist 	
			</div>";
			return $msg ;	
		}
		$result = $this->getUserLogin($email , $password);

		if($result){
			Session::init();
			Session::set("login" , true);
			Session::set("id" , $result->id);
			Session::set("name" , $result->name);
			Session::set("username" , $result->username);
			Session::set("loginmsg" , "<div class = 'alert alert-success'>
			<strong>
			Success ! 
			</strong>You are loggedin 	
			</div>");
			header("Location: index.php ");	

		}else{
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>Value Not Found 	
			</div>";
			return $msg ;	
		}
	}
	

}



?>