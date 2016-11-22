<?php 
	session_start();
	
	if (!array_key_exists('Email', $_SESSION)) {
		header("Location: index.php");
	}
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Hello <?php echo $_SESSION["Fname"]; ?></title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<?php
		foreach ($_SESSION as $key => $item) {
			echo "</br>";
			echo $key;
		}
		?>
	</div>
</body>
</html>