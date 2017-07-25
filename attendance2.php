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

	// Chosen site from previous page.
	$site_id = $_POST['site_id'];

?>


<!-- Content -->
<div class = "container header">
	<center><h2>Take Attendance</h2></center>
	<br/>
</div>

<!-- Form to choose an event. -->
<form action = "attendance3.php" method = "POST">
	<div class = "container volunteer">
		<center>

			<?php

				$siteData = $db->{'getSiteInfo'}($site_id);

				echo "<h3><b>Choose an Event at " . $siteData['site_name'] . "</b></h3>";
				echo "<br /><div class = 'row'>";
				echo "<label for='event_id'>Event:</label> ";

				// Get a select list of events for the given site.
				echo $db->{'getEventSelectForSite'}($site_id);

				// Pass along the site id as a hidden field.
				echo "<input type='hidden' name='site_id' value=$site_id />";
			?>
			</div>

		</center>
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Take Attendance</button>
		</div>

	</div>
</form>


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
