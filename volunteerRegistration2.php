<html>
<head>
	<title>DuCAP Volunteer Registration</title>
</head>

<body>

<?php
	include('php/classes/DB.class.php');
	include('php/header.php');

		// Connect to database.
	$db = new DB();
	$ID = $_POST['ID'];	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Volunteer Registration Form </h2></center>
	<br/>
</div> 

<form action = "volunteerRegistration2.php" method = "POST">
	

	
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