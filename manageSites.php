<html>
<head>
	<title>Manage Sites</title>
</head>

<body>

<?php

	/**
	 *	This program allows the user to add a new site,
	 *	choose a site to update, or remove a site.
	 */
	 
	session_start();
	
	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	} 
	
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	
?>


<!-- Content -->
<div class = "container header">
	<center><h2>Manage Sites</h2></center>
	<br/>
</div> 

<!-- Form to add a site. -->
<form action = "addSite.php" method = "POST">
	<div class = "container volunteer">
		
		<h3><b>Add a Site</b></h3>
		
		<!-- Row for site name -->
		<div class="row">
			
			<div class="col-md-8 form-group">
				<label for="site_name">Site Name:</label>
				<input type="text" class="form-control" name="site_name" id="site_name" placeholder="Site Name" required>
			</div>
		</div>
		
		<!-- Row for address. -->
		<div class="row">
			<div class="col-md-8 form-group">
				<label for="address">Street Address:</label>
				<input type="text" id="address" class="form-control" name="address" placeholder="Street Address" required>
			</div>
		</div>
		
		<!-- City -->
		<div class = "row">
			
			<div class="col-md-8 form-group">
				<label for="city">City:</label>
				<input type="text" class="form-control" id="city" name="city" placeholder="City">
			</div>
		</div>
		
		<!-- State, zip -->
		<div class = "row">
			
			<div class="col-md-4 form-group">
				<label for="state">State:</label>
				<input type="text" class="form-control" id="state" name="state" value="IL">
			</div>
			
			<div class="col-md-4 form-group">
				<label for="zip_code">Zip Code:</label>
				<input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Add Site</button>
		</div>
	
	</div>
</form>	

<!-- Form to update a site. -->
<form action = "updateSite.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Update a Site</b></h3>
		
		<p>Select a site to update:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get sites based on users permissions.
					$permissions = $db->{'getUserPermissions'}($_SESSION['user_name']);
					echo $db->{'getSiteSelectByPermissions'}($permissions);
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Update Site</button>
		</div>
	
	</div>
</form>	

<!-- Form to remove a site. -->
<form action = "deleteSite.php" method = "POST">
	<div class = "container volunteer">

		<h3><b>Remove a Site</b></h3>
		
		<p>Select a site to remove:</p>
		
		<div class="row">
			
			<div class="col-md-8 form-group">
				
				<?php
					// Get sites based on users permissions.
					$permissions = $db->{'getUserPermissions'}($_SESSION['user_name']);
					echo $db->{'getSiteSelectByPermissions'}($permissions);
				?>
				
			</div>
		</div>
		
		<br />
		<button class = "btn btn-sm btn-primary btn-block" type = "submit"  name = "submission"  >Remove Site</button>
		</div>
	
	</div>
</form>	


<?php

	// Include footer html.
	include('php/footer.php');

?>

</body>
</html>
		
		