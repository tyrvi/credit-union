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
			<form class="apply-box" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<span class="apply-progress">
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
					</div>
				</span>
				
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
								
								<p>Phone</p>
								<input ng-model="Phone" class="form-control" type="tel" name="Phone" placeholder="Phone">
								<p id="PhoneErr" class="apply-error"></p>

								<p>Social Security</p>
								<input ng-model="SS" class="form-control" type="text" name="SS" placeholder="Social Security">
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
								<input ng-model="Address1" class="form-control" type="text" name="Address1" placeholder="Address 1">
								<p id="Address1Err" class="apply-error"></p>
								<input class="form-control" type="text" name="Address2" placeholder="Address 2">
								<p id="Address2Err" class="apply-error"></p>
								<select class="form-control" name="Planet">
									<option placeholder="TA">TA - Tatooine</option>
									<option placeholder="DA">DA - Dantooine</option>
									<option placeholder="KA">KA - Kashyyyk</option>
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
					</div>
				</div>
				<button id="apply-prev" type="button" class="btn">Back</button>
				<button ng-click="next()" id="apply-next" type="button" class="btn pull-right">Next</button>
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

			//$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			//echo $mysqli->host_info . "\n";
			//init variables for form collection/validation
			$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Phone = $Planet = $SS = $Pass = $confirm_pass = $email = $DOB = $gender = "";
			
			// collect form values
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Fname = validate($_POST["Fname"]);
				$Mname = validate($_POST["Mname"]);
				$Lname = validate($_POST["Lname"]);				
				$Address1 = validate($_POST["Address1"]);
				$Address2 = validate($_POST["Address2"]);
				$City = validate($_POST["City"]);
				$Phone = validate($_POST["Phone"]);
				$SS =validate($_POST["SS"]);
				$Pass = validate($_POST["pass"]);
				$confirm_pass = validate($_POST["confirm_pass"]);
				$email = validate($_POST["email"]);
				$DOB = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["DOB"])));
				$gender = validate($_POST["gender"]);
				$Planet = validate($_POST["Planet"]);
				if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				echo "This $email is not a valid email address.";
				}
				$form = "INSERT INTO customers (Fname, Mname, Lname, Address1, Address2, City, Planet, DOB, SS, Email, Pass) 
				VALUES ('$Fname', '$Mname', '$Lname', '$Address1', '$Address2', '$City', '$Planet', '$DOB', '$SS', '$email', '$Pass')";

				if ($mysqli->query($form) === TRUE) {
					echo "Application successful!";
				} 
				else {
					echo "Error: ".$form."<br>".$mysqli->error;
				}
			}
			
			
			/*$res = $mysqli->query("select * from cudb.customers where C_Id=1;");

			$row = $res->fetch_assoc();
			echo gettype($row);
			
			foreach($row as $item) {
				echo "<br>";
				echo $item;
			}*/

			mysqli_close($mysqli);
		?>
	</div>
	<script src="apply.js"></script>
</body>
</html>