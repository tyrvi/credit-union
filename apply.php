<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Apply</title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<!-- Content -->
		<div>
			<form>
				<div><input type="text" name="Fname" placeholder="First Name"></div>
				<div><input type="text" name="Mname" placeholder="Middle Name"></div>
				<div><input type="text" name="Lname" placeholder="Last Name"></br></div>
				<div><input type="text" name="Address1" placeholder="Address 1"></div>
				<div><input type="text" name="Address2" placeholder="Address 2"></br></div>
				<div><input type="text" name="City" placeholder="City"></div>
				<div><input type="tel" name="Phone" placeholder="Phone"></div>
				<select>
					<option placeholder="TA">TA - Tatooine</option>
					<option placeholder="DA">DA - Dantooine</option>
					<option placeholder="KA">KA - Kashyyyk</option>
				</select></br>
				Date of Birth: <input type="date" name="DOB" placeholder="Date of Birth">
				<div>
					Male: <input type="radio" name="gender" value="male">
					Female: <input type="radio" name="gender" value="female">
				</div>
				<div><input type="text" name="SS" placeholder="Social Security"></br></div>
				<div><input type="number" name="income" placeholder="Income"><br/></div>
				<div><input type="email" name="email" placeholder="Email"></br></div>
				<div><input type="password" name="pass" placeholder="Password"></br></div>
				<div><input type="password" name="confirm_pass" placeholder="Confirm Password"></br></div>
			</form>
		</div>
		<?php
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			echo $mysqli->host_info . "\n";

			$res = $mysqli->query("select * from cudb.customers where C_Id=1;");

			$row = $res->fetch_assoc();
			echo gettype($row);
			
			foreach($row as $item) {
				echo "<br>";
				echo $item;
			}
			
			
			//printf("C_id = %s (%s)\n", $row['C_id'], gettype($row['C_Id']));
			/*
			$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			
			if (!$link) {
				echo "Error: Unable to connect to MySQL.".PHP_EOL;
				echo "Debugging errno: ".mysqli_connect_errno().PHP_EOL;
				echo "Debugging error: ".mysqli_connect_error().PHP_EOL;
				exit;
			}
			
			echo "Success: A proper connection to MySQL was made! The my_db database is great.".PHP_EOL;
			echo "Host information: ".mysqli_get_host_info($link).PHP_EOL;

			mysqli_close($link);
			*/	
		?>
	</div>
</body>
</html>