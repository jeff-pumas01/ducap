
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

<div class = "container volunteer">

		<h3><b>Add user permissions</b></h3>
		<div class="row">
			<div class="col-md-8 form-group">
				<!-- Content -->
				<div class = "container header">
					<center>
					<?php
						echo "hi";
						print_r(array_values($_POST));
						echo $_POST['username'];
						echo $_POST['name'];
						$db->{'addUserPermissions'}($SESSION['username'],$SESSION['name']);
					?>
				</div>
				<br />
			</div>
		</div>
</center>
	<br/>
</div>
<!-- confirmation it added the permissiion -->



<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		