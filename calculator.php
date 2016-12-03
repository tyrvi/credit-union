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
        <div>
            <p>principal</p>
            <input ng-change="calculate()" type="number" min="0" ng-model="principal">
            <br/>
            <br/>

            <p>annual interest rate</p>
            <input ng-change="calculate()" type="number" min="1" max="100" ng-model="annualInterestRate">
            <br/>
            <br/>

            <p>monthly interest rate</p>
            <input type="number" ng-model="monthlyInterestRate">
            <br/>
            <br/>

            <p>length in years</p>
            <input type="number" min="0" ng-model="lengthYears">
            <br/>
            <br/>

            <p>length in months</p>
            <input ng-change="calculate()" type="number" min="0" ng-model="lengthMonths">
            <br/>
            <br/>

            <p></p>
            <h1 ng-model="result">{{result}}</h1>
        </div>
        
        
	</div>
    <script src="calculator.js"></script>
</body>
</html>