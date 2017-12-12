
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
	$_SESSION['user'] = $_POST['username'];
	// Connect to database.
	$db = new DB();
	
	
?>
<center>
	<!-- Content -->
	<div class = "container header">
			<h2>Remove user permission</h2>
			<br/>
	</div>
	<div class="container volunteer">
		<?php
			// Verify that all information in the form is correct.
			$db->{'deleteUserPermissions'}($_POST['site_id'],$_SESSION['username']);
		?>
		<br /><br /><a href='admin_cp.php'>Back</a>
	</div> 
</center>

<!-- confirmation it added the permissiion -->



<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		