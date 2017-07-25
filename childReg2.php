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
	<center><h2>Participant Registration & Consent Form</h2></center>
	<br/>
</div> 

<form action = "childReg3.php" method = "POST">

	<div class = "container volunteer">
			
	<?php

		// Verify that all information in the Legal Guardian form is correct.
		$lgID = $db->{'verifyLegalGuardianData'}($_POST, "insert");
	
		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
		
		if ($lgID == -1) {
			echo "<a href='childReg.php'>Back</a>";
		} else {
			echo '<br /><br /><button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Continue</button>';
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