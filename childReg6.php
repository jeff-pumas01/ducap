<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the fifth page of the participant
	 *	registration form. It displays various release statements
	 *	for the legal guardian to initial, as well as a final signature.
	 */
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$lgID = $_POST['lg_id'];
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Participant Registration & Consent Form</h2></center>
	<br/>
</div> 

<form action = "childReg6.php" method = "POST">
	
	<?php
		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
	?>
	
	
	<div class = "container volunteer" style="font-weight:normal;">
		
		<h3><b>Confirmation</b></h3>
		<p>Your registration is complete!</p>
		
	</div>

</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>