<html>
<head>
	<title>Add User Permissions</title>
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
	<center><h2>Add User Permissions</h2></center>
	<br/>
</div>

<!-- Form to change a users permissions. -->
<form action = "delete_permission2.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove user permissions</b></h3>
		
		<p>Select a site to remove permission:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					echo $db->{'getSiteSelect'}();
					list($_SESSION['username'],$_SESSION['name']) = split(',',$_POST['user_info']);
				?>
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit" name = "submission">Remove permission</button>
	</div>
	
	
</form>	



<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		