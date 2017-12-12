<!--
	DB.class.php
	Version 1.9
	Heather Bird
	2016/12/16 
-->

<?php
class DB {
	
	
	
	/**
	 *	Register a new Administrator in the system.
	 *	@param {string}		admin_id	Log in ID
	 *	@param {string}		name		Name of user
	 *	@param {string}		email		E-mail address
	 *	@param {string}		phone		Phone number
	 *	@param {string}		password	Encrypted password
	 *	@return {bool}					State of success
	 */
	function addAdministrator($admin_id,$name,$email,$phone,$password) {
		$cn = $this->connect();
		$admin_id = $cn->real_escape_string($admin_id);
		$name = $cn->real_escape_string($name);
		$email = $cn->real_escape_string($email);
		$phone = $cn->real_escape_string($phone);
		$password = $cn->real_escape_string($password);
		
		// TO DO Search Administrator table first to make sure Administrator is not
		// already registered!

		$sql_insert = "INSERT INTO Users (admin_id,name,email,phone,password) VALUES ('$admin_id','$name','$email','$phone','$password')";
		$stmt = $cn->prepare($sql_insert);
		$stmt->bind_param("sssss",$admin_id,$name,$email,$phone,$password);
		$stmt->execute();
		$stmt->close();
		$cn->close();
		return $result;
	}
	
	/**
	 *	Register a new Attendance record in the system.
	 *	@param {int}		p_id		ID of Participant (foreign key)
	 *	@param {int}		e_id		ID of Event (foreign key)
	 *	@return {bool}					State of success
	 */
	function addAttendance($p_id,$e_id) {
		$cn = $this->connect();
		$p_id = $cn->real_escape_string($p_id);
		$e_id = $cn->real_escape_string($e_id);
		
		// Make sure the participant_id exists.
		$sql_checkPID = "SELECT * FROM Participants WHERE participant_id = '$p_id'";
		$result = $cn->query($sql_checkPID);
		$p_id_found = false;
		while($row = $result->fetch_assoc())
			$p_id_found = true;

		// Make sure the event id exists.
		$sql_checkEID = "SELECT * FROM Events WHERE event_id = '$e_id'";
		$result = $cn->query($sql_checkEID);
		$e_id_found = false;
		while($row = $result->fetch_assoc())
			$e_id_found = true;
		
		// Make sure a row does not already exist in Attendance table.
		

		if (!$p_id_found) {
			echo "ERROR: Partipiciant ID $p_id does not exist!";
			$result = false;
			
		} else if (!$e_id_found) {
			echo "ERROR: Event ID $e_id does not exist!";
			$result = false;
			
		} else {
			
			// Check if this attendance info is already in database.
			$check_query = "SELECT * FROM Attendance WHERE participant_id = $p_id AND event_id = $e_id;";
			$check_result = $cn->query($check_query);
			
			if ($check_result->fetch_assoc() == NULL) {
					
				$sql_insert = "INSERT INTO Attendance (participant_id, event_id) VALUES ($p_id, $e_id)";
				$stmt = $cn->prepare($sql_insert);//prepare the statement
				$stmt->bind_param("ss",$p_id,$e_id);//bind variables
				$stmt->execute();//execute the statement
				$stmt->close();//close the statement
				$result = true;
				
			} else {
				$result = true;
			}
			
		}
		
		$cn->close();
		return $result;
	}
	
	/**
	 *	Remove an Attendance record in the system.
	 *	@param {int}		p_id		ID of Participant (foreign key)
	 *	@param {int}		e_id		ID of Event (foreign key)
	 *	@return {bool}					State of success
	 */
	function removeAttendance($p_id,$e_id) {
		$cn = $this->connect();
		$p_id = $cn->real_escape_string($p_id);
		$e_id = $cn->real_escape_string($e_id);
		
		// Make sure the participant_id exists.
		$sql_checkPID = "SELECT * FROM Participants WHERE participant_id = '$p_id'";
		$result = $cn->query($sql_checkPID);
		$p_id_found = false;
		while($row = $result->fetch_assoc())
			$p_id_found = true;

		// Make sure the event id exists.
		$sql_checkEID = "SELECT * FROM Events WHERE event_id = '$e_id'";
		$result = $cn->query($sql_checkEID);
		$e_id_found = false;
		while($row = $result->fetch_assoc())
			$e_id_found = true;

		if (!$p_id_found) {
			echo "ERROR: Partipiciant ID $p_id does not exist!";
			$result = false;
			
		} else if (!$e_id_found) {
			echo "ERROR: Event ID $e_id does not exist!";
			$result = false;
			
		} else {
			
			// Check if this attendance info is already in database.
			$check_query = "SELECT * FROM Attendance WHERE participant_id = $p_id AND event_id = $e_id;";
			$check_result = $cn->query($check_query);
			
			if ($check_result->fetch_assoc() != NULL) {
					
				$sql_del = "DELETE FROM Attendance WHERE participant_id=$p_id AND event_id=$e_id;";

				$cn->query($sql_del);
			}
			$result = true;
		}
		
		$cn->close();
		return $result;
	}
	



	/**
	 *	Register a new Guardianship in the system.
	 *	@param {int}		p_id		ID of Participant (foreign key)
	 *	@param {string}		lg_id		ID of Legal Guardian (foreign key)
	 *	@return {bool}					State of success
	 */
	function addGuardianship($p_id,$lg_id) {
		$cn = $this->connect();
		$p_id = $cn->real_escape_string($p_id);
		$lg_id = $cn->real_escape_string($lg_id);
		
		// Make sure the participant_id exists.
		$sql_checkPID = "SELECT * FROM Participants WHERE participant_id = '$p_id'";
		$result = $cn->query($sql_checkPID);
		$p_id_found = false;
		while($row = $result->fetch_assoc())
			$p_id_found = true;

		// Make sure the legal_guardian_id exists.
		$sql_checkLGID = "SELECT * FROM Participant_Legal_Guardians WHERE id = '$lg_id'";
		$result = $cn->query($sql_checkLGID);
		$lg_id_found = false;
		while($row = $result->fetch_assoc())
			$lg_id_found = true;

		if (!$p_id_found) {
			echo "ERROR: Partipiciant ID $p_id does not exist!";
			$result = false;
			
		} else if (!$lg_id_found) {
			echo "ERROR: Legal Guardian ID $lg_id does not exist!";
			$result = false;
			
		} else {
			
			$sql_insert = "INSERT INTO Guardianship (participant_id, legal_guardian_id) VALUES ($p_id, $lg_id)";
			$stmt = $cn->prepare($sql_insert);//prepare the statement
			$stmt->bind_param("ss",$p_id, $lg_id);//bind variables
			$stmt->execute();//execute the statement
			$stmt->close();//close the statement
			$result = true;
			
		}
		
		$cn->close();
		return $result;
	}
	
