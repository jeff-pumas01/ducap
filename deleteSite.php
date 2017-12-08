<?php

	/*
		This program deletes the data for the site.
	*/
	
	include 'php/classes/DB.class.php';
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	$sID = $_POST['site_id'];
	
	
	
?>

<html>
<head>
</head>

<body>
<center>

<!-- Content -->
<div class = "container header">
	<h2>Delete Site</h2>
	<br/>
</div> 
<div class="container volunteer">

	<?php
		$db->{'deleteSite'}($sID);
	?>
	<br /><br /><a href='admin_cp.php'>Back</a>
</div> 
</center>
<?php

//Include footer html
include('php/footer.php');

?>


</body>
</html>
