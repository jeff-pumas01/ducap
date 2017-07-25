<html>
<head>
	<title>DuCAP Participant Registration</title>
</head>

<body>

<?php

	/**
	 *	This program displays the fifth page of the participant
	 *	registration form. It displays various release statements
	 *	for the legal guardian to initial, as well as a final signature.
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

<form action = "childReg6.php" method = "POST">
	
	<?php
		// Send ID of Legal Guardian to next page to create a Guardianship link with Participant.
		echo "<input type='hidden' name='lg_id' value=$lgID />";
	?>
	
	
	<div class = "container volunteer" style="font-weight:normal;">
		
		<h3><b>Medical Release</b></h3>
		<p><b>AUTHORIZATION FOR TREATMENT OR EMERGENCY CARE</b>: I hereby give permission to the medical personnel selected by DuCAP personnel to order X-rays, routine tests, treatment, and necessary transportation for my child or children listed/registered. In the event I cannot be reached in an emergency, I hereby give permission to the physician selected by DuCAP personnel to secure and administer treatment, including hospitalization, for my child or children listed/registered. The completed forms will be photocopied.</p>
		<p>I release, waive, discharge, and covenant not to sue DuCAP, its departments, their respective administrators, directors, agents, coaches, and other employees of the organization, other participants, sponsoring agencies, sponsors, advertisers, and if applicable, owners and leasers of premises used to conduct the event, all of which are hereinafter referred to as "releases," from any and all liability to the participant, his or her heirs and nemt of kin for any and all claims, demands, medical bills, losses or damages on account of injury, including death or damage to property, caused or alleged to be caused in whole or in part by the negligence of the releases or otherwise.</p>
		
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_med">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_med" id="init_med" required />
			</div>
		</div>
		
		<h3><b>Photography Release</b></h3>
		<p><b>I authorize the Illinois Department of Human Services, any Affiliate or Sponsor/Partner of DuCAP, and the local DuCAP Program operators to photograph my child/children listed/registered for means of publication purposes.</b> Photos might be used in various brochures and publications describing and promoting the program in a positive way. The photos will not be used in any illegal misrepresentation of my child/children listed/registered.</p>
		
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_photo">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_photo" id="init_photo" required />
			</div>
		</div>
		
		<h3><b>Outcome Measurement Consent</b></h3>
		<p>I give permission to the Illinois Department of Human Services, its designees, and DuCAP to collect and record data on my child or children listed/registered. The data may include, but is not restricted to the following:</p>
		<p>*&nbsp;&nbsp;&nbsp;&nbsp;Surveys and/or interviews about his/her knowledge, attitudes, skills, and behaviors in regards to risk-taking behaviors and habits, education and educational resources, positive relationships, career choices, connection to community, and overall satisfaction with the DuCAP Program.</p>
		<p>*&nbsp;&nbsp;&nbsp;&nbsp;Academic and school department data from report cards and other school reports. These will be collected each quarter during the school year.</p>
		<p>I understand that the purpose of these surveys and interviews is to document the impact of the DuCAP Program on its participants and to identif areas for improvement.</p>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_outcome">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_outcome" id="init_outcome" required />
			</div>
		</div>
		
		<h3><b>Field Trips</b></h3> 
		<p>I understand that the DuCAP Program will be planning some field trips throughout the course of my child's participation. I will allow my child or children listed/registered to go on field trips with the DuCAP Program and staff. My child or children listed/registered and I fully understand that all DuCAP rules apply, even on field trips. I also understand that all field trips will also have another, more detailed permission slip, providing information concerning the exact logistics of the trip.</p>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_field">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_field" id="init_field" required />
			</div>
		</div>
		
		<h3><b>Audio/Visual Presentations</b></h3>
		<p>I understand that the DuCAP Program will present audio/visual presentations that carry a PG or G rating. At times, presentations with a PG13 rating will be shown. I allow my child or children listed/registered to view/listen to a G, PG, and PG13 rated presentation.</p>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_av">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_av" id="init_av" required />
			</div>
		</div>
		<br />
		
		<h3><b>Audio/Visual Presentations</b></h3>
		<p><b>My signature confirms that I have read and understood the above information and give my consent accordingly.</b></p>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="init_sig">Parent/Legal Guardian Initials:</label>
				<input type="text" class="form-control" name="init_sig" id="init_sig" required />
			</div>
			<div class="col-md-4 form-group">
				<label for="sig_date">Date:</label>
				<input type="date" class="form-control" name="sig_date" id="sig_date" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 form-group">
				<label for="signature">Parent/Legal Guardian Full Name:</label>
				<input type="text" class="form-control" name="signature" id="signature" required />
			</div>
		</div>		
		
		<input type="submit" class="btn btn-sm btn-primary btn-block" value="Confirm" />
		
	</div>

</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>