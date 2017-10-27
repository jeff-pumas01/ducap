
<html>
<head>
	<title>DuCAP Volunteer Registration</title>
</head>
<body>

<!-- DuCap - Software Engineering Project -->
<?php
	include('php/classes/DB.class.php');
	include('php/header.php');

	//Connect to database
	$db = new DB();
	
?>

<!-- Content -->
<div class = "container header">
<center><h2>Volunteer Registration Form</h2></center>
<br/>
</div>
<center>Click <a href="VolunteerForm.pdf">Here</a> to Download Volunteer Application Form<center>

<!--Volunteer Registration Form -->
<form action = "childReg2.php" method = "POST">

	<div class = "container volunteer" align="left">
			<h3><b>General Information</b></h3>
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
			<div class="col-md-4 form-group">
				<label for="Email">Email Address:</label>
				<input type="text" class="form-control" name="Email" id="Email" placeholder = "Email" required>
			</div>
            <div class="col-md-4 form-group">
				<label for="DateofBirth">Data of Birth:</label>
				<input type="text" class="form-control" id="DateofBirth" name="DateofBirth" placeholder="Data of Birth">
			</div>
		</div>
		
		
		
<!--*************************************************************************************************************************************************************************************-->		
<!--Still Have to change Id for database upload for all below till...-->	
		
		<!--Area of Interest-->
		<div class= "row">
			<h3><b>Area of Interest</b></h3>
			<!--Still Have to change Id for database upload-->
			<input type="checkbox" name="vehicle" value="Bike"> Tutoring<br>
			<input type="checkbox" name="vehicle" value="Car" checked>Office Tasks<br>
			<input type="checkbox" name="vehicle" value="Bike"> Mentoring<br>
			<input type="checkbox" name="vehicle" value="Car" checked>Drama/Music<br>
			<input type="checkbox" name="vehicle" value="Bike">Arts/Crafts<br>
			<input type="checkbox" name="vehicle" value="Car" checked>Sports<br>
			<div class="col-md-4 form-group">
				<label for="Other">Other:</label>
				<input type="text" class="form-control" name="Other" id="Other" placeholder = "Other" required>
			</div>
		</div>
		
			<!--Availability -->
			
		<div class = "row">
			<h3><b>Availability</b></h3>
			<div class="col-md-4 form-group">
				<label for="home_number">Date Available to Start:</label>
				<input type="text" id="Monday" class="form-control" name="XX-XX-XXXX" placeholder="XX-XX-XXXX" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="home_number">Monday:</label>
				<input type="text" id="Monday" class="form-control" name="Monday" placeholder="XX:XX to XX:XX" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="mobileNumber">Tuesday:</label>
				<input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="XX:XX to XX:XX">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="workNumber">Wednesday:</label>
				<input type="text" class="form-control" id="workNumber" name="workNumber" placeholder="XX:XX to XX:XX">
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="home_number">Thursday:</label>
				<input type="text" id="Monday" class="form-control" name="Monday" placeholder="XX:XX to XX:XX" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="mobileNumber">Friday:</label>
				<input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="XX:XX to XX:XX">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="workNumber">Saturday/ Sunday:</label>
					<select>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="2">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
						<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
			</div>
		</div>
		
		
		
		
		
		
		
<!--*************************************************************************************************************************************************************************************-->
		
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Continue</button>
		</div>
</form>	

<?php

//Include footer html
include('php/footer.php');

?>

</body>
</html>