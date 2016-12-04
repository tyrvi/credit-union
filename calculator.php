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

            <p>monthly interest rate</p>
            <p ng-change="calculate()" ng-model="monthlyInterestRate">{{monthlyInterestRate}}</p>
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

            <p>Monthly Payment</p>
            <h1 ng-model="monthlyPayment">{{monthlyPayment}}</h1>

            <!-- <button ng-click="calculate()">Calculate Table</button> -->
        </div>

        <div>
            <table>
                <tr ng-repeat="x in table track by $index">
                    <td>{{x}}</td>
                </tr>    
            </table>
        </div>
        
        
	</div>
    <script src="calculator.js"></script>
</body>
</html>