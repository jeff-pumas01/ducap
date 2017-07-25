<!-- DuCap - Software Engineering Project -->
<?php

	//Include header html
	include('php/header.php');

?>

<!-- Content -->
<?php

	//Include DB class

	include('php/classes/DB.class.php');
	$db = new DB();
	$conn = $db->connect();
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		$email = mysql_escape_string($_GET['email']); // Set email variable
		$hash = mysql_escape_string($_GET['hash']); // Set hash variable
		
		$sql = "UPDATE Volunteers SET active='1' WHERE email='".$email."' AND password='".$hash."' AND active='0'";
if ($conn->query($sql)) {
?>
	<!-- Content -->
	<div class="container">
		<p class="center-block">Thank you for accepting the new applicant. You will be redirected to the login in 10 seconds. </p>

		<p class="center-block"> Otherwise click <a href="login.php">here.</a></p>
	</div>
	<meta http-equiv="refresh" content="10;url=login.php" />
	<!-- End of Content -->

<?php
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
		
	}else{
		// Invalid approach
	}

?>
			
<!-- End of Content -->


<?php

//Include footer html
include('php/footer.php');

?>
					
