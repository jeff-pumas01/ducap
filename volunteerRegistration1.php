<html>
<head>
	<title>DuCAP Volunteer Registration</title>
</head>

<body>




<?php

	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
		$volID = $_POST['ID'];
	
	
?>

<!-- Content -->
<div class = "container header">
	<center><h2>Volunteer Registration Form</h2></center>
	<br/>
</div> 
<!--Volunteer Registration Form -->
<form action = "volunteerRegistration1.php" method = "POST">
	<div class = "container volunteer" align="left">
		<h3>Emergency Contact Person</h3>
		
		<!-- Row for first and last name -->
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
				<input type="text" class="form-control" name="ec_apart_num"  id="ec_apart_num" required>
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
				<input type="text" class="form-control" id="ec_state" name="ec_state" >
			</div>
			
			<div class="col-md-4 form-group">
				<label for="ec_zipcode">Zip Code:</label>
				<input type="text" class="form-control" id="ec_zipcode" name="ec_zipcode">
			</div>
		</div>
		
		<!-- Row for Home and Cell Phone Numbers. -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="ec_homephone">Home Number:</label>
				<input type="text" id="ec_homephone" class="form-control" name="ec_homephone" placeholder="Home Number" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="ec_mobilephone">Mobile Number:</label>
				<input type="text" class="form-control" id="ec_mobilephone" name="ec_mobilephone" placeholder="Mobile Number">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="ec_workphone">Work Number:</label>
				<input type="text" class="form-control" id="ec_workphone" name="ec_workphone" placeholder="Work Number">
			</div>
		</div>
		
	<!-- Medical Release AUTHORIZATION FOR TREATMENT OR EMERGENCY CARE  -->
		<h3>Emergency Contact Person</h3>	
		<h4>AUTHORIZATION FOR TREATMENT OR EMERGENCY CARE  </h4>
		<div class="row">
			<p>I hereby give permission to the medical personnel selected by DuCAP personnel to order X-rays, routine tests, treatment, and necessary transportation for my child or children listed/registered. In the event, I cannot be reached in an emergency, I hereby give permission to the physician selected by DuCAP personnel to secure and administer treatment, including hospitalization, for my child or children listed/registered. The completed forms will be photocopied. </p>
			<br />
			<p>I release, waive, discharge and covenant not to sue DuCAP, its departments, their respective administrators, directors, agents, coaches, and other employees of the organization, other participants, sponsoring agencies, sponsors, advertisers and if applicable, owners and leasers of premises used to conduct the event, all of which are hereinafter referred to as “releases”, from any and all liability to the participant, his or her heirs and next of kin for any and all claims, demands, medical bills, losses or damages on account of injury, including death or damage to property, caused or alleged to be caused in whole or in part by the negligence of the releases or otherwise. </p>
			<br />
			
			<div class="col-md-6 form-group">
				<label for="initial_one">Volunteer Name: </label>
				<input type="text" class="form-control" name="initial_one" id="initial_one" required>
			</div>
		</div>
		
		
		<!-- Photography Release  -->
		<h3>Photography Release</h3>	
		<div class="row">
			<p>I authorize the Illinois Department of Human services, any Affiliate or Sponsor/Partner of DuCAP, and the local DuCAP Program operators to photograph my child/children listed/registered for means of publication purposes. Photos might be used in various brochures and publications describing and promoting the program in a positive way. The photos will not be used in any illegal misrepresentation of my child/children listed/registered. </p>	
			<div class="col-md-6 form-group">
				<label for="initial_two">Volunteer Name: </label>
				<input type="text" class="form-control" name="initial_two" id="initial_two"  required>
			</div>
		</div>
		
		<h3>Background Investigation</h3>	
		<div class="row">
		<h4>NOTICE TO VOLUNTEERS REGARDING BACKGROUND INVESTIGATION </h4>
		<p   style="font-family:courier;">I understand that a consumer report (background screening report) and/or an investigative consumer report (reference checks and/or interviews) that may include information from public or private sources regarding my character, driving records, criminal history, court records (both civil and criminal), qualifications and experience, work habits, and/or other information relevant to my volunteer service may be obtained in connection with my application as a volunteer with DuPage County Area Project</p>
		<p   style="font-family:courier;">I understand that, if I am approved for volunteer service by DuPage County Area Project, this background check authorization will be kept on file and may be used at any time during my service to procure further information when, in the judgment of DuPage County Area Project, such may be necessary.</p>
		<p   style="font-family:courier;">I hereby release and discharge to the extent permitted by law, DuPage County Area Project, its employees, any individual or agency obtaining information for DuPage County Area Project, and any personal or professional reference, from any and all claims, damages, losses, liabilities, costs, or other expenses arising from the retrieving, reporting and/or disclosure of information in connection with this background investigation. </p>
		<p   style="font-family:courier;">I understand that I am volunteering my services and declare in no way shall I be considered an employee or subcontractor or independent contractor of DuPage County Area Project. </p>
		<p   style="font-family:courier;">By signing below, I, have read, understand and consent to the above. I further authorize that a photographic copy or a telephonic facsimile of this document shall be valid for purposes present and future. My signature below certifies that all information I have provided in connection with this background check is true, accurate and complete to the best of my knowledge. </p>
		
		
			<p>I understand and give permission for DuCAP to conduct a criminal Background Investigation on me. </p>
			<div class="col-md-6 form-group">
				<label for="initial_three">Volunteer Name: </label>
				<input type="text" class="form-control" name="initial3_three" id="initial_three"  required>
			</div>
			<br />
			
		</div>
		<div class= "row">
			<p>My signature below certifies that all information I have provided in connection with this application is true, accurate and complete to the best of my knowledge.</p>
			<div class="col-md-6 form-group">
				<label for="initial_four">Volunteer Name: </label>
				<input type="text" class="form-control" name="initial_four" id="initial_four" required>
			</div>
		</div>
			
			
			
		<!-- Photography Release  -->
		<h3>AUTHORIZATION</h3>	
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="auth_full_name">Full Name</label>
				<input type="text" class="form-control" name="auth_full_name" id="auth_full_name" required>
			</div>
			
			<div class="col-md-6 form-group">
				<label for="auth_ssn">Social Security Number:</label>
				<input type="text" class="form-control" name="auth_ssn"  id="auth_ssn" placeholder="" required>
			</div>
		</div>
            
            <!-- City,State,Zip -->
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="auth_birthdate">Date of Birth (MM/DD/YYYY):</label>
				<input type="date" class="form-control" id="auth_birthdate" name="auth_birthdate" required />
			</div>
			
			<div class="col-md-4 form-group">
				<label for="auth_license">Driver's License Number:</label>
				<input type="text" class="form-control" id="auth_license" name="auth_license" required>
			</div>
			
			<div class="col-md-4 form-group">
				<label for="auth_state">Driver License State:</label>
				<input type="text" class="form-control" id="auth_state" name="auth_state" required>
			</div>
		</div>
			
		

		
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "sub"  >Continue</button>
		</div>
	
	

	
</form>	

<?php

//Include footer html
include('php/footer.php');

?>

</body>
</html>

