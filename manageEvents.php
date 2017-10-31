<html>
<head>
	<title>Manage Events</title>
</head>

<body>

<?php

	/**
	 *	This program allows the user to add a new event,
	 *	choose an event to update, or remove an event.
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
	<center><h2>Manage Events</h2></center>
	<br/>
</div> 

<!-- Form to add a event. -->
<form action = "addEvent.php" method = "POST">
	<div class = "container volunteer">
		
		<h3><b>Add an Event</b></h3>
		
		
		<!-- Row for title and date -->
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="date">Date (mm/dd/yyyy):</label>
				<input type="date" class="form-control" name="date"  id="date" required>
			</div>
		</div>
		
		<!-- Row for start time and length. -->
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="timeStart">Time:</label>
				<input type="text" id="timeStart" class="form-control" name="timeStart"  required>
				
			</div>
			
			<div class="col-md-6 form-group">
				<label for="timeLength">Length (in minutes):</label>
				<input type="text" id="timeLength" class="form-control" name="timeLength"  required>
			</div>
			
		</div>
		
		<!-- Site -->
		<div class = "row">
			<div class="col-md-6 form-group">
				<label for="site_id">Site:</label>
				<?php
					echo $db->{'getSiteSelect'}();
				?>
			</div>
		</div>
		
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Add Event</button>
		</div>
	
	</div>
</form>	

<!-- Form to update an event. -->
<form action = "updateEvent.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Update an Event</b></h3>
		
		<p>Select an event to update:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				<label for="event_id"></label>
				<?php
					// Get a select list of event names.
					echo $db->{'getEventSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Update Event</button>
		</div>
	
	</div>
</form>	

<!-- Form to remove an event. -->
<form action = "deleteEvent.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove an Event</b></h3>
		
		<p>Select a site to remove:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get a select list of Event names.
					echo $db->{'getEventSelect'}();
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Remove Event</button>
		</div>
	
	</div>
</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		