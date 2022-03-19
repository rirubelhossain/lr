

		 <?php
		 include "inc/header.php";

		 ?>

		<div class="panel panel-default">
		<div class="panel-heading">
			<h2>User Login</h2>
		</div>

		<div class="panel-body">
			<div style="max-width: 600px; margin: 0 auto">
			 <form action="" method="">
			 	<div class="form-group">
			 		<label for="email">Email Address</label>
			 		<input type="email" name="email" class="form-control" id="email" required="1" />
			 	</div>
			 	<div class="form-group">
			 		<label for="password">Password</label>
			 		<input type="password" name="password" class="form-control" id="password" required="1" />
			 	</div>
			 	<button class="btn btn-success" type="submit" name="login">Login</button>
			 </form>
			 </div>
		</div>

	</div>


<?php
include 'inc/footer.php';

?>		
		 
 

