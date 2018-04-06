<!-- DuCap - Software Engineering Project -->
<?php
	session_start();

	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	}

	//Include header html
	include('php/header.php');
	include('php/classes/DB.class.php');
	$db = new DB();

?>


<!-- Content -->
<div class = "container header">
	<center><h2>Administrator Control Panel</h2></center>
	<br/>
</div>

<div class="container volunteer">

	<div style="font-size:120%; text-align:center">
		<br /><br />
		<a href='attendance.php'>Take Attendance</a><br /><br />
		<a href='manageSites.php'>Manage Sites</a><br /><br />
		<a href='manageEvents.php'>Manage Events</a><br /><br />
		<a href='manageParticipants.php'>Manage Participants</a><br /><br />
		<a href='manageVolunteers.php'>Manage Volunteers</a><br /><br />
		<?php if($_SESSION['user_name'] == 'root'){ ?>		
			<a href='adminPermissions.php'>Permissions</a><br /><br />
		<?php } ?>
	</div>

</div>

<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
