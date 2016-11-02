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
				<input type="text" name="Fname" placeholder="First Name">
				<input type="text" name="Mname" placeholder="Middle Name">
				<input type="text" name="Lname" placeholder="Last Name"></br>
				<input type="text" name="Address1" placeholder="Address 1">
				<input type="text" name="Address2" placeholder="Address 2"></br>
				<input type="text" name="City" placeholder="City">
				<select>
					<option placeholder="TA">TA - Tatooine</option>
					<option placeholder="DA">DA - Dantooine</option>
					<option placeholder="KA">KA - Kashyyyk</option>
				</select></br>
				Date of Birth: <input type="date" name="DOB" placeholder="Date of Birth">
				<input type="text" name="SS" placeholder="Social Security"></br>
				<input type="password" name="Pass" placeholder="Password"></br>
			</form>
		</div>
	</div>
</body>
</html>