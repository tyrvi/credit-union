<?php 
	session_start();
	
	// check if logged in and if they are not redirect to home page
	if (!array_key_exists('Email', $_SESSION)) {
		header("Location: login.php");
	}
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Hello <?php echo $_SESSION["Fname"]; ?></title>
</head>
<body ng-app="app" ng-controller="ctrl">
	<?php
		include_once "navbar.php";	
	?>
	
	<script>
	var contact = '<?php echo $_SESSION['Contact']; ?>';
	var Fname = '<?php echo $_SESSION['Fname']; ?>';
	var Lname = '<?php echo $_SESSION['Lname']; ?>';
	var email = '<?php echo $_SESSION['Email']; ?>';
	var Address1 = '<?php echo $_SESSION['Address1']; ?>';
	var City = '<?php echo $_SESSION['City']; ?>';
	var Pass = '<?php echo $_SESSION['Pass']; ?>';
	</script>
	
	<div>
		<?php
			$welcome = "Welcome, ".$_SESSION['Fname'];
			echo $welcome;
		?>
	</div>
	<div id="main">
		<!-- main content -->
		<?php
			/* 
			var_dump($_SESSION['Phones']);
			foreach ($_SESSION['Phones'] as $item) {
				echo "</br>";
				echo $item;
				for ($i = 0; $i < count($item); $i++) {
					echo "</br>";
					echo $item;
				}
			}
			*/
		?>
		<div>
			<!-- accounts -->
			<div>
			
			</div>
			<!-- user info -->
			<div>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div>
						<input ng-model="Fname" type="text" name="Fname">
						<p id="FnameErr" class="apply-error"></p>

						<input type="text" name="Mname" value="<?php echo $_SESSION['Mname']; ?>">

						<input ng-model="Lname" type="text" name="Lname">
						<p id="LnameErr" class="apply-error"></p>
					</div>
					
					<input ng-model="email" type="text" name="email" value="<?php echo $_SESSION['Email']; ?>">
					<p id="emailErr" class="apply-error"></p>
					<div>
						<input type="hidden" name="Contact" value=""> 
						<input ng-model="Address1" type="text" name="Address1" value="<?php echo $_SESSION['Address1']; ?>">
						<input type="text" name="Address2" value="<?php echo $_SESSION['Address2']; ?>">
						<input ng-model="City" type="text" name="City" value="<?php echo $_SESSION['City']; ?>">
					</div>
					<div><?php echo $_SESSION['Planet'];?></div> 

					<button type="button" id="showPlanets" ng-click="showPlanets()">Change Planet</button>
					<select id="planets" class="form-control" name="Planet">
						<option placeholder="AL">AL - Alderaan</option>
						<option placeholder="AP">AP - Amethia Prime</option>
						<option placeholder="BE">BE - Bespin</option>
						<option placeholder="CA">CA - Corellia</option>
						<option placeholder="CO">CO - Coruscant</option>
						<option placeholder="DA">DA - Dantooine</option>
						<option placeholder="DH">DH - Dagobah</option>
						<option placeholder="DU">DU - Duro</option>
						<option placeholder="EN">EN - Endor</option>
						<option placeholder="FE">FE - Felucia</option>
						<option placeholder="HH">HH - Hoth</option>
						<option placeholder="HP">HP - Hosnian Prime</option>
						<option placeholder="IR">IR - Iridonia</option>
						<option placeholder="JK">JK - Jakku</option>
						<option placeholder="KL">KL - Kessel</option>
						<option placeholder="KO">KO - Korriban</option>
						<option placeholder="KY">KY - Kashyyyk</option>
						<option placeholder="LM">LM - Lotho Minor</option>
						<option placeholder="MA">MA - Mahranee</option>
						<option placeholder="MC">MC - Malachor</option>
						<option placeholder="MN">MN - Manaan</option>
						<option placeholder="MY">MY - Mygeeto</option>
						<option placeholder="NA">NA - Naboo</option>
						<option placeholder="ON">ON - Onderon</option>
						<option placeholder="RY">RY - Ryloth</option>
						<option placeholder="SU">SU - Sullust</option>
						<option placeholder="TT">TT - Tatooine</option>
						<option placeholder="UR">UR - Uranus</option>
						<option placeholder="YA">YA - Yavin</option>
					</select>
					<div>
						<input ng-model="pass" type="password" name="pass" value="<?php echo $_SESSION['Pass']; ?>">
						<p id="passErr" class="apply-error"></p>
						
						<input ng-model="confirm_pass" type="password" name="confirm_pass" placeholder="confirm new password">
						<p id="confirm_passErr" class="apply-error"></p>
					</div>

					<div ng-repeat="c in contacts">
						Type:{{c.type}}, Val: {{c.val}}
						<button ng-click="removeContact(c.val)" type="button">-</button>
					</div>
					<button id="addContactBtn" ng-click="addContact()" type="button">+</button>

					<input type="hidden" name="Contact" value="{{contact}}">
					<button ng-click="update()" type="button">update</button>
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
		</div>
		<!-- star wars ad -->
		<div>
			
		</div>
	</div>
	
	<script src="account.js"></script>
</body>
</html>