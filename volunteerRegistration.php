<!-- DuCap - Software Engineering Project -->
<?php

	/**
	 *	This program displays the first page of the participant registration form.
	 *	It adds 1 or 2 legal guardians to the database.
	 */

	include('php/classes/DB.class.php');
	include('php/header.php');

	//Connect to database
	$db = new DB();
	
?>








<!-- Content -->
<div class = "container header">
	<h2>  <b>Volunteer </b> Application </h2>
	<br/>
Click <a href="VolunteerForm.pdf">Here</a> to Download Volunteer Application
<br/>
Click <a href="">Here</a> to apply online </div>


<?php

//Include footer html
include('php/footer.php');

?>
