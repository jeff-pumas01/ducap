<!-- DuCap - Software Engineering Project -->
<?php
	//Start session
	session_start();
	//If user is already logged in redirect 
	if(isset($_SESSION['user_name'])) {
		header("Location: admin_cp.php");
	} 

	//Include header html
	include_once('php/header.php');
	//Include db
	include('php/classes/DB.class.php');


	$db = new DB();
	//Superglobals
	$userName = isset($_POST['username']) ? $_POST['username'] : '';
	$pwd = isset($_POST['password']) ? $_POST['password'] : '';

	if(isset($_POST['login'])) {
		$usr_name = $db->loginUser($userName, $pwd);
		if ($usr_name) {
			if (!isset($_SESSION['user_name'])) {
				$_SESSION['user_name'] = $usr_name;
				header('Location: admin_cp.php');
				exit;
			} 
		}else { ?>
			<div class="container">
				<br>
				<div class="alert text-center alert-danger">
					<h3>Invalid login or password.</h3>		
				</div>
			</div>
		<?php }
	}


?>

	<!-- Content -->
	<div class="container login">
		<br>
		<form action="login.php" method="POST">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>

			<br>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			<br>
			<button class="btn btn-sm btn-primary btn-block" type="submit" name="login">Login</button>
			<button class="btn btn-sm btn-primary btn-block" type="reset" name="reset">Reset</button>
		</form>
	</div> 
	<!-- End of Content -->


<?php
	//Include footer html
	include('php/footer.php');
?>
