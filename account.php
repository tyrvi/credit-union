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
	var Mname = '<?php echo $_SESSION['Mname']; ?>';
	var Lname = '<?php echo $_SESSION['Lname']; ?>';
	var email = '<?php echo $_SESSION['Email']; ?>';
	var Address1 = '<?php echo $_SESSION['Address1']; ?>';
	var City = '<?php echo $_SESSION['City']; ?>';
	var Pass = '<?php echo $_SESSION['Pass']; ?>';
	</script>
	
	<div id="main">
		<div id="deathstar">
			<div id="backdrop"></div>
			<div id="message-holder">
				<div id="message">
					<div style="text-align: center;">
						<h1 style="font-family: federation;">JOIN THE IMPERIAL GUARD!</h1>
						<h4 style="position: relative; bottom: 10px;">We want you to join the ever growing community built to destory the rebel scum!</h4>
					</div>
					<img width="400" src="http://img12.deviantart.net/5284/i/2013/300/3/7/darth_vader_uncle_sam_poster_by_fyredesign-d6s3djr.jpg">
					
					<div style="width: 40vw;"><h2 style="display: inline;">Email:</h2><input id="email-signup" style="width=calc(100% - 200px);" type="text" class="form-control"></div>
					
					<div id="button-holder">
						<button id="register-signup">Register</button>
						<button id="cancel-signup">No Thanks</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- main content -->
		<div id="content">
			<?php include_once("userInfo.php"); ?>
		</div>
	</div>
	<?php include_once "footer.php"; ?>
	<script src="account.js"></script>
	
	<script>
	$(document).ready(() => {
		setTimeout(() => {
			$('#deathstar').addClass('active');
		}, 4000);
		
		$('#register-signup').click(() => {
			$('#deathstar').removeClass('active');
		});
		
		$('#cancel-signup').click(() => {
			$('#deathstar').removeClass('active');
		});
	});
	</script>
</body>
</html>