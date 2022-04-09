

 <?php
 include "lib/User.php";
 include "inc/header.php";
 Session::checkSession();
 ?>

<?php
if(isset($_GET['id'])){
	$userid = (int)$_GET['id'] ;
}
$user = new User() ;/// this is a object type variable this object can be access user class and collected some data
//using method creation 

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['update'])){	 
	$updateusr = $user->updateUserData($userid , $_POST);	 
}


?>



	<div class="panel panel-default">
	<div class="panel-heading">
	<h2>UserList<span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
	</div>


	<div class="panel-body">
	<div style="max-width: 600px; margin: 0 auto">

<?php
	if(isset($updateusr)){
		echo $updateusr ;
	}
?>
<?php

$userdata = $user->getUserById($userid);
if($userdata){

?>

	 <form action="" method="POST">
	 	<div class="form-group">
	 		<label for="name">Your Name</label>
	 		<input type="text" name="name" class="form-control" id="name" value="<?php echo $userdata->name ;?>" />
	 	</div>
	 	<div class="form-group">
	 		<label for="username">UserName</label>
	 		<input type="text" name="username" class="form-control" id="username" value="<?php echo $userdata->username ;?>" />
	 	</div>
	 	<div class="form-group">
	 		<label for="email">Email Address</label>
	 		<input type="email" name="email" class="form-control" id="email" value="<?php echo $userdata->email ;?>" />
	 	</div>

	 	<?php
	 	$sesid =Session::get("id");
	 	if($userid == $sesid){
	 	?>
	 	<button class="btn btn-success" type="submit" name="update">Update</button>
	 	<a class="btn btn-info" href="changepass.php?id=<?php echo $userid ; ?>">Password Change</a>
	 	<?php }?>

	 </form>

<?php  
}

?>
	 </div>
	</div>

	</div>


<?php
include 'inc/footer.php';

?>		
		 
 

