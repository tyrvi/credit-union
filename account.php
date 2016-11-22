<?php 
	session_start();
	
	// check if logged in and if they are not redirect to home page
	if (!array_key_exists('Email', $_SESSION)) {
		header("Location: index.php");
	}

	// change to this database when merging to master 
	//mysqli = mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "b7974b78735401", "50849710", "icudb");

	// open connection to database
	$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
	
	// check for database connection error
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	mysqli_close($mysqli);
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>TITLE</title>
</head>
<body>
	<?php
		include_once "navbar.php";	
	?>
	
	<div>
		<?php
			$welcome = "Welcome, ".$_SESSION['Fname'];
			echo $welcome;
		?>
	</div>
	<div id="main">
		<!-- main content -->
		<div>
			<!-- accounts -->
			<div>
			
			</div>
			<!-- user info -->
			<div>
				<form>
					<input type="text" name="Fname" value="<?php echo $_SESSION['Fname']; ?>">
					<input type="text" name="Mname" value="<?php echo $_SESSION['Mname']; ?>">
					<input type="text" name="Lname" value="<?php echo $_SESSION['Lname']; ?>">
					<input type="text" name="email" value="<?php echo $_SESSION['Email']; ?>">
					<input type="password" name="pass" value="<?php echo $_SESSION['Pass']; ?>">
					<input type="text" name="Address1" value="<?php echo $_SESSION['Address1']; ?>">
					<input type="text" name="Address2" value="<?php echo $_SESSION['Address2']; ?>">
					<input type="text" name="City" value="<?php echo $_SESSION['City']; ?>">
					<select name="Planet">
						<option name="<?php echo $_SESSION['Planet']; ?>" placeholder="<?php echo $_SESSION['Planet']; ?>"><?php echo $_SESSION['Planet']; ?></option>
					</select>
					<input type="submit" name="update" value="update">
				</form>
			</div>
		</div>
		<!-- star wars ad -->
		<div>
			
		</div>
	</div>
</body>
</html>