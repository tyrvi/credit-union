<?php 
	session_start();
	
	// check if logged in and if they are not redirect to home page
	if (!array_key_exists('Email', $_SESSION)) {
		header("Location: login.php");
	}
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Hello <?php echo $_SESSION["Fname"]; ?></title>
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
		<?php
			/* 
			var_dump($_SESSION['Phones']);
			foreach ($_SESSION['Phones'] as $item) {
				echo "</br>";
				echo $item;
				for ($i = 0; $i < count($item); $i++) {
					echo "</br>";
					echo $item;
				}
			}
			*/
		?>
		<div>
			<!-- accounts -->
			<div>
			
			</div>
			<!-- user info -->
			<div>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input type="text" name="Fname" value="<?php echo $_SESSION['Fname']; ?>">
					<input type="text" name="Mname" value="<?php echo $_SESSION['Mname']; ?>">
					<input type="text" name="Lname" value="<?php echo $_SESSION['Lname']; ?>">
					<input type="text" name="email" value="<?php echo $_SESSION['Email']; ?>">
					<input type="hidden" name="Contact" value=""> 
					<input type="text" name="Address1" value="<?php echo $_SESSION['Address1']; ?>">
					<input type="text" name="Address2" value="<?php echo $_SESSION['Address2']; ?>">
					<input type="text" name="City" value="<?php echo $_SESSION['City']; ?>">
					<select name="Planet">
						<option name="<?php echo $_SESSION['Planet']; ?>" placeholder="<?php echo $_SESSION['Planet']; ?>"><?php echo $_SESSION['Planet']; ?></option>
					</select>
					<input type="password" name="pass" value="<?php echo $_SESSION['Pass']; ?>">
					<input type="password" name="confirm_pass" placeholder="confirm new password">
					</br>
					</br>
					</br>
					</br>
					</br>
					</br>
					<input type="submit" name="submit" value="update">
				</form>

				<?php
					// validates input
					function validate($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}	
					// change to this database when merging to master 
					//mysqli = mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "b7974b78735401", "50849710", "icudb");

					// open connection to database
					$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
					
					// check for database connection error
					if ($mysqli->connect_errno) {
						echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}

					$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Pass = $confirm_pass = $email = "";
					$Phone = $Planet = ""; // These are not yet ready to be processed

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$Fname = validate($_POST['Fname']);
						$Mname = validate($_POST['Mname']);
						$Lname = validate($_POST['Lname']);				
						$Address1 = validate($_POST['Address1']);
						$Address2 = validate($_POST['Address2']);
						$City = validate($_POST['City']);
						$Pass = validate($_POST['pass']);
						$confirm_pass = validate($_POST['confirm_pass']);
						$email = validate($_POST['email']);
						// still need to be handled in the form
						$Phone = validate($_POST['Phone']); // This one will be tricky
						$Planet = validate($_POST['Planet']);

						if ($_SESSION['Planet'] != $Planet) {
							$form = "UPDATE customers
							SET Fname='$Fname', Mname='$Mname', Lname='$Lname', Address1='$Address1', Address2='$Address2', City='$City', Planet='$Planet', Email='$email', Pass='$Pass' 
							WHERE C_Id = '$_SESSION[C_Id]'";
						}
						else {
							$form = "UPDATE customers
							SET Fname='$Fname', Mname='$Mname', Lname='$Lname', Address1='$Address1', Address2='$Address2', City='$City', Email='$email', Pass='$Pass' 
							WHERE C_Id = '$_SESSION[C_Id]'";
						}
						
						//$mysqli->query($form);
						
						if ($mysqli->query($form) === TRUE) {
							echo "Update successful";
						}
						else {
							echo "Error: ".$form."<br>".$mysqli->error;
						}
						
					}

					mysqli_close($mysqli);
				?>
			</div>
		</div>
		<!-- star wars ad -->
		<div>
			
		</div>
	</div>
</body>
</html>