	/**
	 *	Register a new Volunteer in the system.
	 *	@param {string}		lname		Last name
	 *	@param {string}		fname		First name
	 *	@param {string}		dob			Date of birth
	 *	@param {string}		address		Street address
	 *	@param {string}		city		City
	 *	@param {string}		state		State
	 *	@param {string}		zip			Zip code
	 *	@param {string}		h_num		Home phone
	 *	@param {string}		w_num		Work phone
	 *	@param {string}		m_num		Mobile phone
	 *	@param {string}		email		Email
	 *	@param {int}		siteID		Site ID to volunteer at (foreign key)
	 *	@param {string}		pword		Log in password
	 *	@param {string}		uname		Log in user name
	 *	@return {bool}					State of success
	 */
	function addVolunteer($lname,$fname,$dob,$address,$city,$state,$zip,$h_num,$w_num,$m_num,$email,$siteID,$pword,$uname) {
		$cn = $this->connect();
		$lname = $cn->real_escape_string($lname);
		$fname = $cn->real_escape_string($fname);
		$dob = $cn->real_escape_string($dob);
		$address = $cn->real_escape_string($address);
		$city = $cn->real_escape_string($city);
		$state = $cn->real_escape_string($state);
		$zip = $cn->real_escape_string($zip);
		$h_num = $cn->real_escape_string($h_num);
		$w_num = $cn->real_escape_string($w_num);
		$m_num = $cn->real_escape_string($m_num);
		$email = $cn->real_escape_string($email);
		$pword = $cn->real_escape_string($pword);
		$uname = $cn->real_escape_string($uname);
		
		// Search Volunteers table first to make sure Volunteer is not already registered!
		if ($this->getVolunteerID($lname, $fname, $siteID) == -1) {

			$sql_insert = "INSERT INTO Volunteers (last_name, first_name, date_of_birth, address, city, state, zip_code, home_number, work_number, mobile_number, email, site_id, password, username) VALUES ('$lname','$fname','$dob','$address','$city','$state','$zip','$h_num','$w_num','$m_num','$email',$siteID,'$pword','$uname')";
			$stmt = $cn->prepare($sql_insert);//prepare the statement
			$stmt->bind_param("ssssssssssssss",$lname, $fname, $dob, $address, $city, $state, $zip, $h_num, $w_num, $m_num, $email, $siteID, $pword, $uname);//bind variables
			$stmt->execute();//execute the statement
			$stmt->close();//close the statement

			
		} else {
			
			$result = "Error: Volunteer named $fname $lname is already registered!<br /><br />";
			echo $result;
		}		
		
		$cn->close();
		return $result;
	}
	
	/**
	 *	Add a new Emergency Contact for a Volunteer in the system.
	 *	@param {string}		lname		Last name
	 *	@param {string}		fname		First name
	 *	@param {string}		phone		Phone number
	 *	@param {string}		address		Street address
	 *	@param {string}		city		City
	 *	@param {int}		vol_id		ID of Volunteer (foreign key)
	 *	@return {bool}					State of success
	 */
	function addVolunteerEmerContact($lname,$fname,$phone,$address,$city,$vol_id) {
		$cn = $this->connect();
		$lname = $cn->real_escape_string($lname);
		$fname = $cn->real_escape_string($fname);
		$phone = $cn->real_escape_string($phone);
		$address = $cn->real_escape_string($address);
		$vol_id = $cn->real_escape_string($vol_id);
		
		// TO DO Search Volunteer_Emergency_Contact table first to make sure 
		// info is not already in system!

		$sql_insert = "INSERT INTO Volunteer_Emergency_Contact (last_name, first_name, number, address, city, volunteer_id) VALUES ('$lname','$fname','$phone','$address','$city','$vol_id')";
		$stmt = $cn->prepare($sql_insert);//prepare the statement
		$stmt->bind_param("ssssss",$lname, $fname, $phone, $address, $city, $vol_id);//bind variables
		$stmt->execute();//execute the statement
		$stmt->close();//close the statement
		$result = $cn->query($sql_insert);
		$cn->close();
		return $result;
	}
	

	/**
	 *	Connect to the database.
	 *	Make sure this is called on every page that needs to use the database.
	 */
	function connect() {
		
		// Create connection.
		$db_name = "cs440team2";
		$db_user = "anthonymatsas";
		$db_pass = "cs440-2901";
		$db_host = "localhost";
		$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die ("Error: Could not connect to database server!");
		$link = mysql_connect("localhost", "anthonymatsas", "cs440-2901");
mysql_select_db("cs440team2", $link);

		return $conn;
	}
		function delVol() {
		
		// Create connection.
		$db_name = "cs440team2";
		$db_user = "anthonymatsas";
		$db_pass = "cs440-2901";
		$db_host = "localhost";
		$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die ("Error: Could not connect to database server!");

		return $conn;
	}

	/**
	 *	Delete row for a given Event and related rows in other tables (Attendance).
	 *	@param {int}		id		Event's unique ID
	 *	@return {bool}				Success
	 */
	function deleteEvent($id) {
		$cn = $this->connect();
		
		// First, delete related rows in other tables (Attendance).
		$sql_query = "DELETE FROM Attendance WHERE event_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete attendance!");
		
