<?php

	/*
		This program updates the data for the participant.
	*/
	
	include 'php/classes/DB.class.php';
	include('php/header.php');
	
	// Connect to database.
	$db = new DB();
	
?>

<html>
<head>
</head>

<body>


<!-- Content -->
<div class = "container header">
	<center><h2>Update Participant</h2></center>
	<br/>
</div> 

<div class="container volunteer">

	<?php
	
		/*
		foreach ($_POST as $field => $val) {
			echo $field . " : " . $val . "<br />";
		}*/
	
		// Verify that all information in the form is correct.
		$db->{'verifyParticipantData'}($_POST, "update");
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div> 

<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
