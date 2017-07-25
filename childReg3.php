<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the third page of the participant registration form. 
	 *	It displays the form for adding a new participant.
	 */
	 
	

	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	$lgID = $_POST['lg_id'];
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Participant Registration & Consent Form</h2></center>
	<br/>
</div> 

<form action = "childReg4.php" method = "POST">

	<?php

		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
	?>

	<div class = "container volunteer">
		
		<h3><b>Child Participant</b></h3>
		<p>All participants MUST be at least 7 years of age.</p>
		
		<!-- Row for first and last name -->
		<div class="row">
			
			<div class="col-md-6 form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required />
			</div>
			
			<div class="col-md-6 form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" name="last_name"  id="last_name" placeholder="Last Name" required />
			</div>
		</div>
		
		<!-- Row for Gender, Race, Date of Birth. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="gender">Gender:</label>
				<select name="gender"class="form-control">
					<option>F</option>
					<option>M</option>
				</select>
			</div>
		
			<div class="col-md-4 form-group">
				<label for="race">Race:</label>
				<select name="race"class="form-control">
					<option>African-American</option>
					<option>Asian</option>
					<option>Caucasian</option>
					<option>Hispanic/Latino</option>
					<option>Multi-Racial</option>
					<option>Native American</option>
					<option>Other</option>
				</select>
			</div>
		
			<div class="col-md-4 form-group">
				<label for="date_of_birth">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required />
			</div>
		</div>
		
		<!-- Row for School, Grade, T-Shirt Size. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="school">School:</label>
				<input type="text" class="form-control" id="school" name="school" placeholder="School" />
			</div>
			
			<div class="col-md-4 form-group">
				<label for="grade">Grade:</label>
				<select name="grade" class="form-control">
					<option>Kindergarten</option>
					<option>First</option>
					<option>Second</option>
					<option>Third</option>
					<option>Fourth</option>
					<option>Fifth</option>
					<option>Sixth</option>
					<option>Seventh</option>
					<option>Eighth</option>
				</select>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="t_shirt_size">T-Shirt Size:</label>
				<select name="t_shirt_size"class="form-control">
					<option>X-Small</option>
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
					<option>X-Large</option>
				</select>
			</div>
		</div>
		
		<!-- Site -->
		<div class = "row">
			<div class="col-md-6 form-group">
				<label for="site_id">Site:</label>
				<?php
					echo $db->{'getSiteSelect'}();
				?>
			</div>
		</div>
		
		<br />
		
		<h3><b>Medical Information</b></h3>
		<p>I understand that DuCAP includes physical sports and recreational activities. My child has the following restrictions on his/her activity:</p>
		
		<div class="row">
			<div class="col-md-8 form-group">
				<label for="notes">Notes:</label>
				<textarea rows="4" cols="30" class="form-control" id="notes" name="notes" placeholder=""></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 form-group">
				<label for="medications">My child takes the following medications:</label>
				<textarea rows="4" cols="30" class="form-control" id="medications" name="medications" placeholder="List any medications here. Please describe how they are taken. Are they self-administered or administered by an adult?"></textarea>
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="asthma">My child has asthma:</label>
				<select name="asthma" class="form-control">
					<option>No</option>
					<option>Yes</option>
				</select>
			</div>
		</div>
		<p>Participants with a diagnosis of asthma may keep and use an inhaler during the DuCAP program, if a doctor's note is on file with the DuCAP Central Office. The inhaler must be used in lead staff's presence.</p>
		<br />
		
		<h3><b>Emergency Contact</b></h3>
		
		<!-- Rows for Name, Phone Number, Relation. -->
		<div class="row">
			<div class="col-md-8 form-group">
				<label for="emer_name">Name of Emergency Contact (Other than Parents):</label>
				<input type="text" class="form-control" id="emer_name" name="emer_name" placeholder="Full Name" />
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="emer_phone">Phone Number:</label>
				<input type="text" class="form-control" id="emer_phone" name="emer_phone" placeholder="Phone Number" />
			</div>
			<div class="col-md-6 form-group">
				<label for="emer_relation">Relation to Participant:</label>
				<input type="text" class="form-control" id="emer_relation" name="emer_relation" placeholder="Relation" />
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