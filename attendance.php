<?php

	/**
	 *	This program allows the user to choose a site.
	 *	The next page will take attendance for the site's events.
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
	<center><h2>Take Attendance</h2></center>
	<br/>
</div>

<!-- Form to choose a site. -->
<form action = "attendance2.php" method = "POST">
	<div class = "container volunteer">

		<center>
			<h3><b>Choose a Site:<?php $permissions = $db->{'getUserPermissions'}($_SESSION['user_name']); ?></b></h3>
			<br />

			<!-- Site -->
			<div class = "row">
				<label for="site_id">Site:</label>
				<?php
					echo $db->{'getSiteSelectByPermissions'}($permissions);
				?>

			</div>

			<br /><br />
			<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Select</button>
		</center>
	</div>
</form>


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
