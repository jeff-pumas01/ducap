<html>
<head>
	<title>Manage Volunteers</title>
</head>

<body>

<?php

	/**
	 *	This program allows the user to add a new site,
	 *	choose a site to update, or remove a site.
	 */
	 
	session_start();
	
	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	} 
	
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Manage Volunteers</h2></center>
	<br/>
</div> 

<!-- Print Volunteer Info. -->
<iframe src='printVolunteer.php' frameborder='0' width='100%' height='500' allowtransparency='true' align="middle"></iframe>
<br />
<br />
<!-- Form to remove a Volunteer. -->
<form action = "deleteVolunteer.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove a Volunteer</b></h3>
		
		<p>Select a volunteer to remove:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get a select list of Volunteer names.
					echo $db->{'getVolunteerSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Remove Volunteer</button>
		</div>
	
	</div>
</form>	



<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		