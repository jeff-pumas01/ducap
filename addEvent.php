<html>
<head>
	<title>Add Event</title>
</head>

<body>
<center>
<?php

	/*
		This program updates the data for the participant.
	*/

	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();

?>

<!-- Content -->
<div class = "container header">
	<center><h2>Add Event</h2></center>
	<br/>
</div>

<div class="container volunteer">

	<?php

		// Verify and add event.
		$db->{'verifyEventData'}($_POST, "insert");
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div>

<?php

//Include footer html
include('php/footer.php');

?>

</center>
</body>
</html>
