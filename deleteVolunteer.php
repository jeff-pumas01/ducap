<?php

	/*
		This program deletes the data for the participant.
	*/
	
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$pID = $_POST['ID'];
	
	
	
?>

<html>
<head>
</head>

<body>


<!-- Content -->
<div class = "container header">
	<center><h2>Delete Volunteer</h2></center>
	<br/>
</div> 

<div class="container volunteer">

	<?php
		$db->{'deleteVolunteer'}($pID);
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div> 

<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
