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


<?php


	// Verify and add site.
	$db->{'verifySiteData'}($_POST, "insert");


	echo "<br /><br /><a href='http://cs.lewisu.edu/cs440/team2/Implementation_Bird/admin_cp.php'>Continue</a>";

	//Include footer html
	include('php/footer.php');

?>

</center>
</body>
</html>
