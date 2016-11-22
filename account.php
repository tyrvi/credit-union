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
				
			</div>
		</div>
		<!-- star wars add -->
		<div>
			
		</div>
	</div>
</body>
</html>