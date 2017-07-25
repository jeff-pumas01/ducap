<html>
<head>
	<title>Participants</title>
</head>

<body>

<?php

	/**
	 *	This file displays a table of all Participants (for testing purposes).
	 */

	include('php/classes/DB.class.php');

	
	$db_name = "cs440team2";
	$db_user = "anthonymatsas";
	$db_pass = "cs440-2901";
	$db_host = "localhost";

	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die ("Error: Could not connect to database server!");
	
	//$conn = $db->connect();
	$qryStr = "SELECT first_name, last_name, gender, race, date_of_birth, school, grade, t_shirt_size FROM Participants";
	
	$result = mysqli_query($conn, $qryStr) or die ("Error: Could not execute query!");
	
	// Display results.
	$tbStr = "<h1>Participants</h1>";
	$tbStr .= "<table cellspacing='15'>";
	$tbStr .= "<tr><th>Name</th><th>Gender</th><th>Race</th><th>Date of Birth</th>";$tbStr .= "<th>School</th><th>Grade</th><th>T-Shirt Size</th></tr>";
	
	while ($row = mysqli_fetch_assoc($result)) {
		
		extract($row);
		
		$tbStr .= "<tr>";
		$tbStr .= "<td>$first_name $last_name</td>";
		$tbStr .= "<td>$gender</td>";
		$tbStr .= "<td>$race</td>";
		$tbStr .= "<td>$date_of_birth</td>";
		$tbStr .= "<td>$school</td>";
		$tbStr .= "<td>$grade</td>";
		$tbStr .= "<td>$t_shirt_size</td>";
		$tbStr .= "</tr>";
		
	}
	$tbStr .= "</table>";

	echo $tbStr;

?>

</body>
</html>