		// Now, the database should allow you to delete the event.
		$sql_query = "DELETE FROM Events WHERE event_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete event!");
		
		$cn->close();
		
		if ($result)
			echo "The event was successfully deleted.";
		
		return $result;
	}

	/**
	 *	Delete row for a given Participant and related rows in other tables (Guardianship, Attendance).
	 *	@param {int}		id		Participant's unique ID
	 *	@return {bool}				Success
	 */
	function deleteParticipant($id) {
		$cn = $this->connect();
		
		// Delete related rows in other tables (Guardianship, Attendance).
		$sql_query = "DELETE FROM Guardianship WHERE participant_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete guardianship records for the participant!");
		
		// TO DO: Delete the legal guardian if there are no more Guardianship records for them.
		
		$sql_query = "DELETE FROM Attendance WHERE participant_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete attendance records for the participant!");
		
		// Now, the database should allow you to delete the participant.
		$sql_query = "DELETE FROM Participants WHERE participant_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete participant!");
		
		if ($result)
			echo "The participant was successfully deleted.";
		
		$cn->close();
		
		return $result;
	}

	/**
	 *	Delete row for a given Site and related rows in other tables (Events, Participants).
	 *	@param {int}		id		Site's unique ID
	 *	@return {bool}				Success
	 */
	function deleteSite($id,$uStr) {
		$cn = $this->connect();
		
		// Delete related rows in other tables (Events, Participants).
		$sql_query = "DELETE FROM Events WHERE site_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete event records for the site!");
		
		$sql_query = "DELETE FROM Participants WHERE site_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete participant records for the site!");
		
		// Now, the database should allow you to delete the site.
		$sql_query = "DELETE FROM Sites WHERE site_id = $id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete site!");
		
		$deletePermissionsQuery = 'UPDATE Users SET Site = replace(Site, "-' . $id .'","") WHERE admin_id = "' . $uStr . '"';
		mysqli_query($cn,$deletePermissionsQuery);
		if ($result)
			echo "The site was successfully deleted.";
		
		$cn->close();
		
		return $result;
	}
	
	
	
	
	function deleteVolunteer($id) {
		$cn = $this->connect();
		
		// Delete related rows in other tables (Guardianship, Attendance).
		$sql_query = "delete from Volunteer_Registration where ID=$id";
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not delete volunteer record!");
		
		if ($result)
			echo "The volunteer was successfully deleted.";
		
		$cn->close();
		
		return $result;
	}

	
	/**
	 *	Get HTML that creates a select list of Participant IDs and names 
	 *	who attended a given event (for attendance removal).
	 *	The id/name of each option is the Participant ID.
	 *	@return {int}			event_id
	 *	@return {string}				HTML select list
	 */
	function getAttendanceSelect($event_id) {
		$cn = $this->connect();
		$sql_query = "SELECT p.participant_id, p.last_name, p.first_name FROM Participants p JOIN Attendance a ON p.participant_id = a.participant_id WHERE a.event_id=$event_id ORDER BY participant_id";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch participant data!");
		$cn->close();
		
		
		$out = "<select name='attendance_p_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$participant_id' id='$participant_id' value='$participant_id'>$last_name, $first_name</option>";
		}
		$out .= "</select>";
		
		return $out;
	}

	/**
	 *	Get HTML that creates a table of Participant IDs and names 
	 *	who attended a given event.
	 *	The id/name of each option is the Participant ID.
	 *	@return {int}			event_id
	 *	@return {string}				HTML select list
	 */
	function getAttendanceTable($event_id) {
		$cn = $this->connect();
		$sql_query = "SELECT p.participant_id, p.last_name, p.first_name FROM Participants p JOIN Attendance a ON p.participant_id = a.participant_id WHERE a.event_id=$event_id ORDER BY participant_id";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch participant data!");
		$cn->close();
		
		$out = "<table name='table_attendance' class='table table-striped' >";
		$out .= "<thead><tr><th>ID</th><th>Name</th></tr></thead>";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<tr>
				<td>$participant_id</td>
				<td>$last_name, $first_name</td>
			</tr>";
		}
		
		$out .= "</table>";
		
		return $out;
	}


	/**
	 *	Search for the ID of an Event.
	 *	@param {int}		site_id
	 *	@param {string}		title
	 *	@param {string}		date
	 *	@return {int}					Either the event's ID, or -1 if none found.
	 */
	function getEventID($site_id, $title, $date) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Events WHERE site_id = $site_id AND title = '$title' AND date = '$date'";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			return $row['event_id'];
		}
		
		// If there is no matching site, return -1.
		return -1;
	}

	/**
	 *	Get all data of a given Event.
	 *	@param {int}		event_id	Event's unique ID
	 *	@return {array}					All data stored for the Event
	 */
	function getEventInfo($event_id) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Events WHERE event_id = $event_id";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch Event data!");
		$row = mysqli_fetch_assoc($result);
		$cn->close();
		
		return $row;
	}

	/**
	 *	Get HTML that creates a select list of Event dates and names.
	 *	@return {string}				HTML select list
	 */
	function getEventSelect() {
		$cn = $this->connect();
		//$sql_query = "SELECT event_id, date, title FROM Events ORDER BY date";
		$sql_query = "SELECT e.event_id, e.date, e.title, s.site_name FROM Events e JOIN Sites s on e.site_id = s.site_id ORDER BY e.date";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch event data!");
		$cn->close();
		
		$out = "<select name='event_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$event_id' id='$event_id' value='$event_id'>$date $title -- $site_name</option>";
		}
		$out .= "</select>";
		
		return $out;
	}
	/**
	 *	Get HTML that creates a select list of Event dates and names based on permissions granted to the user.
	 *	@return {string}				HTML select list
	 */
	function getEventSelectByPermissions($permissions) {
	
		$cn = $this->connect();
		$sql_query = "SELECT e.event_id, e.date, e.title, s.site_name FROM Events e JOIN Sites s on e.site_id = s.site_id WHERE (";
		for ($i = 0; $i <= count($permissions); $i++){
			if ($i < count($permissions)){
				$site = $permisisons[i];
				$sql_query .= "s.site_id = '$permissions[$i]' OR ";
			}
			if ($i == count($permissions)){
				$site = $permisisons[i];
				$sql_query .= "s.site_id = '$permissions[$i]' )";
			}
		}
		$sql_query .= "ORDER BY date";	
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch event data!");
		$cn->close();
		
		$out = "<select name='event_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$event_id' id='$event_id' value='$event_id'>$date $title -- $site_name</option>";
		}
		$out .= "</select>";
		return $out;
	}
	
	

	/**
	 *	Get HTML that creates a select list of Event dates and names for a given site.
	 *	@param {int}		site_id
	 *	@return {string}				HTML select list
	 */
	function getEventSelectForSite($site_id) {
		$cn = $this->connect();
		$sql_query = "SELECT event_id, date, title FROM Events WHERE site_id=$site_id ORDER BY date";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch event data!");
		$cn->close();
		
		$out = "<select name='event_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$event_id' id='$event_id' value='$event_id'>$date $title</option>";
		}
		$out .= "</select>";
		
		return $out;
	}

	/**
	 *	Search for the ID of a Legal Guardian.
	 *	@param {string}		lname	Last name
	 *	@param {string}		email	email
	 *	@return {int}				Either the ID, or -1 if none found.
	 */
	function getLegalGuardianID($lname, $email) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Participant_Legal_Guardians WHERE last_name = '$lname' AND email = '$email'";
		
		//echo "Testing query: $sql_query<br />";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			//echo " -- MATCH FOUND<br />";
			return $row['id'];
		}
		
		// If there is no matching row, return -1.
		//echo " -- NO MATCHES<br />";
		return -1;
	}

	/**
	 *	Search for the ID of a Participant.
	 *	@param {string}		lname	Last name
	 *	@param {string}		fname	First name
	 *	@param {int}		siteID	Site the Participant is registered for
	 *	@return {int}				Either the participant's ID, or -1 if none found.
	 */
	function getParticipantID($lname, $fname, $siteID) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Participants WHERE last_name = '$lname' AND first_name = '$fname' AND site_id = $siteID";
		
		//echo "Testing query: $sql_query<br />";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			//echo " -- MATCH FOUND<br />";
			return $row['participant_id'];
		}
		
		// If there is no matching participant, return -1.
		//echo " -- NO MATCHES<br />";
		return -1;
	}

	/**
	 *	Get all data of a given Participant.
	 *	@param {int}		pID		Participant's unique ID
	 *	@return {array}				All data stored for the participant
	 */
	function getParticipantInfo($pID) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Participants WHERE participant_id = $pID";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch participant data!");
		$row = mysqli_fetch_assoc($result);
		$cn->close();
		
		return $row;
	}

	/**
	 *	Get HTML that creates a select list of Participant IDs and names.
	 *	The id/name of each option is the Participant ID.
	 *	@return {string}				HTML select list
	 */
	function getParticipantSelect() {
		$cn = $this->connect();
		$sql_query = "SELECT participant_id, last_name, first_name FROM Participants ORDER BY last_name";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch participant data!");
		$cn->close();
		
		$out = "<select name='participant_id'>";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$participant_id' value='$participant_id'>$last_name, $first_name</option>";
		}
		
		$out .= "</select>";
		
		return $out;
	}

	/**
	 *	Get HTML that creates a select list of Participant IDs and names for a given site.
	 *	The id/name of each option is the Participant ID.
	 *	@return {int}			site_id
	 *	@return {string}				HTML select list
	 */
	function getParticipantSelectForSite($site_id) {
		$cn = $this->connect();
		$sql_query = "SELECT participant_id, last_name, first_name FROM Participants WHERE site_id=$site_id ORDER BY participant_id";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch participant data!");
		$cn->close();
		
		$out = "<select name='participant_id'>";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$participant_id' value='$participant_id'>$last_name, $first_name</option>";
		}
		
		$out .= "</select>";
		
		return $out;
	}

	/**
	 *	Get all data of a given Site.
	 *	@param {int}		sID		Site's unique ID
	 *	@return {array}				All data stored for the Site
	 */
	function getSiteInfo($sID) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Sites WHERE site_id = $sID";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch site data!");
		$row = mysqli_fetch_assoc($result);
		$cn->close();
		
		return $row;
	}

	/**
	 *	Search for the ID of a Site.
	 *	@param {string}		site_name
	 *	@param {string}		address
	 *	@param {string}		zip_code
	 *	@return {int}					Either the site's ID, or -1 if none found.
	 */
	function getSiteID($site_name, $address, $zip_code) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Sites WHERE site_name = '$site_name' AND address = '$address' AND zip_code = '$zip_code'";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			return $row['site_id'];
		}
		
		// If there is no matching site, return -1.
		return -1;
	}

	/**
	 *	Get HTML that creates a select list of Site IDs and names.
	 *	The id/name of each option is the site ID, since it's the primary key.
	 *	@return {string}				HTML select list
	 */
	function getSiteSelect() {
		$cn = $this->connect();
		$sql_query = "SELECT site_id, site_name FROM Sites ORDER BY site_id";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch site data!");
		$cn->close();
		
		$out = "<select name='site_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option id='$site_id' value='$site_id'>$site_name</option>";
		}
		$out .= "</select>";
		
		return $out;
	}
	
	
	/** OVERLOADED FOR PERMISSIONS
	*	Get HTML that creates a select list of Site IDs and names.
	*	The id/name of each option is the site ID, since it's the primary key.
	*	@return {string}				HTML select list
	*/
	function getSiteSelectByPermissions($permissions) {
		$cn = $this->connect();
		$sql_query = "SELECT site_id, site_name FROM Sites WHERE ";
		for ($i = 0; $i <= count($permissions); $i++){
			if ($i < count($permissions)){
				$site = $permisisons[i];
				$sql_query .= "site_id = '$permissions[$i]' OR ";
			}
			if ($i == count($permissions)){
				$site = $permisisons[i];
				$sql_query .= "site_id = '$permissions[$i]' ";
			}
		}
		
		$sql_query .= "ORDER BY site_id";
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch site data!");
		$cn->close();
		
		$out = "<select name='site_id' >";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$site_id' id='$site_id' value='$site_id'>$site_name</option>";
		}
		$out .= "</select>";
		
		return $out;
	}

	/**
	 *	Search for the ID of a Volunteer.
	 *	@param {string}		lname	Last name
	 *	@param {string}		fname	First name
	 *	@param {int}		siteID	Site the Volunteer is registered for
	 *	@return {int}				Either the Volunteer's ID, or -1 if none found.
	 */
	function getVolunteerID($lname, $fname, $siteID) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Volunteers WHERE last_name = '$lname' AND first_name = '$fname' AND site_id = $siteID";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			//echo " -- MATCH FOUND<br />";
			return $row['volunteer_id'];
		}
		
		// If there is no matching Volunteer, return -1.
		//echo " -- NO MATCHES<br />";
		return -1;
	}
	function getVolunteerSelect() {
		$cn = $this->connect();
		$sql_query = "SELECT ID, last_name, first_name FROM Volunteer_Registration ORDER BY last_name";
		
		$result = $cn->query($sql_query);
		$result = mysqli_query($cn, $sql_query) or die ("Error: Could not fetch volunteer data!");
		$cn->close();
		
		$out = "<select name='ID'>";
		while ($row = mysqli_fetch_assoc($result)) {
			extract($row);
			$out .= "<option name='$ID' value='$ID'>$last_name, $first_name</option>";
		}
		
		$out .= "</select>";
		
		return $out;
	}
	
	
	/**
	 *	Log in an Administrator or Volunteer.
	 *	@param {string}		uStr	User name
	 *	@param {string}		pStr	Password before encryption
	 */
	function loginUser($uStr, $pStr) {
		$cn = $this->connect();
	
		//Clean input
		$uStr = $cn->real_escape_string($uStr);
		$pStr = $cn->real_escape_string($pStr);
	 
		//Generate hashed password
		$hashedPassword = crypt($pStr,'1234');
		$admin_sql = "SELECT * FROM Users WHERE admin_id=\"$uStr\" AND password=\"$hashedPassword\"";
		$vol_sql = "SELECT * FROM Volunteers WHERE username=\"$uStr\" AND password=\"$hashedPassword\"";
		$vol_result = $cn->query($vol_sql);
		$admin_result = $cn->query($admin_sql);
	 
		if($admin_result->num_rows > 0) {
			$_SESSION['type'] = "admin";
			while($admin_row = $admin_result->fetch_assoc()) {
				return $admin_row['admin_id'];
			}	
		} else if($vol_result->num_rows > 0) {
			$_SESSION['type'] = "volunteer";
			while($vol_row = $vol_result->fetch_assoc()) {
				if($vol_row['active'] == 1) {
					return $vol_row['username'];
				}
			}	
		}
		$cn->close();
	}
	
	/**
	 *	gets sites the user is assigned to.
	 *
	 */
	function getUserPermissions($uStr) {
		$cn = $this->connect();
		$permission_result = 0;
		//Clean input
		$uStr = $cn->real_escape_string($uStr);
		$admin_sql = "SELECT Site FROM Users WHERE admin_id = \"$uStr\"";
		$permission_result = $cn->query($admin_sql);
		$Row = $permission_result->fetch_assoc();
		$userPermissions = explode("-",$Row['Site']);
		$cn->close();
		return $userPermissions;
	}
	
	/**
	 *	gets users.
	 *
	 */
	function getUsers() {	
		$cn = $this->connect();
		//Clean input
		$uStr = $cn->real_escape_string($uStr);
		$admin_sql = "SELECT admin_id, name FROM Users";
		$Users_result = $cn->query($admin_sql);
		$out = "<select name='user_info' >";
		while($Row = mysqli_fetch_assoc($Users_result)){
			extract($Row);
			$out .= "<option username='$admin_id' name='$name'>$admin_id, $name</option>";
		}
		
		$out .= "</select>";
		$cn->close();
		return $out;
		
	}
	
	/**
	*
	* Adds a site permission to a user in the User table.
	*
	*/
	function addUserPermissions($siteID,$uStr){
		if (!in_array($siteID,$this->getUserPermissions($uStr))){
			$siteID = ' ' . $siteID;
			$cn = $this->connect();
			$uStr = $cn->real_escape_string($uStr);
			
			$admin_sql = "UPDATE Users Set Site = CONCAT(Site,-$siteID) WHERE admin_id = \"$uStr\"";
			$permission_result = $cn->query($admin_sql);
			$cn->close();
			if ($permission_result){
				$out = "Succesfully added permission to " . $uStr. ".";
			}
			else{$out = "ERROR: Did not add permission to ". $uStr . ".";}
		}
		else{
			$out = $uStr. " already has permission for that site.";
			}
		echo $out;
		return 0;
	}
	
	/**
	*
	* Adds a site permission to a user in the User table.
	*
	*/
	function deleteUserPermissions($siteID,$uStr){
		if (in_array($siteID,$this->getUserPermissions($uStr))){
			$siteID = ' ' . $siteID;
			$cn = $this->connect();
			$uStr = $cn->real_escape_string($uStr);
			$str = "'" .$siteID;
			$str[1] = "-";
			$admin_sql = "UPDATE Users Set Site = replace(Site, ".$str."','') WHERE admin_id = '".$uStr."'";
			$permission_result = $cn->query($admin_sql);
			$cn->close();
			if ($permission_result){
				$out = "Succesfully removed permission for " . $uStr. ".";
			}
			
			else{
				$out = "ERROR: Did not remove permission for ". $uStr . ".";}
		}
		else{
			$out = $uStr. " does not have permission for that site.";
			}
		echo $out;
		return 0;
	}
	
	
	
	
	
	
	
	

	/**
	 *	Get an array of Participant names.
	 *	@return {string[]}
	 */
	function populateChildren() {
		$cn = $this->connect();
		$sql_query = "SELECT last_name, first_name FROM Participants;";
		
		$result = $cn->query($sql_query);
		while($row = $result->fetch_assoc()) {
			$names[] = $row;
		}
		$cn->close();

		return $names;
	}

	/**
	 *	Get an array of Site names.
	 *	@return {string[]}
	 */
	function populateSites() {
		$cn = $this->connect();
		$sql_query = "SELECT site_name FROM Sites;";
		
		$result = $cn->query($sql_query);
		while($row = $result->fetch_assoc()) {
			$sites[] = $row;
		}
		$cn->close();

		return $sites;
	}

	/**
	 *	Remove an event from the Events table.
	 *	@param {int}	event_id
	 */
	function removeEvent($event_id){
		$conn = $this->connect();

		// First, remove any rows in other tables that reference this site.
		$qryStr = "DELETE FROM Attendance WHERE event_id=$event_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Attendance records for Event $event_id!");
		
		$qryStr = "DELETE FROM Events WHERE event_id=$event_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Event $event_id!");
		$conn->close();
				
		return;		
	}
	
	/**
	 *	Remove a LegalGuardian from the Participant_Legal_Guardians table.
	 *	@param {int}	id
	 */
	function removeLegalGuardian($id){
		$conn = $this->connect();

		// First, remove any rows in other tables that reference this site.
		$qryStr = "DELETE FROM Guardianship WHERE legal_guardian_id=$id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Guardianship for Legal Guardian $id!");
		
		$qryStr = "DELETE FROM Participant_Legal_Guardians WHERE id=$id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Legal Guardian $id!");
		$conn->close();
				
		return;		
	}
	
	/**
	 *	Remove a Participant from the Participants table.
	 *	@param {int}	participant_id
	 */
	function removeParticipant($participant_id){
		$conn = $this->connect();

		// First, remove any rows in other tables that reference this site.
		$qryStr = "DELETE FROM Guardianship WHERE participant_id=$participant_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Guardianship for Participant $participant_id!");
		
		$qryStr = "DELETE FROM Participants WHERE participant_id=$participant_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Participant $participant_id!");
		$conn->close();
				
		return;		
	}
	
	/**
	 *	Remove a site from the Sites table.
	 *	@param {int}	site_id
	 */
	function removeSite($site_id){
		$conn = $this->connect();

		// First, remove any rows in other tables that reference this site.
		$qryStr = "DELETE FROM Events WHERE site_id=$site_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Events held at Site $site_id!");
		
		$qryStr = "DELETE FROM Participants WHERE site_id=$site_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Participants registered for Site $site_id!");
		
		$qryStr = "DELETE FROM Sites WHERE site_id=$site_id;";
		$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not remove Site $site_id!");
		$conn->close();
				
		return;		
	}
	
	
	/**
	 *	Verify the data for an Event and either add to system or update.
	 *	@param {assoc array}	data	Data entered in form
	 *										key = field
	 *										value = data
	 *	@param {string}			action	"insert" or "update"
	 *	@return {int}					ID or -1 if there was an error.
	 */
	function verifyEventData($data, $action) {
		$conn = $this->connect();
		
		$out = "";	// Will hold the resulting output.
		
		// Arrays used for processing.
		$blank_array = array();	// Holds the name of any blank fields.
		$bad_format = array();	// Holds the name of any unacceptable fields.
		$good_data = array();	// Holds the sanitizied data.
		
		// Array of each field in the Participant_Legal_Guardians table and its label.
		$labels_par = array("site_id"=>"Site ID", "event_id"=>"Event ID", "title"=>"Title", "date"=>"Date (mm/dd/yyyy)", "timeStart"=>"Start Time", "timeLength"=>"Length (in minutes)");
		
		// Check data submitted to form.
		foreach ($data as $field => $value) {
			
			// Check for blanks for required fields.
			if (!isset($value) && ($field != 'other_number')) {
				array_push($blank_array, $field);
				
			} else if ((($field == "site_id") || $field == ("event_id") || $field == ("timeLength")) && !preg_match("/^[0-9]{1,50}$/", $value)) {
				array_push($bad_format, $field);
				
			}
		}
		
		// If any fields are not acceptable, display error.
		if (@sizeof($blank_array) > 0) {
			$out = "<p>You didn't fill in one or more of the required fields. Please fill out:<br />";
			
			foreach($blank_array as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else if (@sizeof($bad_format) > 0) {
			
			$out = "One or more fields has information that appears to be incorrect. Please correct the format for:<br />";
			
			foreach($bad_format as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else {
			
			// Sanitize and copy data to a new array.
			foreach ($data as $field => $value) {
				
				$good_data[$field] = strip_tags(trim($data[$field]));
				$good_data[$field] = $conn->real_escape_string($good_data[$field]);
			}
			
			// Build query string based on the desired action.
			if ($action == "insert") {
				
				// Search table first to make sure Event is not already registered!
				if ($this->getEventID($good_data['site_id'], $good_data['title'], $good_data['date']) == -1) {

					$qryStr = "INSERT INTO Events (";
					
					// Add fields from form if they match up with Events fields.
					foreach ($good_data as $field => $value) { 
						if (array_key_exists($field, $labels_par))
							$qryStr .= "$field,";
					}
					// Remove the comma added after the last field.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					// Add values.
					$qryStr .= " VALUES (";
					foreach ($good_data as $field => $value) {
						
						if (array_key_exists($field, $labels_par)) {
							
							if ($field == 'event_id')
								$qryStr .= "";
							else if ($field == 'site_id')
								$qryStr .= " $value,";
							else
								$qryStr .= " '$value',";
						}
					}
					// Remove the comma added after the last value.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					
					//prepare the statement to prevent injection attacks
					//prepare the statement
					$stmt = $conn->prepare($qryStr);
					
					//bind parameters
					$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);
					
					//execute the prepared statement
					$result = $stmt->execute() or die ("ERROR: Could not add new Event!");
					
					//close connection and statement
					$conn->close();
					$stmt->close();
					
					
					if ($result)
						$out = "Information successfully entered for " . $good_data['title'] . " on " . $good_data['date'] . ".";
					
				} else {
					
					$out = "An Event named " . $good_data['title'] . " at site #" . $good_data['site_id'] . " on " . $good_data['date'] . " is already registered in the system!<br /><br />";
				}		
				
			} else if ($action == "update") {
				
				// Build query string to update row in Events table.
				$qryStr = "UPDATE Events SET";
				foreach ($good_data as $field => $value) {
					
					if (($field == 'event_id') || ($field == 'submission'))
						$qryStr .= "";
					else if ($field == 'site_id')
						$qryStr .= " $field=$value,";
					else
						$qryStr .= " $field='$value',";
				}
				
				// Remove the comma added after the last pair.
				$qryStr[strlen($qryStr) - 1] = " ";
				
				$qryStr .= "WHERE event_id=" . $good_data['event_id'] . ";";
				
				//echo "<br />$qryStr<br /><br />";
				
				//prepare the statement to prevent injection attacks
				//prepare the statement
				$stmt = $conn->prepare($qryStr);
				
				//bind parameters
				$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);
				
				//execute the prepared statement
				$result = $stmt->execute() or die ("ERROR: Could not update information for Event!");
				
				//close connection and statement
				$conn->close();
				$stmt->close();
				
				if ($result)
					$out = $good_data['title'] . " on " . $good_data['date'] . " was successfully updated for the system.";
				
			} else {
				
				$out = "ERROR: Cannot $action the data.";
			}
			
		}
		
		echo $out;
		
		// Return Event ID or -1 if there was an error.
		return $this->getEventID($good_data['site_id'], $good_data['title'], $good_data['date']);
	}

	
	/**
	 *	Verify the data for a Legal Guardian and either add to system or update.
	 *	@param {assoc array}	data	Data entered in form
	 *										key = field ('last_name')
	 *										value = data ('Bird')
	 *	@param {string}			action	"insert" or "update"
	 *	@return {int}					ID or -1 if there was an error.
	 */
	function verifyLegalGuardianData($data, $action) {
		$conn = $this->connect();
		
		$out = "";	// Will hold the resulting output.
		
		// Arrays used for processing.
		$blank_array = array();	// Holds the name of any blank fields.
		$bad_format = array();	// Holds the name of any unacceptable fields.
		$good_data = array();	// Holds the sanitizied data.
		
		// Array of each field in the Participant_Legal_Guardians table and its label.
		$labels_par = array("id"=>"ID", "last_name"=>"Last Name", "first_name"=>"First Name", "home_number"=>"Home Number", "cell_number"=>"Cell Number", "other_number"=>"Other Number", "email"=>"Email");
		
		// Check data submitted to form.
		foreach ($data as $field => $value) {
			
			// Check for blanks for required fields.
			if (!isset($value) && ($field != 'other_number')) {
				array_push($blank_array, $field);
				
			} else if ((($field == "last_name") || $field == ("first_name")) && !preg_match("/^[A-Za-z.' -]{1,50}$/", $value)) {
				// Check that text input boxes for names only accept 1-50 letters.
				array_push($bad_format, $field);
				
			} else if($field == "email") {
				/*
				// Email address must have a @ between two groups of characters.
				if (!preg_match("/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{1,50}[@][a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{2,50}$/", $value))
					array_push($bad_format, $field);
				*/
				
			} else if((($field == "home_number") || ($field == "cell_number") || ($field == "other_number")) && !preg_match("/^[0-9)( -]{7,20}(([xX]|(ext)|(ex))?[ -]?[0-9]{1,7})?$/", $value)) {
				
				array_push($bad_format, $field);
				
			}
		}
		
		// If any fields are not acceptable, display error.
		if (@sizeof($blank_array) > 0) {
			$out = "<p>You didn't fill in one or more of the required fields. Please fill out:<br />";
			
			foreach($blank_array as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else if (@sizeof($bad_format) > 0) {
			
			$out = "One or more fields has information that appears to be incorrect. Please correct the format for:<br />";
			
			foreach($bad_format as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else {
			
			// Sanitize and copy data to a new array.
			foreach ($data as $field => $value) {
				
				$good_data[$field] = strip_tags(trim($data[$field]));
				
				// Get rid of any punctuation in phone numbers.
				if (($field == "home_number") || ($field == "cell_number") || ($field == "other_number"))
					$good_data[$field] = preg_replace("/[)(.-]/", "", $good_data[$field]);
				
				$good_data[$field] = $conn->real_escape_string($good_data[$field]);
			}
			
			/*
			echo "<br /><br />NEW DATA:<br />";
			foreach ($good_data as $field => $value)
				echo "$field $value<br />";
			*/
		
			// Build query string based on the desired action.
			if ($action == "insert") {
				
				// Search table first to make sure Legal Guardian is not already registered!
				if ($this->getLegalGuardianID($good_data['last_name'], $good_data['email']) == -1) {

					$qryStr = "INSERT INTO Participant_Legal_Guardians (";
					
					// Add fields from form if they match up with Legal Guardian fields.
					foreach ($good_data as $field => $value) {
						if (array_key_exists($field, $labels_par))
							$qryStr .= "$field,";
					}
					// Remove the comma added after the last field.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					// Add values.
					$qryStr .= " VALUES (";
					foreach ($good_data as $field => $value) {
						
						if (array_key_exists($field, $labels_par)) {
							$qryStr .= " '$value',";
						}
					}
					// Remove the comma added after the last value.
					$qryStr[strlen($qryStr) - 1] = ")";

					
					//prepare statement to prevent injection attacks
					//prepare the statement
					$stmt = $conn->prepare($qryStr);
					
					//bind variables
					$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);
					
					//execute prepared statement
					$result = $stmt->execute() or die ("ERROR: Could not add new Legal Guardian!");
					
					//close the statement and connection
					$stmt->close();
					$conn->close();
					
					if ($result)
						$out = "Information successfully entered for " . $good_data['first_name'] . " " . $good_data['last_name'] . ".";
					
				} else {
					
					$out = "A Legal Guardian named " . $good_data['first_name'] . " " . $good_data['last_name'] . " with an email address at " . $good_data['email'] . " is already registered in the system!<br /><br />";
				}		
				
			} else if ($action == "update") {
				
				// Build query string to update row in Legal Guardians table.
				$qryStr = "UPDATE Participant_Legal_Guardians SET";
				foreach ($good_data as $field => $value) {
					
					if (($field == 'id') || ($field == 'submission'))
						$qryStr .= "";
					else
						$qryStr .= " $field='$value',";
				}
				
				// Remove the comma added after the last pair.
				$qryStr[strlen($qryStr) - 1] = " ";
				
				$qryStr .= "WHERE id=" . $good_data['id'] . ";";
				
				//echo "<br />$qryStr<br /><br />";
				
				//prepare statement to prevent injection attacks
				//prepare the statement
				$stmt = $conn->prepare($qryStr);
				
				//bind variables
				$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);
				
				//execute prepared statement
				$result = $stmt->execute() or die ("ERROR: Could not update information for Legal Guardian!");
				
				//close the statement and connection
				$stmt->close();
				$conn->close();
				
				if ($result)
					$out = $good_data['first_name'] . " " . $good_data['last_name'] . " was successfully registered for the system.";
				
			} else {
				
				$out = "ERROR: Cannot $action the data.";
			}
			
		}
		
		echo $out;
		
		// Return Legal Guardian ID or -1 if there was an error.
		return $this->getLegalGuardianID($good_data['last_name'], $good_data['email']);
	}

	
	/**
	 *	Verify the data for a Participant and either add to system or update.
	 *	@param {assoc array}	data	Data entered in form
	 *										key = field ('last_name')
	 *										value = data ('Bird')
	 *	@param {string}			action	"insert" or "update"
	 *	@return {int}				participant ID or -1 if there was an error.
	 */
	function verifyParticipantData($data, $action) {
		$conn = $this->connect();
		
		$out = "";	// Will hold the resulting output.
		
		// Arrays used for processing.
		$blank_array = array();	// Holds the name of any blank fields.
		$bad_format = array();	// Holds the name of any unacceptable fields.
		$good_data = array();	// Holds the sanitizied data.
		
		// Array of each field in the Participants table and its label.
		$labels_par = array("participant_id"=>"ID", "last_name"=>"Last Name", "first_name"=>"First Name", "gender"=>"Gender", "race"=>"Race", "date_of_birth"=>"Date of Birth", "school"=>"School", "grade"=>"Grade", "t_shirt_size"=>"T-Shirt Size", "site_id"=>"Site ID", "medications"=>"Medications", "notes"=>"Notes", "asthma"=>"Has Asthma", "emer_name"=>"Emergency Contact Name", "emer_phone"=>"Emergency Contact Phone Number", "emer_relation"=>"Relation to Participant");
		
		// Check data submitted to form.
		foreach ($data as $field => $value) {
			
			// Check for blanks for required fields.
			if (!isset($value) && ($field != 'medications') && ($field != 'notes')) {
				array_push($blank_array, $field);
				
			} else if ((($field == "last_name") || $field == ("first_name") || ($field == "emer_name") || ($field == "school") || ($field == "emer_relation")) && !preg_match("/^[A-Za-z.' -]{1,50}$/", $value)) {
				// Check that text input boxes for names only accept 1-50 letters.
				array_push($bad_format, $field);
				
			} else if($field == "date_of_birth") {
				
				if (!preg_match("/^[0-9]{4}[-][01][0-9][-][0123][0-9]$/", $value))
					array_push($bad_format, $field);
				
				
			} else if(($field == "emer_phone") && !preg_match("/^[0-9)( -]{7,20}(([xX]|(ext)|(ex))?[ -]?[0-9]{1,7})?$/", $value)) {
				
				array_push($bad_format, $field);
				
			}
		}
		
		// If any fields are not acceptable, display error.
		if (@sizeof($blank_array) > 0) {
			$out = "<p>You didn't fill in one or more of the required fields. Please fill out:<br />";
			
			foreach($blank_array as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else if (@sizeof($bad_format) > 0) {
			
			$out = "One or more fields has information that appears to be incorrect. Please correct the format for:<br />";
			
			foreach($bad_format as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else {
			
			// Sanitize and copy data to a new array.
			foreach ($data as $field => $value) {
				
				$good_data[$field] = strip_tags(trim($data[$field]));
				
				// Get rid of any punctuation in phone number.
				if ($field == "emer_phone")
					$good_data[$field] = preg_replace("/[)(.-]/", "", $good_data[$field]);
				
				// Turn asthma "Yes"/"No" to bool value.
				if ($field == "asthma") {
					if ($value == "Yes")
						$good_data[$field] = 1;
					else
						$good_data[$field] = 0;
				}
				
				$good_data[$field] = $conn->real_escape_string($good_data[$field]);
			}
			
			/*
			echo "<br /><br />NEW DATA:<br />";
			foreach ($good_data as $field => $value)
				echo "$field $value<br />";
			*/
		
			// Build query string based on the desired action.
			if ($action == "insert") {
				
				// Search Participants table first to make sure Participant is not already registered!
				if ($this->getParticipantID($good_data['last_name'], $good_data['first_name'], $good_data['site_id']) == -1) {

					$qryStr = "INSERT INTO Participants (";
					
					// Add fields from form if they match up with Participant fields.
					foreach ($good_data as $field => $value) {
						if (array_key_exists($field, $labels_par))
							$qryStr .= "$field,";
					}
					// Remove the comma added after the last field.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					// Add values.
					$qryStr .= " VALUES (";
					foreach ($good_data as $field => $value) {
						
						if (array_key_exists($field, $labels_par)) {
							if (($field == 'site_id') || ($field == 'asthma'))
								// Int fields have no parentheses.
								$qryStr .= " $value,";
							else
								$qryStr .= " '$value',";
						}
					}
					// Remove the comma added after the last value.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					
					//prepare statement to prevent injection attacks
					$stmt = $conn->prepare($qryStr);//prepare the statement
					
					//bind parameters
					$stmt->bind_param("ssssssssssssssss",$good_data["participant_id"],$good_data["last_name"],$good_data["first_name"],$good_data["gender"],$good_data["race"],$good_data["date_of_birth"],$good_data["school"],$good_data["grade"],$good_data["t_shirt_size"],$good_data["site_id"],$good_data["medications"],$good_data["notes"],$good_data["asthma"],$good_data["emer_name"],$good_data["emer_phone"],$good_data["emer_relation"]);

					
					
					//execute the statement
					$result = $stmt->execute() or die ("ERROR: Could not add new Participant!");
					
					//close the statement.
					$stmt->close();
					$conn->close();
					if ($result)
						$out = "Information successfully updated for " . $good_data['first_name'] . " " . $good_data['last_name'] . ".";
					
				} else {
					
					$out = "Error: Participant named $fname $lname is already registered!<br /><br />";
				}		
				
			} else if ($action == "update") {
				
				// Build query string to update row in Participants table.
				$qryStr = "UPDATE Participants SET";
				foreach ($good_data as $field => $value) {
					
					if (($field == 'participant_id') || ($field == 'submission'))
						$qryStr .= "";
					else if (($field == 'site_id') || ($field == 'asthma'))
						$qryStr .= " $field=$value,";
					else
						$qryStr .= " $field='$value',";
				}
				
				// Remove the comma added after the last pair.
				$qryStr[strlen($qryStr) - 1] = " ";
				
				$qryStr .= "WHERE participant_id=" . $good_data['participant_id'] . ";";
				
				//echo "<br />$qryStr<br /><br />";
								
				
				//prepare statement to prevent injection attacks
				$stmt = $conn->prepare($qryStr);//prepare the statement
				
				//bind parameters
				$stmt->bind_param("ssssssssssssssss",$good_data["participant_id"],$good_data["last_name"],$good_data["first_name"],$good_data["gender"],$good_data["race"],$good_data["date_of_birth"],$good_data["school"],$good_data["grade"],$good_data["t_shirt_size"],$good_data["site_id"],$good_data["medications"],$good_data["notes"],$good_data["asthma"],$good_data["emer_name"],$good_data["emer_phone"],$good_data["emer_relation"]);
				
				
				//execute the statement
				$result = $stmt->execute() or die ("ERROR: Could not update information for Participant!");
				//close the statement.
				$stmt->close();
				$conn->close();
				
				if ($result)
					$out = "Information successfully updated for " . $good_data['first_name'] . " " . $good_data['last_name'] . ".";
				
			} else {
				
				$out = "ERROR: Cannot $action the data.";
			}
			
		}
		
		echo $out;
		
		// Return participant ID or -1 if there was an error.
		return $this->getParticipantID($good_data['last_name'], $good_data['first_name'], $good_data['site_id']);
	}

	/**
	 *	Verify the data for a Site and either add to system or update.
	 *	@param {assoc array}	data	Data entered in form
	 *										key = field
	 *										value = data
	 *	@param {string}			action	"insert" or "update"
	 *	@return {string}				State of success
	 */
	function verifySiteData($data, $action) {
		$conn = $this->connect();
		
		$out = "";	// Will hold the resulting output.
		
		// Arrays used for processing.
		$blank_array = array();	// Holds the name of any blank fields.
		$bad_format = array();	// Holds the name of any unacceptable fields.
		$good_data = array();	// Holds the sanitizied data.
		
		// Array of each field in the Sites table and its label.
		$labels_par = array("site_id"=>"Site ID", "address"=>"Street Address", "zip_code"=>"Zip Code", "city"=>"City", "state"=>"State", "site_name"=>"Site Name");
		
		// Check data submitted to form.
		foreach ($data as $field => $value) {
			
			// Check for blanks for required fields.
			if (!isset($value)) {
				array_push($blank_array, $field);
				
			} else if (($field == "state") && !preg_match("/^[A-Za-z]{2}$/", $value)) {
				// Check that the state only accepts 2 chars.
				array_push($bad_format, $field);
				
			}
		}
		
		// If any fields are not acceptable, display error.
		if (@sizeof($blank_array) > 0) {
			$out = "<p>You didn't fill in one or more of the required fields. Please fill out:<br />";
			
			foreach($blank_array as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else if (@sizeof($bad_format) > 0) {
			
			$out = "One or more fields has information that appears to be incorrect. Please correct the format for:<br />";
			
			foreach($bad_format as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else {
			
			// Sanitize and copy data to a new array.
			foreach ($data as $field => $value) {
				
				$good_data[$field] = strip_tags(trim($data[$field]));
				$good_data[$field] = $conn->real_escape_string($good_data[$field]);
			}
			
			// Build query string based on the desired action.
			if ($action == "insert") {
				
				// Search Sites table first to make sure Site is not already registered!
				if ($this->getSiteID($good_data['site_name'], $good_data['address'], $good_data['zip_code']) == -1) {

					$qryStr = "INSERT INTO Sites (";
					
					// Add fields from form if they match up with Site fields.
					foreach ($good_data as $field => $value) {
						if (array_key_exists($field, $labels_par))
							$qryStr .= "$field,";
					}
					// Remove the comma added after the last field.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					// Add values.
					$qryStr .= " VALUES (";
					foreach ($good_data as $field => $value) {
						
						if (array_key_exists($field, $labels_par)) {
							$qryStr .= " '$value',";
						}
					}
					// Remove the comma added after the last value.
					$qryStr[strlen($qryStr) - 1] = ")";

					
					
					//prepare the statement to prevent injection attacks
					$stmt = $conn->prepare($qryStr);
					$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);//bind variables
					$result = $stmt->execute() or die ("ERROR: Could not add new Site!");//execute the statement
					$stmt->close();//close the statement
					$conn->close();
					
					if ($result)
						$out = "Successfully added the new site " . $good_data['site_name'] . ".";
				} else {
					
					$out = "Error: Site named $site_name at $address is already registered!<br /><br />";
				}		
				
			} else if ($action == "update") {
				
				// Build query string to update row in Sites table.
				$qryStr = "UPDATE Sites SET";
				foreach ($good_data as $field => $value) {
					
					if (($field == 'site_id') || ($field == 'submission'))
						$qryStr .= "";
					else
						$qryStr .= " $field='$value',";
				}
				
				// Remove the comma added after the last pair.
				$qryStr[strlen($qryStr) - 1] = " ";
				
				$qryStr .= "WHERE site_id=" . $good_data['site_id'] . ";";
				
				//prepare the statement to prevent injection attacks
				$stmt = $conn->prepare($qryStr);
				$stmt->bind_param("sssss",$good_data['title'],$good_data['date'],$good_data['timeStart'],$good_data['timeLength'],$good_data['site_id']);//bind variables
				$result = $stmt->execute() or die ("ERROR: Could not update information for Site!");//execute the statement
				$conn->close();
				$stmt->close();//close the statement
				
				if ($result)
					$out = "Information successfully updated for " . $good_data['site_name'] . ".";
			} else {
				
				$out = "ERROR: Cannot $action the data.";
			}
			
		}
		
		echo $out;
		// Return site ID or -1 if there was an error.
		return $this->getSiteID($good_data['site_name'], $good_data['address'], $good_data['zip_code']);
	}

	function getVolunteer_RegistrationID($lname, $fname, $unique) {
		$cn = $this->connect();
		$sql_query = "SELECT * FROM Volunteer_Registration WHERE last_name = '$lname' AND first_name = '$fname' AND auth_ssn = '$unique'";
		
		$result = $cn->query($sql_query);
		$cn->close();
		
		while($row = $result->fetch_assoc()) {
			//echo " -- MATCH FOUND<br />";
			return $row['ID'];
		}
		
		// If there is no matching Volunteer, return -1.
		//echo " -- NO MATCHES<br />";
		return -1;
	}
	
	function verifyVolunteer_RegistrationData($data, $action){
		$conn = $this->connect();
		
		$out = "";	// Will hold the resulting output.
		
		// Array of each field in the VolunteerApplicationNEW  table and its label.
	$labels_par = array("ID"=>"volunteer_id" ,"first_name"=>"First Name","last_name"=>"Last Name","address"=>"Address","apt_number"=>"Apartment #", "state"=>"State", "city"=>"City", "zipcode"=>"Zip Code", "homephone"=>"Home Number","workphone"=>"Work Number", "mobilephone"=>"Mobile Number", "email"=>"Email", "birthdate"=>"Data of Birth", 
			"area_of_interest"=>"Area of Interest","other_interest"=>"Other Interest", 
			"start_date"=>"Start Date", "monday_time"=>"Monday","tuesday_time"=>"Tuesday", "wednesday_time"=>"Wednesday", "thursday_time"=>"Thursday", "friday_time"=>"Friday", "satsun_time"=>"Saturday/Sunday",
			"ec_name"=>"Emergency Contact Name","ec_relationship"=>"Emergency Contact Relation", "ec_address"=>"Emergency Contact Address","ec_apart_num"=>"Emergency Contact Apartment", "ec_zipcode"=>"Emergency Contact Zip Code", "ec_state"=>"Emergency Contact State", "ec_city"=>"Emergency Contact City","ec_workphone"=>"Emergency Contact Work", "ec_homephone"=>"Emergency Contact Number", "ec_mobilephone"=>"Emergency Contact Cell",
			"initial_one"=>"1", "initial_two"=>"2", "initial_three"=>"3", "initial_four"=>"4",
			"auth_full_name"=>"Signature", "auth_ssn"=>"Social Security Num.","auth_state"=>"Driver License State","auth_birthdate"=>"Date of Birth", "auth_license"=>"Driver License Number",
			"monday_end"=>"Monday","tuesday_end"=>"Tuesday", "wednesday_end"=>"Wednesday", "thursday_end"=>"Thursday", "friday_end"=>"Friday", "satsun_end"=>"Saturday/Sunday" ,
			"totalHours"=>"Time");
		// Arrays used for processing.
		$blank_array = array();	// Holds the name of any blank fields.
		$bad_format = array();	// Holds the name of any unacceptable fields.
		$good_data = array();	// Holds the sanitizied data.
		
		
				// Check data submitted to form.
		foreach ($data as $field => $value) {
			
			// Check for null inrequired fields.
			if (!isset($value) && ($field != 'initial_one') && ($field != 'initial_two') && ($field != 'initial_three')&& ($field != 'initial_four')&& ($field != 'auth_full_name')&& ($field != 'auth_ssn')&& ($field != 'auth_state')&& ($field != 'auth_birthdate')&& ($field != 'auth_license')) {
				array_push($blank_array, $field);
				
			} else if ((($field == "first_name") ||($field == "last_name") ||  ($field == "ec_name") || ($field == "ec_relationship")) && !preg_match("/^[A-Za-z.' -]{1,50}$/", $value)) {
				// Only accept 1-50 letters.
				array_push($bad_format, $field);
				
			} else if(($field == "auth_birthdate") || ($field == "birthdate") ){
				
				if (!preg_match("/^[0-9]{4}[-][01][0-9][-][0123][0-9]$/", $value))
					array_push($bad_format, $field);
				
				
			} else if(($field == "ec_homephone") && !preg_match("/^[0-9)( -]{7,20}(([xX]|(ext)|(ex))?[ -]?[0-9]{1,7})?$/", $value)) {
				
				array_push($bad_format, $field);
				
			}
		}
		
		
		// Displays error message.
		if (@sizeof($blank_array) > 0) {
			$out = "<p>You didn't fill in one or more of the required fields. Please fill out:<br />";
			
			foreach($blank_array as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} else if (@sizeof($bad_format) > 0) {
			
			$out = "One or more fields has information that appears to be incorrect. Please correct the format for:<br />";
			
			foreach($bad_format as $value)
				$out .= "- $labels_par[$value]<br />";
			
		} 
		else {
			
			// Sanitize and copy data to a new array.
			foreach ($data as $field => $value) {
				
				$good_data[$field] = strip_tags(trim($data[$field]));
				
				// Removes special Characters from phone numbers and apt numbers.
				if (($field == "ec_homephone") ||($field == "homephone")||($field == "workphone")||($field == "ec_workphone") ||($field == "mobilephone")||($field == "ec_mobilephone") ||($field == "apt_number")||($field == "auth_ssn") )
				$good_data[$field] = preg_replace("/[)(.-]/", "", $good_data[$field]);
				
				$good_data[$field] = $conn->real_escape_string($good_data[$field]);
			}
		
				// Build query string based on the desired action.
			if ($action == "insert") {
				
				// Search Participants table first to make sure Participant is not already registered!
				if ($this->getVolunteer_RegistrationID($good_data['last_name'], $good_data['first_name'], $good_data['auth_ssn']) == -1) {
					$qryStr = "INSERT INTO Volunteer_Registration (";
					
					// Add fields from form if they match up with Participant fields.
					foreach ($good_data as $field => $value) {
						if (array_key_exists($field, $labels_par))
							$qryStr .= "$field,";
					}
					// Remove the comma added after the last field.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					// Add values.
					$qryStr .= " VALUES (";
					foreach ($good_data as $field => $value) {
						
						if (array_key_exists($field, $labels_par)) {
							if ($field == 'ID') 
								// Int fields have no parentheses.
								$qryStr .= " $value,";
							else
								$qryStr .= " '$value',";
						}
					}
					// Remove the comma added after the last value.
					$qryStr[strlen($qryStr) - 1] = ")";
					
					//echo "<br />$qryStr<br />";
					
					//prepare the statement to prevent injection attacks
					$stmt = $conn->prepare($qryStr);
					$stmt->bind_param("sss",$good_data['last_name'],$good_data['first_name'],$good_data['ID']);//bind variables
					$result = $stmt->execute() or die ("ERROR: Could not add new Volunteer!");//execute the statement
					
				
					$conn->close();
					$stmt->close();//close the statement
					//$result = mysqli_query($conn, $qryStr) or die ("ERROR: Could not add new Participant!");
					//$conn->close();
					
					if ($result)
						$out = "The application successfully submitted for " . $good_data['first_name'] . " " . $good_data['last_name'] . ".";
					
				} else {
					
					$out = "Error: Volunteer named $fname $lname is already registered!<br /><br />";
				}		
				
			}
			else if ($action == "update") {
				
				// Build query string to update row in Participants table.
				$qryStr = "UPDATE Volunteer_Registration SET";
				foreach ($good_data as $field => $value) {
					
					if ($field == 'ID')
						$qryStr .= "";
				
					else
						$qryStr .= " $field='$value',";
				}
				
				// Remove the comma added after the last pair.
				$qryStr[strlen($qryStr) - 1] = " ";
				
				$qryStr .= "WHERE ID =" . $good_data['ID'] . ";";
				
				//echo "<br />$qryStr<br /><br />";
				
				
				//prepare the statement to prevent injection attacks
				$stmt = $conn->prepare($qryStr);
				$stmt->bind_param("sss",$good_data['last_name'],$good_data['first_name'],$good_data['ID']);//bind variables
				$result = $stmt->execute() or die ("ERROR: Could not update information for Volunteer Registration!");//execute the statement
				
			
				$conn->close();
				$stmt->close();//close the statement
				
				
				
				if ($result)
					$out = "Information successfully updated for " . $good_data['first_name'] . " " . $good_data['last_name'] . ".";
				
			} else {
				
				$out = "ERROR: Cannot $action the data.";
			}
		}
		echo $out;
		
		// Return participant ID or -1 if there was an error.
		return $this->getVolunteer_RegistrationID($good_data['last_name'], $good_data['first_name'], $good_data['auth_ssn']);
	
	
	}
		
		
}

?>
