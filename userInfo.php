<div id="userInfo">
	<h3>Account Information</h3>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#basicInfo">Basic Info</a></li>
		<li><a data-toggle="tab" href="#addressInfo">Address</a></li>
		<li><a data-toggle="tab" href="#contactInfo">Contact</a></li>
	</ul>
	
	<form id="userInfoForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="tab-content">
			<div id="basicInfo" class="tab-pane fade in active">
				<p>Email:</p>
				<input class="form-control" type="text" name="Email" readonly="readonly" value="<?php echo $_SESSION['Email']; ?>">	
				
				<p>First Name:</p>
				<input class="form-control" type="text" name="Fname" value="<?php echo $_SESSION['Fname']; ?>">	
				
				<p>Middle Name:</p>
				<input class="form-control" type="text" name="Mname" value="<?php echo $_SESSION['Mname']; ?>">	
				
				<p>Last Name:</p>
				<input class="form-control" type="text" name="Lname" value="<?php echo $_SESSION['Lname']; ?>">
			</div>
			
			<div id="addressInfo" class="tab-pane fade">
				<input type="hidden" name="Contact" value="{{contact}}">
				<p>Address 1:</p>
				<input class="form-control" type="text" name="Address1" value="<?php echo $_SESSION['Address1']; ?>">
				
				<p>Address 2:</p>
				<input class="form-control" type="text" name="Address2" value="<?php echo $_SESSION['Address2']; ?>">
				
				<p>City:</p>
				<input class="form-control" type="text" name="City" value="<?php echo $_SESSION['City']; ?>">	
				
				<p>Planet:</p>
				<select ng-model="Planet" id="planets" class="form-control" name="Planet">
					<?php include('planets.php'); ?>
				</select>
			</div>
			
			<div id="contactInfo" class="tab-pane fade">
				<div ng-repeat="c in contacts" class="contact">
					<select ng-model="c.type" ng-change="contactChange()">
						<option placeholder="Primary">Primary</option>
						<option placeholder="Secondary">Home</option>
						<option placeholder="Secondary">Work</option>
						<option placeholder="Secondary">Subspace Transceiver</option>
						<option placeholder="Secondary">Mobile</option>
						<option placeholder="Secondary">Fax</option>
					</select>
					<input ng-model="c.val" ng-change="contactChange()" type="text" value="{{c.val}}">
					<button ng-click="removeContact($index)" type="button">-</button>
				</div>
				<button id="addContactBtn" ng-click="addContact()" type="button">+</button>
			</div>
			<button type="button">Update</button>
		</div>
		<!--
		PASSWORD STUFF
		<input class="form-control" type="password" name="pass" value="<?php echo $_SESSION['Pass']; ?>">
		<input class="form-control" type="password" name="confirm_pass" placeholder="confirm new password">
		-->
		
	</form>
	<?php
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
		$Phone = $Planet = ""; // These are not yet ready to be processed

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$Fname = validate($_POST['Fname']);
			$Mname = validate($_POST['Mname']);
			$Lname = validate($_POST['Lname']);				
			$Address1 = validate($_POST['Address1']);
			$Address2 = validate($_POST['Address2']);
			$City = validate($_POST['City']);
			$Pass = validate($_POST['pass']);
			$confirm_pass = validate($_POST['confirm_pass']);
			$email = validate($_POST['email']);
			// still need to be handled in the form
			$Phone = validate($_POST['Phone']); // This one will be tricky
			$Planet = validate($_POST['Planet']);

			if ($_SESSION['Planet'] != $Planet) {
				$form = "UPDATE customers
				SET Fname='$Fname', Mname='$Mname', Lname='$Lname', Address1='$Address1', Address2='$Address2', City='$City', Planet='$Planet', Email='$email', Pass='$Pass' 
				WHERE C_Id = '$_SESSION[C_Id]'";
			}
			else {
				$form = "UPDATE customers
				SET Fname='$Fname', Mname='$Mname', Lname='$Lname', Address1='$Address1', Address2='$Address2', City='$City', Email='$email', Pass='$Pass' 
				WHERE C_Id = '$_SESSION[C_Id]'";
			}
			
			//$mysqli->query($form);
			
			if ($mysqli->query($form) === TRUE) {
				echo "Update successful";
			}
			else {
				echo "Error: ".$form."<br>".$mysqli->error;
			}
			
		}

		mysqli_close($mysqli);
	?>
</div>