<html>
<head>
	<title> Ducap Sites</title>
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
	$db = new DB();
	
	$db_name = "cs440team2";
	$db_user = "anthonymatsas";
	$db_pass = "cs440-2901";
	$db_host = "localhost";
	
	$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$db) {
            print "Error - Could not connect to MySQL";
            exit;
    }
	
	$query = "SELECT * FROM Events";
    $result = mysqli_query($db, $query) or die ("Error: Could not delete attendance records for the event!");
	
	while($row = mysqli_fetch_row($result)) {
		echo "row";
	}
?>

<!-- table and content for site name and addreess -->
<div class = "container header">
	<h3><center>Ducap Sites and Address<center></h3>
	<br/>
</div> 


<!-- table and content for up coming events -->
<div class = "container header">
	<h3><center>Upcomming events<center></h3>
	<br/>
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
		