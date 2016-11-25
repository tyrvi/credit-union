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
	<link rel="stylesheet" href="style.php/account.scss">
	
    <title>Hello <?php echo $_SESSION["Fname"]; ?></title>
</head>
<body ng-app="app" ng-controller="ctrl">
	<?php include_once "navbar.php"; ?>
	
	<script>
	var contact = '<?php echo $_SESSION['Contact']; ?>';
	var planet = '<?php echo $_SESSION['Planet']; ?>';
	var Fname = '<?php echo $_SESSION['Fname']; ?>';
	var Lname = '<?php echo $_SESSION['Lname']; ?>';
	var email = '<?php echo $_SESSION['Email']; ?>';
	var Address1 = '<?php echo $_SESSION['Address1']; ?>';
	var City = '<?php echo $_SESSION['City']; ?>';
	var Pass = '<?php echo $_SESSION['Pass']; ?>';
	</script>
	
	<div id="main">
		<!-- main content -->
		<div id="content">
			<!-- accounts -->
			<div></div>
			
			<?php include_once("userInfo.php"); ?>
		</div>
		
		<!-- star wars ad -->
		<div>
			
		</div>
	</div>
	
	<script src="account.js"></script>
</body>
</html>