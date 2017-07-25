<?php

	/*
		This program displays a form to edit the data stored for a 
		given participant. This data includes:
			Basic information from Participants table
			Legal Guardian(s) information from 1..2 Participant_Legal_Guardians
	*/
	session_start();
	
	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	} 
	
	
	// Array of each field in the Sites table and its label.
	$labels_site = array("site_id"=>"Site ID", "address"=>"Street Address", "zip_code"=>"Zip Code", "city"=>"City", "state"=>"State", "site_name"=>"Site Name");

	// This file stores the DB class.
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	
	// If a site was chosen...
	if(isset($_POST['site_id'])) {
		
		// Get site_id from select list on previous page.
		$sID = $_POST['site_id'];
		$row_site = $db->{'getSiteInfo'}($sID);	
		
	} else {
		$sID = -1;
		$row_site = NULL;
	}
	
?>

<html>
<head>
</head>

<body>

<?php

	if ($sID == -1) {
		echo "Error: Site ID was not entered!";
		
	} else if ($row_site == NULL) {
		echo "Error: Site with ID #$sID was not found in database!";
		
	} else {
		
		$out =  "<div class = 'container header'>";
		$out .=  "<center><h2>Update Site</h2></center><br/></div> ";
		
		// Create a form and fill it with existing data.
		$out .=  "<form action='updateSite2.php' method = 'POST'>";
		
		// Header.
		$out .= "<div class='container volunteer'";
		$out .=  "<p>Please check the following information below and make any corrections.</p>\n";

		// Label and text input for each field.
		foreach ($labels_site as $field => $label) {
			if ($field != 'site_id') {
				$out .=  "<div class='row'><div class='col-md-6 form-group'><label for='$field'>$label: </label>";
				$out .=  "<input type='text' name='$field' id='$field' value='$row_site[$field]' size='65' /></div></div>\n";
			}
		}
		
		$out .=  "<input type='hidden' name='site_id' id='site_id' value='$sID' size='65' />\n";
		
		$out .= "<button class='btn btn-sm btn-primary btn-block' type='submit'  name='submission'>Submit Changes</button>\n</div></form><br /><br />";
		$out .= "<a href='http://cs.lewisu.edu/cs440/team2/Implementation_Bird/updateSite.php'>Back</a>";
		
		echo $out;
		include('php/footer.php');
	}
?>


</body>
</html>