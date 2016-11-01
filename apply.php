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
				<input type="text" name="Fname" value="First Name"></br>
				<input type="text" name="Mname" value="Middle Name"></br>
				<input type="text" name="Lname" value="Last Name"></br>
				<input type="text" name="Address1" value="Address 1"></br>
				<input type="text" name="Address2" value="Address 2"></br>
				<input type="text" name="City" value="City"></br>
				<select>
					<option value="TA">TA - Tatooine</option>
					<option value="DA">DA - Dantooine</option>
					<option value="KA">KA - Kashyyyk</option>
				</select></br>
				<input type="date" name="DOB" value="Date of Birth"></br>
				<input type="text" name="SS" value="Social Security"></br>
				<input type="password" name="Pass" value="Password"></br>
			</form>
		</div>
	</div>
</body>
</html>