<?php
	session_start();
	
	// validates input
	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
	// change to this database when merging to master 
	//mysqli = mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "b7974b78735401", "50849710", "icudb");

	// open connection to database
	$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
	
	// check for database connection error
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Pass = $confirm_pass = $email = "";
	$Phone = $Planet = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$Fname = validate($_POST['Fname']);
		$Mname = validate($_POST['Mname']);
		$Lname = validate($_POST['Lname']);				
		$Address1 = validate($_POST['Address1']);
		$Address2 = validate($_POST['Address2']);
		$City = validate($_POST['City']);
		$Pass = validate($_POST['pass']);
		$confirm_pass = validate($_POST['confirm_pass']);
		$Contact = validate($_POST['Contact']);
		$Planet = validate($_POST['Planet']);
		$C_Id = $_SESSION['C_Id'];
		
		$form = "UPDATE customers
		SET Fname='$Fname', Mname='$Mname', Lname='$Lname', Address1='$Address1', Address2='$Address2', City='$City', Planet='$Planet', Pass='$Pass', Contact='$Contact' 
		WHERE C_Id = '$C_Id'";
		
		//$mysqli->query($form);
		if ($mysqli->query($form) === TRUE) {
			$_SESSION['Fname'] = $Fname;
			$_SESSION['Mname'] = $Mname;
			$_SESSION['Lname'] = $Lname;
			$_SESSION['Address1'] = $Address1;
			$_SESSION['Address2'] = $Address2;
			$_SESSION['City'] = $City;
			$_SESSION['Pass'] = $Pass;
			$_SESSION['Contact'] = $Contact;
			$_SESSION['Planet'] = $Planet;
			$_SESSION['Pass'] = $Pass;
			//echo "$form";
		}
		else {
			echo "Error: ".$form."<br>".$mysqli->error;
		}
		
	}

	mysqli_close($mysqli);
?>