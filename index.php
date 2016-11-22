<?php 
	session_start();
?>
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>credit union test page</title>
<style>

.fudge, .fudge2 {
	position: absolute;
	left: 0;
	right: 0;
	padding: 0;
	margin: 0;
	background-color: red;
}

#main {
	transition: 0.2s filter;
}
</style>

</head>
<body>
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<?php include_once "caption.php"; ?>
		<?php include_once "statement.php"; ?>
		<!-- <?php include_once "recommendations.php"; ?> -->
	</div>
</body>
</html>
