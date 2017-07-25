<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the fourth page of the participant
	 *	registration form. It uses the form information from the
	 *	previous page to create a new Participant and also
	 *	creates a Guardianship row that links the Participant 
	 *	with the Legal Guardian.
	 */
	 
	

	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$lgID = $_POST['lg_id'];
	
	/*
	foreach ($_POST as $field => $value) 
		echo "field: $field, value: $value<br />";
	*/
	
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Participant Registration & Consent Form</h2></center>
	<br/>
</div> 

<form action = "childReg3.php" method = "POST">
	
	<div class = "container volunteer">
			
	<?php
	
		// Verify that all information in the form is correct.
		$participant_id = $db->{'verifyParticipantData'}($_POST, "insert");
		if ($participant_id != -1) {
			
			// Add a Guardianship link between the Participant and Legal Guardian.
			$guardianResults = $db->{'addGuardianship'}($participant_id, $lgID);
			
		} else {
			
		}
	
		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
	?>
	<br /><br />
	<input type="submit" class="btn btn-sm btn-primary btn-block" value="Add Another Participant" />
	</div>
</form>	

<form action = "childReg5.php" method = "POST">
	
	<div class = "container volunteer">
			
	<?php
		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
	?>
	
	<input type="submit" class="btn btn-sm btn-primary btn-block" value="Finish Registration" />
	</div>
</form>	

<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>