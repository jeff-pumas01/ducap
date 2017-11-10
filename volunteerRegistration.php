
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
<form action = "volunteerRegistration0.php" method = "POST">

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
				<select name="grade" class="form-control">
					<option>AL</option>
					<option>AK</option>
					<option>AZ</option>
					<option>AR</option>
					<option>CA</option>
					<option>CO</option>
					<option>CT</option>
					<option>DE</option>
					<option>FL</option>
					<option>GA</option>
					<option>HI</option>
					<option>ID</option>
					<option>IL</option>
					<option>IN</option>
					<option>IA</option>
					<option>KS</option>
					<option>KY</option>
					<option>LA</option>
					<option>ME</option>
					<option>MD</option>
					<option>MA</option>
					<option>MI</option>
					<option>MN</option>
					<option>MS</option>
					<option>MO</option>
					<option>MT</option>
					<option>NE</option>
					<option>NV</option>
					<option>NH</option>
					<option>NJ</option>
					<option>NM</option>
					<option>NY</option>
					<option>NC</option>
					<option>ND</option>
					<option>OH</option>
					<option>OK</option>
					<option>OR</option>
					<option>PA</option>
					<option>RI</option>
					<option>SC</option>
					<option>SD</option>
					<option>TN</option>
					<option>TX</option>
					<option>UT</option>
					<option>VT</option>
					<option>VA</option>
					<option>WA</option>
					<option>WV</option>
					<option>WI</option>
					<option>WY</option>
				</select>
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
				<input type="email" class="form-control" name="Email" id="Email" placeholder = "Email" required>
			</div>
            <div class="col-md-4 form-group">
				<label for="DateofBirth">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="DateofBirth" name="DateofBirth" required />
			</div>
		</div>
		
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
				<input type="text" class="form-control" name="Other" id="Other" placeholder = "Other">
			</div>
		</div>
		
			<!--Availability -->
			
		<div class = "row">
			<h3><b>Availability</b></h3>
			
			<div class="col-md-4 form-group">
				<label for="startDate">Date Available to Start (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="startDate" name="startDate" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="Monday">Monday After:</label>
				<input type="time" id="Monday" class="form-control" name="Monday">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="Tuesday">Tuesday After:</label>
				<input type="time" class="form-control" id="Tuesday" name="Tuesday">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="Wednesday">Wednesday After:</label>
				<input type="time" class="form-control" id="Wednesday" name="Wednesday" >
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="Thursday">Thursday After:</label>
				<input type="time" id="Monday" class="form-control" name="Thursday">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="satSun">Friday After:</label>
				<input type="time" class="form-control" id="Friday" name="Friday" >
			</div>
			
			<div class="col-md-4 form-group">
				<label for="">Saturday/ Sunday After:</label>
				<input type="time" class="form-control" id="satSun" name="satSun" >
			
		</div>
			
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "sub"  >Continue</button>
		</div>
</form>	

<?php

//Include footer html
include('php/footer.php');

?>

</body>
</html>