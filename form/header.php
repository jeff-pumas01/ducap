<?php
	session_start();
	$user = $_SESSION['user_name'];
	//Show active nav link
	function echoActiveClassIfRequestMatches($requestUri)
	{
	    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
	    if ($current_file_name == $requestUri) {
		echo 'class="active"';
	    }
	}
	//Do not show nav links for login and sign up pages
	function noLinksNav() {
	    $fileName = basename($_SERVER['REQUEST_URI'], ".php");
	    //Return true if user is viewing signup or login pages
	     if ($fileName == "signup" || $fileName == "login" || $fileName == "childReg" || $fileName == "volunteerRegistration"|| $fileName == "volunteerRegistration2"|| $fileName == "volunteerRegistration3"|| $fileName == "volunteerRegistration4") {
		   return true; 
	    } else {
		   return false;
	    }
	}
?>
<!DOCTYPE html>
<!-- DuCap - Software Engineering Project -->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DuCap</title>
		<!-- Matching favicon from ducap.org -->
		<link rel="shortcut icon" href="http://ducap.org/wp-content/themes/maog/images/favicon.png">

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/custom-stylesheet.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://ducap.org/" target="_blank">DuCap</a>
			</div>

			<?php
			
			//if not on login or signup page show other links
			if(!noLinksNav()) { ?>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php if($_SESSION['type'] == "volunteer") { ?>
						<li <?=echoActiveClassIfRequestMatches("attendance")?>><a href="attendance.php">Attendance</a></li>
						<li><a href="logout.php"><b>Logout</b></a></li>
					<?php } else if ($_SESSION['type'] == "admin") {  ?>
						<li <?=echoActiveClassIfRequestMatches("attendance")?>><a href="attendance.php">Attendance</a></li>
						<li><a href="#">Reports</a></li>
						<li><a href="admin_cp.php#">Control Panel</a></li>
						<li><a href="logout.php"><b>Logout</b></a></li>
					<?php } ?>
				</ul>
				<!-- Show current logged in user -->
				<?
				if(isset($_SESSION['user_name'])) {?>
					<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><b><?php echo $user;?><b></a></p>
				<?}?>

			</div><!-- /.navbar-collapse -->
			<!-- Collect the nav links, forms, and other content for toggling -->
			<?php 
			} else { ?>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li <?=echoActiveClassIfRequestMatches("volunteerRegistration")?>><a href="volunteerRegistration.php">Volunteer</a></li>
						<li <?=echoActiveClassIfRequestMatches("childReg")?>><a href="childReg.php">Register Child</a></li>
					</ul>

					<u2 class="nav navbar-nav navbar-right">
						<li <?=echoActiveClassIfRequestMatches("login")?>><a href="login.php">Login</a></li>
						<li <?=echoActiveClassIfRequestMatches("signup")?>><a href="signup.php">Register</a></li>
					</u2>
				</div>
			<?php }?>
		</div>
	</nav>

	<!-- Ducap Logo -->
	<img src="imgs/DuCAP-Logo.png" class="center-block logo" alt="DuCap Logo" height="100px" width="233px">
