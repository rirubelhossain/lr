

 <?php
 include "lib/User.php";
 include "inc/header.php";
 Session::checkSession();
 ?>

<?php
if(isset($_GET['id'])){
	$userid = (int)$_GET['id'] ;
	$sesid =Session::get("id");
	 	if($userid != $sesid){
	 		header("Location: index.php");
	 	}
}
$user = new User() ;/// this is a object type variable this object can be access user class and collected some data
//using method creation 

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['updatepass'])){	 
	$updatepass = $user->updatePassword($userid , $_POST);	 
}


?>

	<div class="panel panel-default">
	<div class="panel-heading">
	<h2>Change Password<span class="pull-right"><a class="btn btn-primary" href="profile.php?id=<?php echo $userid;?>">Back</a></span></h2>
	</div>

	<div class="panel-body">
	<div style="max-width: 600px; margin: 0 auto">

<?php
	if(isset($updatepass)){
		echo $updatepass ;
	}
?>
 
	<form action="" method="POST">
		<div class="form-group">
			<label for="old_pass">Old Password</label>
			<input type="password" name="old_pass" class="form-control" id="old_pass"/>
		</div>
		<div class="form-group">
			<label for="password">New Password</label>
			<input type="password" name="password" class="form-control" id="password"/>
		</div>
		<button class="btn btn-success" type="submit" name="updatepass">Update</button>
	</form>

	</div>
	</div>
	</div>
<?php
include 'inc/footer.php';

?>		
		 
 

