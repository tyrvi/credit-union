<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Log in</title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<!-- Content -->
		<div style="display:inline-block; position:absolute; text-align:center; margin-left:50%; margin-right:50%;">
			<form name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div><input type="text" name="username" placeholder="ID or email"></div>
				<div><input type="password" name="pass" value="Password"></div>
				<div><input type="submit" name="submit" value="submit">
			</form>
		</div>
		<?php
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			//echo $mysqli->host_info . "\n";
			$username = $password = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_POST["username"];
				$password = $_POST["pass"];
			}

			//$res = $mysqli->query("SELECT C_Id from cudb.customers where C_Id = $username")
		?>
	</div>
</body>
</html>