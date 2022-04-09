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
		$password = $data['password'];
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
		$password = md5($data['password']);
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


	public function getLoginUser($email , $password){
		$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email' , $email);
		$query->bindValue(':password', $password);
		$query->execute() ;
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result ;
	}
	public function userLogin($data){
		$email = $data['email'] ;
		$password = md5($data['password']) ;
		$chk_email = $this->emailChek($email) ;

		if($email == "" or $password == "" ){
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
		if( $chk_email == false ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>The Email Not Exist 	
			</div>";
			return $msg ;	
		}
		$result = $this->getLoginUser($email , $password);

		if($result){
			Session::init() ;
			Session::set("login" , true ) ;
			Session::set("id" , $result->id);
			Session::set("name" , $result->name);
			Session::set("username" , $result->username);	
			Session::set("loginmsg", "<div class = 'alert alert-success'>
			<strong>
			Success ! 
			</strong>You are loggdIn!	
			</div>");
			header("Location: index.php");

		}else{
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error ! 
			</strong>Data Not Found!	
			</div>";
			return $msg ;	
		}

	}
	public function getUserData(){
		$sql = "SELECT * FROM tbl_user ORDER BY id DESC ";
		$query = $this->db->pdo->prepare($sql);
		$query->execute() ;
		$result = $query->fetchAll();
		return $result ;

	}	
	public function getUserById($id){
		$sql = "SELECT * from tbl_user where id = :id limit 1 ";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute() ;
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result ;
	}

	/// This method used for user update 
	public function updateUserData($id , $data){
		$name = $data['name'] ;
		$username = $data['username'] ;
		$email = $data['email'];

		if($name  == "" or $username == "" or $email == ""){
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
		
		$sql = "UPDATE tbl_user set 
			name     = :name ,
			username = :username ,
			email    = :email
			where id = :id 
		";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue('id', $id);
		$result = $query->execute();

		if($result){
			$msg = "<div class = 'alert alert-success'>
			<strong>
			Success ! 
			</strong>UserData Updated Successfully! 	
			</div>";
			return $msg ;		
		}else{
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Sorry ! 
			</strong>Userdata not Updated  	
			</div>";
			return $msg ;	
		}
	}
	private function CheckPassword($id , $old_pass){

		$password = md5($old_pass);
		$sql = "SELECT * FROM tbl_user WHERE id = :id AND password = :password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id' , $id);
		$query->bindValue(':password', $password);
		$query->execute() ;
		
		if($query->rowCount() > 0 ){
			return true ;
		}else{
			return false ;
		}
	}

	public function updatePassword($id , $data){
		$old_pass = $data['old_pass'];
		$new_pass = $data['password'];
		$chk_pass = $this->CheckPassword($id, $old_pass);
		if($old_pass == "" or $new_pass == ""){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Sorry! 
			</strong>Field Must Not be empty  	
			</div>";
			return $msg ;		
		}
		
		if($chk_pass == false){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error! 
			</strong>Old Password Not Exist  	
			</div>";
			return $msg ;			
		}
		if(strlen($new_pass) < 6 ){
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Error! 
			</strong>Password too short  	
			</div>";
			return $msg ;				
		}

		$password = md5($new_pass);

		$sql = "UPDATE tbl_user set 
			password     = :password
			where id = :id 
		";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':password',$password);
		$query->bindValue('id', $id);
		$result = $query->execute();
		if($result){
			$msg = "<div class = 'alert alert-success'>
			<strong>
			Success ! 
			</strong>Password Updated Successfully! 	
			</div>";
			return $msg ;		
		}else{
			$msg = "<div class = 'alert alert-danger'>
			<strong>
			Sorry ! 
			</strong>Password not Updated  	
			</div>";
			return $msg ;	
		}


	}
}



?>