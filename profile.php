

		 <?php
		 include "inc/header.php";

		 ?>

		<div class="panel panel-default">
		<div class="panel-heading">
			<h2>UserList<span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
		</div>


		<div class="panel-body">
			<div style="max-width: 600px; margin: 0 auto">
			 <form action="" method="">
			 	<div class="form-group">
			 		<label for="name">Your Name</label>
			 		<input type="text" name="name" class="form-control" id="name" value="Rubel Hossain" />
			 	</div>
			 	<div class="form-group">
			 		<label for="username">UserName</label>
			 		<input type="text" name="username" class="form-control" id="username" value="Rubel" />
			 	</div>
			 	<div class="form-group">
			 		<label for="email">Email Address</label>
			 		<input type="email" name="email" class="form-control" id="email" value="rubelphp28@gmail.com" />
			 	</div>
			 	<button class="btn btn-success" type="submit" name="update">Update</button>
			 </form>
			 </div>
		</div>

	</div>


<?php
include 'inc/footer.php';

?>		
		 
 

