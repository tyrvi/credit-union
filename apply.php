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
				<select>
					<option placeholder="TA">TA - Tatooine</option>
					<option placeholder="DA">DA - Dantooine</option>
					<option placeholder="KA">KA - Kashyyyk</option>
				</select></br>
				Date of Birth: <input type="date" name="DOB" placeholder="Date of Birth">
				<div><input type="text" name="SS" placeholder="Social Security"></br></div>
				<div><input type="password" name="Pass" placeholder="Password"></br></div>
			</form>
		</div>
	</div>
</body>
</html>