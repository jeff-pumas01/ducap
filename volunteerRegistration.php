
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
				<input type="text" class="form-control" name="first_name" id="first_name"  required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" name="last_name"  id="last_name" required>
			</div>
		</div>
		<!--Address and Apartment #-->
		<div class="row">
		
			<div class="col-md-6 form-group">
				<label for="address">Address:</label>
				<input type="text" class="form-control" name="address" id="address" " required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="apt_number">Apartment Number:</label>
				<input type="text" class="form-control" name="apt_number"  id="apt_number" required>
			</div>
		</div>
            
            <!-- City,State,Zip -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="city">City:</label>
				<input type="text" id="city" class="form-control" name="city"  required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="state">State:</label>
				<select name="state" class="form-control">
					<option>Alabama</option>
					<option>Alaska</option>
					<option>Arizona</option>
					<option>Arkansas</option>
					<option>California</option>
					<option>Colorado</option>
					<option>Connecticut</option>
					<option>Delaware</option>
					<option>Florida</option>
					<option>Georgia</option>
					<option>Hawaii</option>
					<option>Idaho</option>
					<option>Illinois</option>
					<option>Indiana</option>
					<option>Iowa</option>
					<option>Kansas</option>
					<option>Kentucky</option>
					<option>Louisiana</option>
					<option>Maine</option>
					<option>Maryland</option>
					<option>Massachusetts</option>
					<option>Michigan</option>
					<option>Minnesota</option>
					<option>Mississippi</option>
					<option>Missouri</option>
					<option>Montana</option>
					<option>Nebraska</option>
					<option>Nevada</option>
					<option>New Hampshire</option>
					<option>New Jersey</option>
					<option>New Mexico</option>
					<option>New York</option>
					<option>North Carolina</option>
					<option>North Dakota</option>
					<option>Ohio</option>
					<option>Oklahoma</option>
					<option>Oregon</option>
					<option>Pennsylvania</option>
					<option>Rhode Island</option>
					<option>South Carolina</option>
					<option>South Dakota</option>
					<option>Tennessee</option>
					<option>Texas</option>
					<option>Utah</option>
					<option>Vermont</option>
					<option>Virginia</option>
					<option>Washington</option>
					<option>West Virginia</option>
					<option>Wisconsin</option>
					<option>Wyoming</option>
				</select>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="zipcode">Zip Code:</label>
				<input type="text" class="form-control" id="zipcode" name="zipcode">
			</div>
		</div>
		
		<!-- Row for Home and Cell Phone Numbers. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="homephone">Home Number:</label>
				<input type="text" id="homephone" class="form-control" name="homephone" placeholder="XXX-XXX-XXXX" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="mobilephone">Mobile Number:</label>
				<input type="text" class="form-control" id="mobilephone" name="mobilephone" placeholder="XXX-XXX-XXXX">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="workphone">Work Number:</label>
				<input type="text" class="form-control" id="workphone" name="workphone" placeholder="XXX-XXX-XXXX">
			</div>
		</div>
		
		<!-- Email -->
		<div class = "row">
			<div class="col-md-4 form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" name="email" id="email"  required>
			</div>
            <div class="col-md-4 form-group">
				<label for="birthdate">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="birthdate" name="birthdate" required />
			</div>
		</div>
		
		<!--Area of Interest-->
		<div class= "row">
			<h3><b>Area of Interest</b></h3>
			<!--Still Have to change Id for database upload-->
			<input type="radio" name="area_of_interest" value="Tutoring">Tutoring<br>
			<input type="radio" name="area_of_interest" value="Office Tasks">Office Tasks<br>
			<input type="radio" name="area_of_interest" value="Mentoring">Mentoring<br>
			<input type="radio" name="area_of_interest" value="Drama/Music">Drama/Music<br>
			<input type="radio" name="area_of_interest" value="Arts/Crafts">Arts/Crafts<br>
			<input type="radio" name="area_of_interest" value="Sports">Sports<br>
			<div class="col-md-4 form-group">
				<label for="other_interest">Other:</label>
				<input type="text" class="form-control" name="other_interest" id="other_interest" placeholder = "Other">
			</div>
		</div>
		
			<!--Availability -->
			
		<div class = "row">
			<h3><b>Availability</b></h3>
			
			<div class="col-md-4 form-group">
				<label for="start_date">Date Available to Start (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="start_date" name="start_date" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="monday_time">Monday Availability:</label>
				<input type="text" id="monday_time" class="form-control" name="monday_time" placeholder = "XX:XX - XX:XX AM/PM">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="tuesday_time">Tuesday Availability:</label>
				<input type="text" class="form-control" id="tuesday_time" name="tuesday_time"  placeholder = "XX:XX - XX:XX AM/PM">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="wednesday_time">Wednesday Availability:</label>
				<input type="text" class="form-control" id="wednesday_time" name="wednesday_time"  placeholder = "XX:XX - XX:XX AM/PM">
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="thursday_time">Thursday Availability:</label>
				<input type="text" id="thursday_time" class="form-control" name="thursday_time"  placeholder = "XX:XX - XX:XX AM/PM">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="friday_time">Friday Availability:</label>
				<input type="text" class="form-control" id="friday_time" name="friday_time"  placeholder = "XX:XX - XX:XX AM/PM">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="satsun_time">Saturday/ Sunday Availability:</label>
				<input type="text" class="form-control" id="satsun_time" name="satsun_time"  placeholder = "XX:XX - XX:XX AM/PM">
			
		</div>
			
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "sub"  >Continue</button>
		</div>
			</div>
	
</form>	

<?php

//Include footer html
include('php/footer.php');

?>

</body>
</html>