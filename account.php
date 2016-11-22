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
    <title>TITLE</title>
</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<!-- Content -->
		<?php
		foreach ($_SESSION as $item) {
			echo "</br>";
			echo $item;
		}
		?>
	</div>
</body>
</html>