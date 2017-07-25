<?php

	/*
		This program displays a form to edit the data stored for a 
		given participant. This data includes:
			Basic information from Participants table
			Legal Guardian(s) information from 1..2 Participant_Legal_Guardians
	*/
	
	// Array of each field in the Participants table and its label.
	$labels_par = array("participant_id"=>"ID", "last_name"=>"Last Name", "first_name"=>"First Name", "gender"=>"Gender", "race"=>"Race", "date_of_birth"=>"Date of Birth", "school"=>"School", "grade"=>"Grade", "t_shirt_size"=>"T-Shirt Size", "site_id"=>"Site ID", "medications"=>"Medications", "notes"=>"Notes", "asthma"=>"Has Asthma", "emer_name"=>"Emergency Contact Name", "emer_phone"=>"Emergency Contact Phone Number", "emer_relation"=>"Relation to Participant");

	// Array of each field in the Participant_Legal_Guardians table and its label.
	$labels_lg = array("id", "last_name", "first_name", "home_number", "cell_number", "other_number", "email");
	
	// This file stores the DB class.
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$conn = $db->{'connect'}();
	
	
	// If a participant was chosen...
	if(isset($_POST['participant_id'])) {
		
		// Get participant_id from select list on previous page.
		$pID = $_POST['participant_id'];
		$row_par = $db->{'getParticipantInfo'}($pID);	
		
		// Get name of site to build select list of sites.
		$sID = $row_par['site_id'];
		$row_site = $db->{'getSiteInfo'}($sID);	
		
	} else {
		$pID = -1;
		$row_par = NULL;
	}
	
?>

<html>
<head>
</head>

<body>

<?php

	if ($pID == -1) {
		echo "Error: Participant ID was not entered!";
		
	} else if ($row_par == NULL) {
		echo "Error: Participant with ID #$pID was not found in database!";
		
	} else {
		
		$out =  "<div class = 'container header'>";
		$out .=  "<center><h2>Update Participant</h2></center><br/></div> ";
		
		// Create a form and fill it with existing data.
		$out .=  "<form action='updateParticipant2.php' method = 'POST'>";
		
		// Header.
		$out .= "<div class='container volunteer'";
		$out .=  "<p>Please check the following information below and make any corrections.</p>\n";

		// Label and text input for each field.
		foreach ($labels_par as $field => $label) {
			$out .=  "<div class='row'><div class='col-md-6 form-group'><label for='$field'>$label: </label>";
			$out .=  "<input type='text' name='$field' id='$field' value='$row_par[$field]' size='65' /></div></div>\n";
		}
		
		$out .=  "Site: " . $row_site['site_name'] . "<br /><br />";
		
		$out .= "<button class='btn btn-sm btn-primary btn-block' type='submit'  name='submission'>Submit Changes</button>\n</div></form><br /><br />";
		$out .= "<a href='admin_cp.php'>Back</a>";
		
		echo $out;
		include('php/footer.php');
	}
?>


</body>
</html>