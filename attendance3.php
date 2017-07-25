<?php

	/**
	 *	This program allows the user to select an event at
	 *	the chosen site. The next page will allow the user
	 *	to add and remove participants who attended the event.
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

	// Chosen site and event from previous page.
	$site_id = $_POST['site_id'];
	$event_id = $_POST['event_id'];

	// If user selects a participant to add, create an attendance record.
	if(isset($_POST['participant_id'])) {
		$db->{'addAttendance'}($_POST['participant_id'], $event_id);
	}

	// If user selects a participant to remove, delete the attendance record.
	if(isset($_POST['attendance_p_id'])) {
		$db->{'removeAttendance'}($_POST['attendance_p_id'], $event_id);
	}

?>


<!-- Content -->
<div class = "container header">
	<center><h2>Take Attendance</h2></center>
	<br/>
</div>

<!-- Show attendance table. -->
<form action="" method = "POST">
	<div class = "container volunteer">
		<?php

			$eventData = $db->{'getEventInfo'}($event_id);
			echo "<center><h3><b>Attendance Sheet</b></h3></center>";
			echo "<h4><b>" . $eventData['title'] . " on " . $eventData['date'] . "</b></h4>";

			// Get a select list of participants who are signed up for the event.
			echo $db->{'getAttendanceTable'}($event_id);

		?>

	</div>
</form>

<!-- Form to add participants (Processed by this page.) -->
<form action="" method = "POST">
	<div class = "container volunteer">
		<div class = "row">
			<center>
				<h3><b>Add Participant</b></h3>
				<?php

					// Pass along the site id and event id as a hidden field.
					echo "<input type='hidden' name='site_id' value=$site_id />";
					echo "<input type='hidden' name='event_id' value=$event_id />";

					// Show select list of possible participants.
					echo $db->{'getParticipantSelectForSite'}($site_id);

				?>
			</center>
		</div>


		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Add Participant to Event</button>

	</div>
</form>

<!-- Form to remove participants from attendance (Processed by this page.) -->
<form action="" method = "POST">
	<div class = "container volunteer">

		<div class = "row">
			<center>
				<h3><b>Remove Participant from Event</b></h3>
				<?php

					// Pass along the site id and event id as a hidden field.
					echo "<input type='hidden' name='site_id' value=$site_id />";
					echo "<input type='hidden' name='event_id' value=$event_id />";

					// Get a select list of participants who are signed up for the event.
					echo $db->{'getAttendanceSelect'}($event_id);

				?>
			</center>
		</div>


		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Remove Participant</button>

	</div>
</form>


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
