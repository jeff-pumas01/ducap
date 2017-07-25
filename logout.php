<?php
session_start();
//If user not logged in redirect 
if(!isset($_SESSION['user_name'])) {
	header("Location: login.php");
} 
include('php/classes/DB.class.php');

unset($_SESSION['user_name']);
session_destroy();
header("refresh:1;url=login.php");
include_once('php/header.php');
?>
		<!-- Alert -->
		<div class="container">
			<br>
			<div class="alert text-center alert-info">
				<h3>Successfully logged out.</h3>		
			</div>
		</div>
<?php
include_once('php/footer.php');
?>

