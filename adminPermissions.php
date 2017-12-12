<html>
<head>
	<title>Manage User Permissions</title>
</head>

<body>

<?php

	/**
	 *	This program allows the user to add a new site,
	 *	choose a site to update, or remove a site.
	 */
	 
	session_start();
	
	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	} 
	
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>User Permissions</h2></center>
	<br/>
</div>

<!-- Form to add user permissions. -->
<form action = "add_permission1.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Add permission</b></h3>
		
		<p>Select a user:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get sites based on users permissions.
					echo $db->{'getUsers'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Add permission</button>
		</div>
	
	</div>
</form>
<!-- Form to delete permissions. -->
<form action = "delete_permission1.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove user permission</b></h3>
		
		<p>Select a user:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get sites based on users permissions.
					echo $db->{'getUsers'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Delete permission</button>
		</div>
	
	</div>
</form>	



<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		