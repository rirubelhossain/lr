

 <?php
 include "inc/header.php";
 include "lib/User.php";
 Session::checkLogin();
 ?>

<?php
$user = new User();// this is object type variable 

	if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login'])){	 
		$usrLogin = $user->userLogin($_POST);	 
	}

?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>User Login</h2>
	</div>
	<div class="panel-body">
		<div style="max-width: 600px; margin: 0 auto">
<?php

	if (isset($usrLogin)) {
		echo $usrLogin;
	}
?>


		 <form action="" method="POST">
		 	<div class="form-group">
		 		<label for="email">Email Address</label>
		 		<input type="email" name="email" class="form-control" id="email"  />
		 	</div>
		 	<div class="form-group">
		 		<label for="password">Password</label>
		 		<input type="password" name="password" class="form-control" id="password" />
		 	</div>
		 	<button class="btn btn-success" type="submit" name="login">Login</button>
		 </form>
		 </div>
	</div>
</div>

<?php
include 'inc/footer.php';

?>		
		 
 

