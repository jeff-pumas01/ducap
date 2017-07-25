<?php

	/*
		This program deletes the data for the participant.
	*/
	
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$pID = $_POST['participant_id'];
	
	
	
?>

<html>
<head>
</head>

<body>


<!-- Content -->
<div class = "container header">
	<center><h2>Delete Participant</h2></center>
	<br/>
</div> 

<div class="container volunteer">

	<?php
		$db->{'deleteParticipant'}($pID);
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div> 

<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
