<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the first page of the participant registration form.
	 *	It adds 1 or 2 legal guardians to the database.
	 */
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Participant Registration & Consent Form</h2></center>
	<br/>
</div> 
<center>Click <a href="childReg.pdf" target="_blank">Here</a> to Download Participant Registration Form</center>
<form action = "childReg2.php" method = "POST">

	<div class = "container volunteer">
		
		<h3><b>Parent/Legal Guardian</b></h3>
		
		<!-- Row for first and last name -->
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" name="last_name"  id="last_name" placeholder="Last Name" required>
			</div>
		</div>
		
		<!-- Row for Home and Cell Phone Numbers. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="home_number">Home Number:</label>
				<input type="text" id="home_number" class="form-control" name="home_number" placeholder="Home Number" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="cell_number">Cell Number:</label>
				<input type="text" class="form-control" id="cell_number" name="cell_number" placeholder="Cell Number">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="other_number">Other Number:</label>
				<input type="text" class="form-control" id="other_number" name="other_number" placeholder="Other Number">
			</div>
		</div>
		
		<!-- Email -->
		<div class = "row">
			<div class="col-md-6 form-group">
				<label for="email">Email Address:</label>
				<input type="text" class="form-control" name="email" id="email" placeholder = "Email Address" required>
			</div>
		</div>
		
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Continue</button>
		</div>
	


	
</form>	

<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
