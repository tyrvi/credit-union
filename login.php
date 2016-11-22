<?php
	// open connection to database
	$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
	
	// check for database connection error
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$username = $password = "";
	
	// TO-DO: these nested statements are so bad need to fix them at some point
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["pass"];

		$res = $mysqli->query("SELECT Email, Pass from cudb.customers where Email = '$username'");
		$row = $res->fetch_assoc();
		
		if ($row === NULL || $row["Pass"] != $password) {
			$GLOBALS['badLogin'] = true;
		}
		else {
			header('Location: account.php');
			$GLOBALS['badLogin'] = false;
		}
	}
	mysqli_close($mysqli);
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
	<link rel="stylesheet" href="style.php/login.scss">
    <title>Log in</title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		
		<div class="login">
			<img class="login-image" src="images/atat.png">
			<div>
				<div class="login-text">
					WELCOME TO THE DARKSIDE
				</div>
				<div class="login-box">
					<div class="login-box-text">ICU</div>
					<form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<input class="form-control" type="text" name="username" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="pass" placeholder="Password">
						</div>
						<div class="form-group">
							<input class="form-control" type="submit" name="submit" value="Login">
						</div>
						<div>
						<?php 
							if($GLOBALS['badLogin']) {
								echo 'Incorrect password/email';
							}
						?>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<?php include_once "footer.php"; ?>
	</div>
</body>
</html>