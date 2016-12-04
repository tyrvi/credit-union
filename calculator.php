<!--CALCULATOR-->
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Calculator</title>
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

            <p>length in years</p>
            <input ng-change="calculate()" type="number" min="1" ng-model="lengthYears">
            <br/>
            <br/>

            <p>length in months</p>
            <p ng-change="calculate()" ng-model="lengthMonths">{{lengthMonths}}</p>
            <br/>
            <br/>

            <!-- <button ng-click="calculate()">Calculate Table</button> -->
        </div>

        <div>
            <table>
                <tr>
                    <td>Month</td>
                    <td>Principal</td>
                    <td>Current Monthly Interest</td>
                    <td>Monthly Payment</td>
                    <td>New Balance</td>
                </tr>
                <tr ng-repeat="x in table track by $index">
                    <td>{{x.month}}</td>
                    <td>{{x.principal}}</td>
                    <td>{{x.currentMonthlyInterest}}</td>
                    <td>{{x.monthPayment}}</td>
                    <td>{{x.newBalance}}</td>
                </tr>    
            </table>
        </div>
        
        
	</div>
    <script src="calculator.js"></script>
</body>
</html>