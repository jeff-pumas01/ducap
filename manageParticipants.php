<html>
<head>
	<title>Manage Participants</title>
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
	<center><h2>Manage Participants</h2></center>
	<br/>
</div> 


<!-- Form to update a Participant. -->
<form action = "updateParticipant.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Update a Participant</b></h3>
		
		<p>Select a participant to update:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get a select list of participant names.
					echo $db->{'getParticipantSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Update Participant</button>
		</div>
	
	</div>
</form>	

<!-- Form to remove a Participant. -->
<form action = "deleteParticipant.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove a Participant</b></h3>
		
		<p>Select a participant to remove:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get a select list of participant names.
					echo $db->{'getParticipantSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Remove Participant</button>
		</div>
	
	</div>
</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		