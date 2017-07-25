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


	// Connect to database.
	$db = new DB();
	
	
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Select Volunteer To Delete</h2>
</div>
<div class="divB">
<div class="divD">
<p>Select Below</p>
<?php
$connection = mysql_connect("localhost", "anthonymatsas", "cs440-2901"); // Eastablishing Connection With Server.
$db = mysql_select_db("cs440team2", $connection); // Selecting Database From Server.
if (isset($_GET['del'])) {
$del = $_GET['del'];
//SQL query for deletion.
$query1 = mysql_query("delete from VolunteerApplicationNEW where ID=$del", $connection);
}
$query = mysql_query("select * from VolunteerApplicationNEW", $connection); // SQL query to fetch data to display in menu.
while ($row = mysql_fetch_array($query)) {
echo "<b><a href=\"deleteVolunteer.php?id={$row['ID']}\">{$row['first_name']} {$row['last_name']} ID: {$row['ID']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
// SQL query to Display Details.
$query1 = mysql_query("select * from VolunteerApplicationNEW where ID=$id", $connection);
while ($row1 = mysql_fetch_array($query1)) {
?>
<form class="form">
<h2>---Details---</h2>
<span>First Name:</span> <?php echo $row1['first_name']; ?>
<br><span>Last Name:</span> <?php echo $row1['last_name']; ?>
<br><span>ID:</span> <?php echo $row1['ID']; ?>
<br><span>E-mail:</span> <?php echo $row1['Email']; ?>
<br><span>Address:</span> <?php echo $row1['Address']; ?>
<?php echo "<b><a href=\"deleteVolunteer.php?del={$row1['ID']}\">
<br><input type=\"button\" class=\"submit\" value=\"Delete\"/></a></b>"; ?>
</form><?php
}
}
// Closing Connection with Server.
mysql_close($connection);
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</body>
</html>