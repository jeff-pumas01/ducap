<html>
<title> Ducap Activity Report </title>


<?php
	 
	session_start();
	
	//If user not logged in, redirect.
	if(!isset($_SESSION['user_name'])) {
		header("Location: login.php");
	} 
	
	 
	include('php/classes/DB.class.php');
	include('php/header.php');
	// Connect to database.
	$db = new DB();
	
	


$link = mysql_connect("localhost", "anthonymatsas", "cs440-2901");
mysql_select_db("cs440team2", $link);

$result = mysql_query("SELECT * FROM Volunteer_Registration", $link);
$num_rows = mysql_num_rows($result);



?>
	<head>
		
		<link rel ="stylesheet" type ="text/css" href ="css/style.css"/>
<style>
#reporting{
 background: url("http://cs.lewisu.edu/~syedahasan/imgs/reports-bck.png"); <!-- THIS? -->
 background-size: 100% 100%;  //
 background-repeat: no-repeat;
 height:600px;
 width:670px;
 max-width:670px;
 
}

</style>	

	</head>
<!--  Will need to change the code below to correctly accept data that coems when a report is generated.-->
    <body>
	    <div class ="container">
		<div class ="wrapper">
	<Center>	    <h1> Ducap Activity Report</h1>
		 </div>
<Center>		<div id="reporting">
		

<br><br><br>
		 <table width="536"   height="300" border="0" id="Reports" align="right">
		   <tr>
		     <td width="347">Total Number of Active Volunteers this Month (new & old combined)</td>
		     <td width="179"><?php
$query = mysql_query("select count(*) as total from Volunteer_Registration");
$result = mysql_fetch_array($query);
echo $result['total'];
?></td>
	       </tr>
		   <tr>
		     <td>Number of New Volunteers Active this Month</td>
		     		     <td><?php
$query = mysql_query("select count(*) as total from Volunteer_Registration");
$result = mysql_fetch_array($query);
echo $result['total'];
?></td>
	       </tr>
           		     <td>Total Number of Volunteers hours this month</td>
		     <td><?php
$query = mysql_query("select sum(totalHours) as grandHours from Volunteer_Registration");
$result = mysql_fetch_array($query);
echo $result['grandHours'];
?></td>
	       </tr>

</table>
</div>

</div>
</body>

<?php

//Include footer html
include('php/footer.php');

?>

</html>
