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
	<center><h2>Manage Volunteers</h2></center>
	<br/>
</div> 

<!-- Form to update a Volunteer. -->

<iframe src='VolunteerApplication.php?sfm_adminpage=disp' frameborder='0' width='100%' height='500' allowtransparency='true' align="middle"></iframe>

<!-- Delete a Volunteer. -->
<iframe src='deleteVolunteer.php' frameborder='0' width='100%' height='700' allowtransparency='true' align="middle"></iframe>


</body>
<?php

//Include footer html
include('php/footer.php');

?>
</html>
		