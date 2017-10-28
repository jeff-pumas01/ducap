<html>
<head>
	<title>Update Event</title>
</head>

<body>

<?php

	/**
	 *	This program allows the user to update a
	 previously created event.
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

<form action = "" method = "POST">

	<div class = "container volunteer">
		
		<h3><b>Update an Event</h3>
		
		
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="" required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="date">Date (mm/dd/yyyy):</label>
				<input type="text" class="form-control" name="date"  id="date" placeholder="" required>
			</div>
		</div>
            
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="time">Time:</label>
				<input type="text" id="time" class="form-control" name="time" placeholder="" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="length">Length (in minutes):</label>
				<input type="text" class="form-control" id="length" name="length" placeholder="" required>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				<label for="site_id">Site:</label>
				<?php
					// Get a select list of Event names.
					echo $db->{'getEventSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Continue</button>
		</div>
	
	</div>

	
</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>