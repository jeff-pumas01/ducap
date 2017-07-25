<html>
<head>
	<title> Ducap Sites</title>
</head>

<body>


<?php

	/**
	 *	This program allows the user to print the 
	 *	sites , address and upcoming events.
	 */
	 
	session_start();
	

	
	 
	include('php/classes/DB.class.php');
	include('php/header.php');

	// Connect to database.
	$db = new DB();
	
	
?>


<!-- table and content for site name and addreess -->
<div class = "container header">
	<h3><center>Ducap Sites and Address<center></h3>
	<br/>
</div> 

<table border ="1" width ="550" height ="275" align = "center">
	<tr> 
		<th><b><center>Site Name<center><b></th>
		<th><b><center>Site Address<center><b></th>
	</tr>

	<tr> 
		<td>Bolingbrook Park District</td>
		<td>201 Recreation Dr, Bolingbrook, IL 60440 </td>
	</tr>

	<tr> 
		<td>Bolingbrook Library</td>
		<td>300 W Briarcliff Rd, Bolingbrook, IL 60440 </td>
	</tr>

	<tr> 
		<td>Romeoville Library</td>
		<td>201 Normantown Rd, Romeoville, IL 60446 </td>
	</tr>

	<tr> 
		<td>Addison Trail High School</td>
		<td>213 N Lombard Rd, Addison, IL 60101</td>
	</tr>

	<tr> 
		<td>Glenbard East High School</td>
		<td>1014 S Main St, Lombard, IL 60148</td>
	</tr>
	<tr> 
		<td>Hinsdale south High School</td>
		<td>7401 Clarendon Hills Rd, Darien, IL 60561 </td>
	</tr>
	<tr> 
		<td>Sipley Elementary School</td>
		<td>2806 83rd St, Woodridge, IL 60517 </td>
	</tr>

	<tr> 
		<td>Lemont Park District</td>
		<td> 16028 W 127th St, Lemont, IL 60439 </td>
	</tr>

	<tr> 
		<td>Lisle Park District</td>
		<td>1925 Ohio St, Lisle, IL 60532 </td>
	</tr>
	<tr> 
		<td>Irene king Elementary School</td>
		<td>Eaton Ave, Romeoville, IL 60446 </td>
	</tr>

</table>

<!-- table and content for up coming events -->
<div class = "container header">
	<h3><center>Up comming events<center></h3>
	<br/>
</div> 


<table border ="1" width ="550" height ="255" align ="center">
	<tr> 
		<th><b><center>Date<center><b></th>
		<th><b><center>Event<center><b></th>
		<th><b><center>Location<center><b></th>
	</tr>

	<tr> 
		<td>2016-10-31</td>
		<td> Halloween Bake Sales</td>
		<td>Bolingbrook Library</td>
	</tr>

	<tr> 
		<td>2016-11-01</td>
		<td>Clothes Drive</td>
		<td>Spiley Elementary School</td>
	</tr>

	<tr> 
		<td>2016-11-05</td>
		<td>Math Club </td>
		<td>Spiley Elementary School</td>
	</tr>

	<tr> 
		<td>2016-11-30</td>
		<td>Running Club </td>
		<td>Bolingbrook Park District</td>
	</tr>

	<tr> 
		<td>2016-12-01</td>
		<td>Arts and Craft </td>
		<td>Bolingbrook Park District</td>
	</tr>

	<tr> 
		<td>2016-12-02</td>
		<td>Board Games</td>
		<td>Addison Trail High School</td>
	</tr>

	<tr> 
		<td>2016-12-03</td>
		<td>Reading Club</td>
		<td>Bolingbrook Library</td>
	</tr>

	<tr> 
		<td>2016-12-03</td>
		<td>Book Club</td>
		<td>Romeoville Library</td>
	</tr>

	<tr> 
		<td>2016-12-04</td>
		<td>Scavenger Hunt </td>
		<td>Bolingbrook Park District</td>
	</tr>


</table>

</br>
</br>


<a href title = "print screen" "alt=" "print screen" onclick = "window.print();"
"target="_blank" style ="cursor:pointer;"><b><center>Print the Page<center><b></a>


<?php
	// Include footer html.
	include('php/footer.php');
?>

</body>
</html>
		