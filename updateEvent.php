<html>
<head>
	<title>Update Event</title>
</head>

<body>
<center>
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
	
	$event_id = $_POST['event_id'];

	
	
?>

<form action = "updateEvent2.php" method = "POST">

	<div class = "container volunteer">
		
		<center>
			<!-- This php code retrieves the information about the event you want
				to update and displays it in the textboxes. 
				TODO (?): get rid of <center> and find out why it does not
				automatically configure to the container volunteer-->
			<?php
						$eventData = $db->{'getEventInfo'}($event_id);

						echo "<h3><b>Update the event: " . $eventData['title'] . "</b></h3>";
				
						// retrieves info for title and date textboxes
						echo "<br /><div class = 'row'>";
						echo "<label for='title'>Title :</label> ";
						echo '<input required  type = "text" name = "title" value="' . $eventData['title'] . '" />';
						echo "<label for='date'>&nbsp;&nbsp;Date (mm/dd/yyyy):</label> ";
						echo '<input required  type = "text" name = "date" value="' . $eventData['date'] . '" />';
				
						// retrieves info for time and length textboxes
						echo "<br /><br /><div class = 'row'>";
						echo "<label for='time'>Time :</label> ";
						echo '<input required  type = "text" name = "timeStart" value="' . $eventData['timeStart'] . '" />';
						echo "<label for='date'>&nbsp;&nbsp;Length (in minutes):</label> ";
						echo '<input required  type = "text" name = "timeLength" value="' . $eventData['timeLength'] . '" />';
				
						// this is the site selection menu
						// TODO: make the default option the site that the event is currently at
						echo "<br /><br /><div class = 'row'>";
						echo "<label for='site'>Site :</label> ";
						echo '<input required  type = "hidden" name = "event_id" value="' . $event_id . '" />';
						echo $db->{'getSiteSelect'}();
			?>
			
			<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Update Event</button>

		</center>
	
		<!--
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
	
	</div> -->

	
</form>	

</center>
<?php

	// Include footer html.
	include('php/footer.php');

?>
</body>
</html>