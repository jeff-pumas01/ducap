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
	include('php/header.php');

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

<!-- table and content for site name and addreess -->
<div class = "container header">
	<h3><center>Ducap Sites and Address<center></h3>
	<br/>
	<?php
		$query = "SELECT * FROM Sites";
    	$result = mysqli_query($db, $query) or die ("Error: Could not delete attendance records for the event!");
    
    	echo "<table>";
    	echo "<tr><th>Site Name</th><th>Site Address</th>";
    
	
		while($row = mysqli_fetch_assoc($result)) {
		
			echo "<tr><td>" . $row['site_name'] . "</td><td>" . $row['address'] . "</td></tr>";
		}
		echo "</table>";
	?>
</div> 


<!-- table and content for up coming events -->
<div class = "container header">
	<h3><center>Upcomming events<center></h3>
	<br/>
	<?php
	
		$query = "SELECT * FROM Events";
    	$result = mysqli_query($db, $query) or die ("Error: Could not delete attendance records for the event!");
    
    	echo "<table>";
    	echo "<tr><th>Date</th><th>Event</th><th>Location</th>";
    
	
		while($row = mysqli_fetch_assoc($result)) {
			$siteData = $db1->{'getSiteInfo'}($row['site_id']);
			echo "<tr><td>" . $row['date'] . "</td><td>" . $row['title'] . "</td><td>" . $siteData['site_name'] . "</td></tr>";
		}
		echo "</table>";
	?>
</div> 



</br>
</br>


<a href title = "print screen" "alt=" "print screen" onclick = "window.print();"
"target="_blank" style ="cursor:pointer;"><b><center>Print the Page<center><b></a>


<?php
	// Include footer html.
	include('php/footer.php');
?>

</body>
</html>
		