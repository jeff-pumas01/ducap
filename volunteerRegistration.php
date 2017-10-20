<!-- DuCap - Software Engineering Project -->
<?php

	/**
	 *	This program displays the first page of the participant registration form.
	 *	It adds 1 or 2 legal guardians to the database.
	 */

	include('php/classes/DB.class.php');
	include('php/header.php');

	//Connect to database
	$db = new DB();
	
?>

<!-- Content -->
<div class = "container header">
	<h2>  <b>Volunteer </b> Application </h2>
	<br/>
Click <a href="VolunteerForm.pdf">Here</a> to Download Volunteer Application
<br/>
Click <a href="">Here</a> to apply online </div>

<!--Volunteer Registration Form -->
<!--NEEDS TO BE CHANGED FOR NEXT PAGE OR VERIFICATIONPAGE-->
<form action = "test.php" method = "POST">

	<div class = "container registration">
		
		<h3><b>General Information</h3>
		
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
            
            <!-- City,State,Zip -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="City">City:</label>
				<input type="text" id="City" class="form-control" name="City" placeholder="City" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="State">State:</label>
				<input type="text" class="form-control" id="State" name="State" placeholder="State">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="Zipcode">Zip Code:</label>
				<input type="text" class="form-control" id="Zipcode" name="Zipcode" placeholder="Zip Code">
			</div>
		</div>
		
		<!-- Row for Home and Cell Phone Numbers. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="home_number">Home Number:</label>
				<input type="text" id="homeNumber" class="form-control" name="homeNumber" placeholder="Home Number" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="mobileNumber">Mobile Number:</label>
				<input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="workNumber">Work Number:</label>
				<input type="text" class="form-control" id="workNumber" name="workNumber" placeholder="Work Number">
			</div>
		</div>
		
		<!-- Email -->
		<div class = "row">
			<div class="col-md-6 form-group">
				<label for="Email">Email Address:</label>
				<input type="text" class="form-control" name="Email" id="Email" placeholder = "Email" required>
			</div>
            <div class="col-md-4 form-group">
				<label for="DateofBirth">Data of Birth:</label>
				<input type="text" class="form-control" id="DateofBirth" name="DateofBirth" placeholder="Data of Birth">
			</div>
		</div>
		
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Continue</button>
		</div>
	
	</div>

	
</form>	

<?php

//Include footer html
include('php/footer.php');

?>
