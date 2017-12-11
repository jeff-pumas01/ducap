<html>
<head>
	<title> Ducap Sites</title>
	<link rel="stylesheet" type="text/css" href="css/sites-eventspage.css"/>

</head>

<body>


<?php

	/**
	 *	This program allows the user to print the 
	 *	sites , address and upcoming events.
	 */
	 
	session_start();
	

	
	 
	include('php/classes/DB.class.php');


	// Connect to database.
	$db1 = new DB();
	
	$db_name = "cs440team2";
	$db_user = "anthonymatsas";
	$db_pass = "cs440-2901";
	$db_host = "localhost";
	
	$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$db) {
            print "Error - Could not connect to MySQL";
            exit;
    }
	
	
?>

<!-- Volunteer Table Information -->
<div class = "container header">
	<h3><center>Volunteer General Information<center></h3>
	<br/>
	<?php
		$query = "SELECT * FROM Volunteer_Registration";
    	$result = mysqli_query($db, $query) or die ("Error: Could load volunteer data!");
    
    	echo "<table>";
    	echo "<tr><th>ID #</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Apt #</th><th>State</th><th>City</th><th>Zip</th><th>Home #</th><th>Work #</th><th>Cell #</th><th>Email</th><th>Birthdate</th>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['address'] . "</td><td>" . $row['apt_number'] . "</td><td>" . $row['state'] . "</td><td>" . $row['city'] . "</td><td>" . $row['zipcode'] . "</td><td>" . $row['homephone'] . "</td><td>" . $row['workphone'] . "</td><td>" . $row['mobilephone'] . "</td><td>" . $row['email'] . "</td><td>" . $row['birthdate'] . "</td></tr>" ;
		}
		echo "</table>";
	?>
</div> 

<div class = "container header">
	<h3><center>Area of Interest & Availability<center></h3>
	<br/>
	<?php
		$query = "SELECT * FROM Volunteer_Registration";
    	$result = mysqli_query($db, $query) or die ("Error: Could load volunteer data!");
    
    	echo "<table>";
    	echo "<tr><th>Volunteer</th><th>Area of Interest</th><th>Other</th><th>Hours Per Week</th><th>Start Date</th><th>Monday</th><th>To</th><th>Tuesday</th><th>To</th><th>Wednesday</th><th>To</th><th>Thursday</th><th>To</th><th>Friday</th><th>To</th><th>Sat/Sun</th><th>To</th>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['auth_full_name'] . "</td><td>" . $row['area_of_interest'] . "</td><td>" . $row['other_interest'] . "</td><td>" . $row['totalHours'] . "</td><td>". $row['start_date'] . "</td><td>" . $row['monday_time'] . "</td><td>" . $row['monday_end'] . "</td><td>" . $row['tuesday_time'] . "</td><td>" . $row['tuesday_end'] . "</td><td>" . $row['wednesday_time'] . "</td><td>" . $row['wednesday_end'] . "</td><td>" . $row['thursday_time'] . "</td><td>" 
			. $row['thursday_end'] . "</td><td>" . $row['friday_time'] . "</td><td>" . $row['friday_end'] . "</td><td>" . $row['satsun_time'] . "</td><td>" . $row['satsun_end'] . "</td></tr>" ;
		}
		echo "</table>";
	?>
</div> 


<div class = "container header">
	<h3><center>Emergency Contact Information<center></h3>
	<br/>
	<?php
		$query = "SELECT * FROM Volunteer_Registration";
    	$result = mysqli_query($db, $query) or die ("Error: Could load volunteer data!");
    
    	echo "<table>";
    	echo "<tr><th>Volunteer</th><th>Emergency Contact</th><th>Relationship</th><th>Address</th><th>Apt #</th><th>State</th><th>City</th><th>Zip</th><th>Home #</th><th>Work #</th><th>Cell #</th>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['auth_full_name'] . "</td><td>" . $row['ec_name'] . "</td><td>" . $row['ec_relationship'] . "</td><td>" . $row['ec_address'] . "</td><td>" . $row['ec_apart_num'] . "</td><td>" . $row['ec_city'] . "</td><td>" . $row['ec_state'] . "</td><td>" . $row['ec_zipcode'] . "</td><td>" . $row['ec_homephone'] . "</td><td>" . $row['ec_workphone'] . "</td><td>" . $row['ec_mobilephone'] . "</td></tr>" ;
		}
		echo "</table>";
	?>
</div> 

<div class = "container header">
	<h3><center>Identification Authorization<center></h3>
	<br/>
	<?php
		$query = "SELECT * FROM Volunteer_Registration";
    	$result = mysqli_query($db, $query) or die ("Error: Could load volunteer data!");
    
    	echo "<table>";
    	echo "<tr><th>Full Name</th><th>SSN</th><th>Birthdate</th><th>Licence</th><th>State</th>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row['auth_full_name'] . "</td><td>" . $row['auth_ssn'] . "</td><td>" . $row['auth_birthdate'] . "</td><td>" . $row['auth_license'] . "</td><td>" . $row['auth_state'] . "</td></tr>" ;
		}
		echo "</table>";
	?>
</div> 




<a href title = "print screen" "alt=" "print screen" onclick = "window.print();"
"target="_blank" style ="cursor:pointer;"><b><center>Print Volunteer Tables<center><b></a>




</body>
</html>