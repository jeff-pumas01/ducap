<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the second page of the participant registration form.
	 *	It verifies the legal guardian information.
	 */

	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Volunteer Registration Form</h2></center>
	<br/>
</div> 

<form action = "volunteerRegistration0.php" method = "POST">

	<div class = "container volunteer">
			
	<?php

		// Verify that all information is correct
		$ID = $db->{'verifyVolunteer_RegistrationData'}($_POST, "insert");
	
		// Send ID of  to next page 
		echo "<input type='hidden' name='ID' value=$ID />";
		
		if ($ID == -1) {
			echo "<a href='volunteerRegistration.php'>Back</a>";
		} else {
			echo '<br /><br /><p><a href="http://front.cs.lewisu.edu/~franciscoarodrigue/">Back to Homepage</a></p>
';
		}
	?>

	</div>
</form>	

<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>