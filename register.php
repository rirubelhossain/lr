

<?php
include "inc/header.php";
include "lib/User.php";


?>
<?php
$user = new User();

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['register'])){	 
	$usrRegi = $user->userRegistration($_POST);	 
}
?>
		<div class="panel panel-default">
		<div class="panel-heading">
			<h2>User Register</h2>
		</div>
		<div class="panel-body">
			<div style="max-width: 600px; margin: 0 auto">
<?php

if (isset($usrRegi)) {
	echo $usrRegi;
}

?>

			 <form action="" method="POST">
			 	<div class="form-group">
			 		<label for="name">Your Name</label>
			 		<input type="text" name="name" class="form-control" id="name"   />
			 	</div>
			 	<div class="form-group">
			 		<label for="username">UserName</label>
			 		<input type="text" name="username" class="form-control" id="username"   />
			 	</div>
			 	<div class="form-group">
			 		<label for="email">Email Address</label>
			 		<input type="email" name="email" class="form-control" id="email"   />
			 	</div>
			 	<div class="form-group">
			 		<label for="password">Password</label>
			 		<input type="password" name="password" class="form-control" id="password"   />
			 	</div>
			 	<button class="btn btn-success" type="submit" name="register">Submit</button>
			 </form>
			 </div>
		</div>

	</div>


<?php
include 'inc/footer.php';

?>		
		 
 

<?php



?>