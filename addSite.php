<?php

	/*
		This program adds the new site.
	*/
	session_start();

	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	}


	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();

?>
<html>
<head>
</head>

<body>
<center>
<div class="container volunteer">
<?php

	// Verify and add site.
	$db->{'verifySiteData'}($_POST, "insert");
	$db->{'addUserPermissions'}($db->getSiteID($_POST['site_name'], $_POST['address'], $_POST['zip_code']),$_SESSION['user_name']);
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
	<?php
	//Include footer html
	include('php/footer.php');

?>
</div>
</center>
</body>
</html>
