
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
				<input type="text" class="form-control" name="address" id="address"  required >
			</div>
			
			<div class="col-md-6 form-group">
				<label for="apt_number">Apartment Number:</label>
				<input type="text" class="form-control" name="apt_number"  id="apt_number" >
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
				<select name="state" id = "state" class="form-control" required>
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
				<input type="text" class="form-control" id="zipcode" name="zipcode" required>
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
				<input type="email" class="form-control" name="email" id="email"placeholder="username@mail.com"  required>
			</div>
            <div class="col-md-4 form-group">
				<label for="birthdate">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="birthdate" name="birthdate" required />
			</div>
		</div>
		
		<!--Area of Interest-->
		<h3 align="left"><b>Area of Interest</b></h3>
		<div class= "row" align="left">
			<input type="radio" name="area_of_interest" value="Tutoring">   Tutoring<br>
			<input type="radio" name="area_of_interest" value="Office Tasks">   Office Tasks<br>
			<input type="radio" name="area_of_interest" value="Mentoring">   Mentoring<br>
			<input type="radio" name="area_of_interest" value="Drama/Music">   Drama/Music<br>
			<input type="radio" name="area_of_interest" value="Arts/Crafts">   Arts/Crafts<br>
			<input type="radio" name="area_of_interest" value="Sports">   Sports<br>
			
			<div class="col-md-4 form-group">
			<label for="other_interest">Other:</label><input type="text" class="form-control" name="other_interest" id="other_interest" placeholder = "Other">
			
			</div>
			</div>
		
		<!--Availability -->
		<h3 align="left"><b>Hours of Availability</b></h3>
		
		<div class = "row">
			
			<div class="col-md-4 form-group">
				<label for="start_date">Date Available to Start (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="start_date" name="start_date" required />
			</div>
			<div class="col-md-4 form-group">
				<label for="totalHours">Availability Hours Per Week:</label>
				<br><br/>
				<input type="number" class="form-control" id="totalHours" name="totalHours"  required />
			</div>
		</div>
		
		<div class="row">
				 <div class="col-md-4 form-group">
					<label for="monday_time">Monday Availability From:</label>
					<select name="monday_time" id = "monday_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="monday_time">To:</label>
					<select name="monday_end" id = "monday_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
					    <option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
		<div class="row">
				 <div class="col-md-4 form-group">
					<label for="tuesday_time">Tuesday Availability From:</label>
					<select name="tuesday_time" id = "tuesday_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="tuesday_time">To:</label>
					<select name="tuesday_end" id = "tuesday_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
				<div class="row">
				 <div class="col-md-4 form-group">
					<label for="wednesday_time">Wednesday Availability From:</label>
					<select name="wednesday_time" id = "wednesday_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="wednesday_time">To:</label>
					<select name="wednesday_end" id = "wednesday_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
				<div class="row">
				 <div class="col-md-4 form-group">
					<label for="thursday_time">Thursday Availability From:</label>
					<select name="thursday_time" id = "thursday_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="thursday_time">To:</label>
					<select name="thursday_end" id = "thursday_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
				<div class="row">
				 <div class="col-md-4 form-group">
					<label for="friday_time">Friday Availability From:</label>
					<select name="friday_time" id = "friday_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="friday_time">To:</label>
					<select name="friday_end" id = "friday_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
				<div class="row">
				 <div class="col-md-4 form-group">
					<label for="satsun_time">Sat/Sun Availability From:</label>
					<select name="satsun_time" id = "satsun_time" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
				</div>
			
				 <div class="col-md-4 form-group">
				 	<label for="satsun_time">To:</label>
					<select name="satsun_end" id = "satsun_end" class="form-control" required>
						<option value="" selected disabled hidden>Choose here</option>
						<option>NOT AVAILABLE</option>
						<option>6:00 AM</option>
						<option>6:30 AM</option>
						<option>7:00 AM</option>
						<option>7:30 AM</option>
						<option>8:00 AM</option>
						<option>8:30 AM</option>
						<option>9:00 AM</option>
						<option>9:30 AM</option>
						<option>10:00 AM</option>
						<option>10:30 AM</option>
						<option>11:00 AM</option>
						<option>11:30 AM</option>
						<option>12:00 PM</option>
						<option>12:30 PM</option>
						<option>1:00 PM</option>
						<option>1:30 PM</option>
						<option>2:00 PM</option>
						<option>2:30 PM</option>
						<option>3:00 PM</option>
						<option>3:30 PM</option>
						<option>4:00 PM</option>
						<option>4:30 PM</option>
						<option>5:00 PM</option>
						<option>5:30 PM</option>
						<option>6:00 PM</option>
						<option>6:30 PM</option>
						<option>7:00 PM</option>
						<option>7:30 PM</option>
						<option>8:00 PM</option>
						<option>8:30 PM</option>
						<option>9:00 PM</option>
						<option>9:30 PM</option>
						<option>10:00 PM</option>
						<option>10:30 PM</option>
					</select>
					</div>
		</div>
		<!-- Row for first and last name -->
		<h3 align="left"><b>Emergency Contact Person</b></h3>
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="ec_name">Full Name:</label>
				<input type="text" class="form-control" name="ec_name" id="ec_name"  required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="ec_relationship">Relationship</label>
				<input type="text" class="form-control" name="ec_relationship"  id="ec_relationship"  required>
			</div>
		</div>
		
		<!-- Address & Apt Num -->
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="ec_address">Address:</label>
				<input type="text" class="form-control" name="ec_address" id="ec_address"  required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="ec_apart_num">Apartment Number</label>
				<input type="text" class="form-control" name="ec_apart_num"  id="ec_apart_num" >
			</div>
		</div>
		
            
            <!-- City,State,Zip -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="ec_city">City:</label>
				<input type="text" id="ec_city" class="form-control" name="ec_city" required>
			</div>
			<div class="col-md-4 form-group">
				<label for="ec_state">State:</label>
				<select name="ec_state"  id = "ec_state" class="form-control">
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
				<label for="ec_zipcode">Zip Code:</label>
				<input type="text" class="form-control" id="ec_zipcode" name="ec_zipcode" required>
			</div>
		</div>
		
		<!-- Row for Home and Cell Phone Numbers. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="ec_homephone">Home Number:</label>
				<input type="text" id="ec_homephone" class="form-control" name="ec_homephone" placeholder="XXX-XXX-XXXX" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="ec_mobilephone">Mobile Number:</label>
				<input type="text" class="form-control" id="ec_mobilephone" name="ec_mobilephone" placeholder="XXX-XXX-XXXX">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="ec_workphone">Work Number:</label>
				<input type="text" class="form-control" id="ec_workphone" name="ec_workphone" placeholder="XXX-XXX-XXXX">
			</div>
		</div>
		
	<!-- Medical Release AUTHORIZATION FOR TREATMENT OR EMERGENCY CARE  -->
	<h3 align="left"><b>Medical Release</b></h3>
		<h4>AUTHORIZATION FOR TREATMENT OR EMERGENCY CARE  </h4>
	
			<p style="font-family:courier;">I hereby give permission to the medical personnel selected by DuCAP personnel to order X-rays, routine tests, treatment, and necessary transportation for my child or children listed/registered. In the event, I cannot be reached in an emergency, I hereby give permission to the physician selected by DuCAP personnel to secure and administer treatment, including hospitalization, for my child or children listed/registered. The completed forms will be photocopied. </p>
			<br />
			<p style="font-family:courier;">I release, waive, discharge and covenant not to sue DuCAP, its departments, their respective administrators, directors, agents, coaches, and other employees of the organization, other participants, sponsoring agencies, sponsors, advertisers and if applicable, owners and leasers of premises used to conduct the event, all of which are hereinafter referred to as “releases”, from any and all liability to the participant, his or her heirs and next of kin for any and all claims, demands, medical bills, losses or damages on account of injury, including death or damage to property, caused or alleged to be caused in whole or in part by the negligence of the releases or otherwise. </p>
			<br />
				<div class="row" align="left">
			<div class="col-md-6 form-group">
				<label for="initial_one">Initial: </label>
				<input type="text" class="form-control" name="initial_one" id="initial_one" placeholder="Initial here"required>
			</div>
		</div>
		
		
		<!-- Photography Release  -->
		<h3 align="left"><b>Photography Release</b></h3>	
		
			<p style="font-family:courier;">I authorize the Illinois Department of Human services, any Affiliate or Sponsor/Partner of DuCAP, and the local DuCAP Program operators to photograph my child/children listed/registered for means of publication purposes. Photos might be used in various brochures and publications describing and promoting the program in a positive way. The photos will not be used in any illegal misrepresentation of my child/children listed/registered. </p>	
			<div class="row">
			<div class="col-md-6 form-group">
				<label for="initial_two">Initial: </label>
				<input type="text" class="form-control" name="initial_two" id="initial_two" placeholder="Initial here" required>
			</div>
		</div>
		<!--Background Investigation  -->
		<h3 align="left"><b>Background Investigation</b></h3>	
		
		<h4>NOTICE TO VOLUNTEERS REGARDING BACKGROUND INVESTIGATION </h4>
		<p   style="font-family:courier;">I understand that a consumer report (background screening report) and/or an investigative consumer report (reference checks and/or interviews) that may include information from public or private sources regarding my character, driving records, criminal history, court records (both civil and criminal), qualifications and experience, work habits, and/or other information relevant to my volunteer service may be obtained in connection with my application as a volunteer with DuPage County Area Project</p>
		<p   style="font-family:courier;">I understand that, if I am approved for volunteer service by DuPage County Area Project, this background check authorization will be kept on file and may be used at any time during my service to procure further information when, in the judgment of DuPage County Area Project, such may be necessary.</p>
		<p   style="font-family:courier;">I hereby release and discharge to the extent permitted by law, DuPage County Area Project, its employees, any individual or agency obtaining information for DuPage County Area Project, and any personal or professional reference, from any and all claims, damages, losses, liabilities, costs, or other expenses arising from the retrieving, reporting and/or disclosure of information in connection with this background investigation. </p>
		<p   style="font-family:courier;">I understand that I am volunteering my services and declare in no way shall I be considered an employee or subcontractor or independent contractor of DuPage County Area Project. </p>
		<p   style="font-family:courier;">By signing below, I, have read, understand and consent to the above. I further authorize that a photographic copy or a telephonic facsimile of this document shall be valid for purposes present and future. My signature below certifies that all information I have provided in connection with this background check is true, accurate and complete to the best of my knowledge. </p>
		
		
			<p style="font-family:courier;">I understand and give permission for DuCAP to conduct a criminal Background Investigation on me. </p>
			<div class="row">
			<div class="col-md-6 form-group">
				<label for="initial_three">Initial:  </label>
				<input type="text" class="form-control" name="initial3_three" id="initial_three" placeholder="Initial here" required>
			</div>
			<br />
			
		</div>
			<p style="font-family:courier;" >My signature below certifies that all information I have provided in connection with this application is true, accurate and complete to the best of my knowledge.</p>
			
		<div class= "row">
			<div class="col-md-6 form-group">
				<label for="initial_four">Initials:  </label>
				<input type="text" class="form-control" name="initial_four" id="initial_four" placeholder="Initial Here"required>
			</div>
		</div>
			
			
			
		<!-- Photography Release  -->
		<h3 align="left"><b>Identification Authorization</b></h3>	
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="auth_full_name">Full Name</label>
				<input type="text" class="form-control" name="auth_full_name" id="auth_full_name" required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="auth_ssn">Social Security Number:</label>
				<input type="text" class="form-control" name="auth_ssn"  id="auth_ssn" placeholder="XXX-XX-XXXX" required>
			</div>
		</div>
            
            <!-- City,State,Zip -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="auth_birthdate">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="auth_birthdate" name="auth_birthdate" required />
			</div>
			
			<div class="col-md-4 form-group">
				<label for="auth_license">Driver's License Number:
				</label>
				<input type="text" class="form-control" id="auth_license" name="auth_license" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="auth_state">Driver License State:</label>
				<select name="auth_state"  id = "auth_state" class="form-control">
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
			
		</div>
			
			
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "sub"  >Submit Application</button>
		</div>
			</div>
	
</form>	

<?php

//Include footer html
include('php/footer.php');

?>

</body>
</html>