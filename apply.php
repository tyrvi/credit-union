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
			<form class="apply-box">
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
				
				<input type="submit" class="btn">
			</form>
		</div>
		<?php
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