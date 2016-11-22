<?php 
	session_start();
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
	<link rel="stylesheet" href="style.php/apply.scss">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <title>Apply</title>
</head>

<body>
	<?php include_once "navbar.php"; ?>
	<div id="main" ng-app="app" ng-controller="ctrl">
		<div class="apply">
			<div class="apply-text">Join the dark side.</div>
			<form id="applyForm" class="apply-box" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div style="display: flex; justify-content: center;">
					<span class="apply-progress">
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						<span class="apply-progress-point"></span>
						
						<div class="apply-current-progress">
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
							<span class="apply-progress-point"></span>
						</div>
					</span>
				</div>
				
				<div id="apply-caption-carousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="apply-mini-form">
								<p>Tell us about yourself.</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Hello {{Fname}}.</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Are you a boy or a girl?</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Where are you from?</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Set your income.</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Wrapping up.</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Done!</p>
							</div>
						</div>
					</div>
				</div>
				<div class="apply-break"></div>
				<div id="apply-carousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="apply-mini-form">
								<input ng-model="Fname" class="form-control" type="text" name="Fname" placeholder="First Name">
								<p id="FnameErr" class="apply-error"></p>
								
								<input ng-model="Mname" class="form-control" type="text" name="Mname" placeholder="Middle Name">
								<p id="MnameErr" class="apply-error"></p>
								
								<input ng-model="Lname" class="form-control" type="text" name="Lname" placeholder="Last Name">
								<p id="LnameErr" class="apply-error"></p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Date of Birth</p>
								<input ng-model="DOB" class="form-control" type="date" name="DOB" placeholder="Date of Birth">
								<p id="DOBErr" class="apply-error"></p>
								
								<p>Primary Phone Contact</p>
								<input ng-model="Phone" ng-change="telChange()" class="form-control" type="tel" name="Phone" placeholder="xxx-xxx-xxxx">
								<p id="PhoneErr" class="apply-error"></p>

								<p>Social Security</p>
								<input ng-model="SS" ng-change="socialSecChange()" class="form-control" type="text" name="SS" placeholder="xxx-xx-xxxx">
								<p id="SSErr" class="apply-error"></p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<div class="apply-gender">
									<label>
										<input ng-model="gender" class="apply-gender-radio" type="radio" name="gender" value="male">
										<div class="apply-gender-img">
											<img src="http://latimes-graphics-media.s3.amazonaws.com/assets/img/stormtrooper_images/imperial.png?">
											<p>Male</p>
										</div>
									</label>
									<label>
										<input ng-model="gender" class="apply-gender-radio" type="radio" name="gender" value="female">
										<div class="apply-gender-img">
											<img src="http://latimes-graphics-media.s3.amazonaws.com/assets/img/stormtrooper_images/imperial.png?">
											<p>Female</p>
										</div>
									</label>
									<label>
										<input ng-model="gender" class="apply-gender-radio" type="radio" name="gender" value="droid">
										<div class="apply-gender-img">
											<img src="http://iconbug.com/data/e9/256/689bfad4f0f80f1a21dd67dcb8583020.png">
											<p>Droid</p>
										</div>
									</label>
								</div>
								<p id="genderErr" class="apply-error"></p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<input ng-model="City" class="form-control" type="text" name="City" placeholder="City">
								<p id="CityErr" class="apply-error"></p>
								<input ng-model="Address1" class="form-control" type="text" name="Address1" placeholder="Address 1">
								<p id="Address1Err" class="apply-error"></p>
								<input class="form-control" type="text" name="Address2" placeholder="Address 2">
								<p id="Address2Err" class="apply-error"></p>
								<select class="form-control" name="Planet">
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
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<div class="apply-income">
									<input ng-model="income" type="range" name="income" min="100" max="10000">
									<b>{{income}}$</b>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<input ng-model="email" class="form-control" type="email" name="email" placeholder="Email">
								<p id="emailErr" class="apply-error"></p>
								
								<input ng-model="pass" class="form-control" type="password" name="pass" placeholder="Password">
								<p id="passErr" class="apply-error"></p>
								
								<input ng-model="confirm_pass" class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password">
								<p id="confirm_passErr" class="apply-error"></p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								Done!
							</div>
						</div>
					</div>
				</div>
				<button ng-click="next()" id="apply-next" type="button" class="active btn pull-right">Next</button>
				<button id="apply-prev" type="button" class="active btn">Back</button>
				<button ng-click="next()" id="submitBtn" type="button" class="btn pull-right">Submit</button>
			</form>
		</div>
		<?php
			// validates input and makes sure it is not corrupt or malicious
			function validate($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			// change to this database when merging to master 
			//mysqli = mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "b7974b78735401", "50849710", "icudb");
			
			// comment out this connection when merging to master
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}

			//init variables for form collection/validation
			$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Phone = $Planet = $SS = $Pass = $confirm_pass = $email = $DOB = $gender = "";
			
			// collect form values
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Fname = validate($_POST['Fname']);
				$Mname = validate($_POST['Mname']);
				$Lname = validate($_POST['Lname']);				
				$Address1 = validate($_POST['Address1']);
				$Address2 = validate($_POST['Address2']);
				$City = validate($_POST['City']);
				$Phone = validate($_POST['Phone']);
				$SS =validate($_POST['SS']);
				$Pass = validate($_POST['pass']);
				$confirm_pass = validate($_POST['confirm_pass']);
				$email = validate($_POST['email']);
				$DOB = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['DOB'])));
				$gender = validate($_POST['gender']);
				$Planet = validate($_POST['Planet']);
				// income not initialized anywhere but it works so leaving it as is...
				$income = validate($_POST['income']);
				
				$form = "INSERT INTO customers (Fname, Mname, Lname, Address1, Address2, City, Planet, DOB, SS, Email, Pass, Income, Gender) 
				VALUES ('$Fname', '$Mname', '$Lname', '$Address1', '$Address2', '$City', '$Planet', '$DOB', '$SS', '$email', '$Pass', '$income', '$gender')";

				// If the application is successful insert phone number using C_Id
				if ($mysqli->query($form) === TRUE) {
					$find_C_Id = "SELECT C_Id FROM customers where Email = '$email'";
					$res = $mysqli->query($find_C_Id); // get C_Id for this person

					// TO-DO: phone number is not being correctly inserted into the phone database
					if ($res !== FALSE) {
						$row = $res->fetch_assoc();
						$C_Id = $row["C_Id"];
						$insert_phone = "INSERT INTO contact (C_Id, Phone, Ptype)
						VALUES ('$C_Id', '$Phone', 'Primary')";
						echo "Application successful!";
					}
					// error with C_Id query
					else {
						echo "Error: ".$find_C_Id."<br>".$mysqli->error;
					}
					
				} 
				// error with form database insertion
				else {
					echo "Error: ".$form."<br>".$mysqli->error;
				}
			}
			
			mysqli_close($mysqli);
		?>
	</div>
	<script src="apply.js"></script>
</body>
</html>