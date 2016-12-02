<!--CALCULATOR-->
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>TITLE</title>
</head>
<body ng-app="app", ng-controller="ctrl">
	<!--<?php include_once "navbar.php"; ?>-->
	<div id="main">
		<!-- Content -->
        <input ng-change="testchange()" type="text" ng-model="test">
          
        <h1>{{test}}</h1>
        
	</div>
    <script src="calculator.js"></script>
</body>
</html>