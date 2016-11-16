<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
	<link rel="stylesheet" href="style.php/apply.scss">
    <title>Apply</title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<div class="apply">
			<form class="apply-box" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group">
					<p>FIRST NAME</p>
					<input class="form-control" type="text" name="Fname" placeholder="First Name">
				</div>
				
				<div class="form-group">
					<p>MIDDLE NAME</p>
					<input class="form-control" type="text" name="Mname" placeholder="Middle Name">
				</div>
				
				<div class="form-group">
					<p>LAST NAME</p>
					<input class="form-control" type="text" name="Lname" placeholder="Last Name">
				</div>
				
				<div class="form-group">
					<p>ADDRESS ONE</p>
					<input class="form-control" type="text" name="Address1" placeholder="Address 1">
				</div>
				
				<div class="form-group">
					<p>ADDRESS TWO</p>
					<input class="form-control" type="text" name="Address2" placeholder="Address 2">
				</div>
				
				<div class="form-group">
					<p>PLANET</p>
					<select class="form-control">
						<option placeholder="TA">TA - Tatooine</option>
						<option placeholder="DA">DA - Dantooine</option>
						<option placeholder="KA">KA - Kashyyyk</option>
					</select>
				</div>
				
				<div class="form-group">
					<p>CITY</p>
					<input class="form-control" type="text" name="City" placeholder="City">
				</div>
				
				<div class="form-group">
					<p>PHONE</p>
					<input class="form-control" type="tel" name="Phone" placeholder="Phone">
				</div>
				
				<div class="form-group">
					<p>DATE OF BIRTH</p>
					<input class="form-control" type="date" name="DOB" placeholder="Date of Birth">
				</div>
				
				<div class="form-group">
					<p>GENDER</p>
					<div class="radio">
						<label><input type="radio" name="gender" value="male"><p>MALE</p></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="gender" value="female"><p>FEMALE</p></label>
					</div>
					<div class="radio">
						<label><input type="radio" name="gender" value="droid"><p>DROID</p></label>
					</div>
				</div>
				
				<div class="form-group">
					<p>SOCIAL SECURITY</p>
					<input class="form-control" type="text" name="SS" placeholder="Social Security">
				</div>
				
				<div class="form-group">
					<p>INCOME</p>
					<input class="form-control" type="number" name="income" placeholder="Income">
				</div>
				
				<div class="form-group">
					<p>EMAIL</p>
					<input class="form-control" type="email" name="email" placeholder="Email">
				</div>
				
				<div class="form-group">
					<p>PASSWORD</p>
					<input class="form-control" type="password" name="pass" placeholder="Password">
				</div>

				<div class="form-group">
					<p>CONFIRM PASSWORD</p>
					<input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password">
				</div>
				
				<input type="submit" value="Submit" class="btn">
			</form>
		</div>
		<?php
			$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			//echo $mysqli->host_info . "\n";
			// init variables for form collection/validation
			$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Phone = $Planet = $SS = $Pass = $confirm_pass = $email = $gender = "";
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
				$Pass = validate($_POST["Pass"]);
				$confirm_pass = validate($_POST["confirm_pass"]);
				$email = validate($_POST["email"]);
				$gender = validate($_POST["gender"]);
				$Planet = validate($_POST["Planet"]);
			}

			function validate($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			
			echo $Fname;
			
			/*$res = $mysqli->query("select * from cudb.customers where C_Id=1;");

			$row = $res->fetch_assoc();
			echo gettype($row);
			
			foreach($row as $item) {
				echo "<br>";
				echo $item;
			}*/

			mysqli_close($link);
		?>
	</div>
</body>
</html>