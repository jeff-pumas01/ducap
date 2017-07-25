<?php

	/*
		This program deletes the data for an event.
	*/
	
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$eID = $_POST['event_id'];
	
	
	
?>

<html>
<head>
</head>

<body>


<!-- Content -->
<div class = "container header">
	<center><h2>Delete Event</h2></center>
	<br/>
</div> 

<div class="container volunteer">

	<?php
		$db->{'deleteEvent'}($eID);
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div> 

<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
