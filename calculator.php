<!--CALCULATOR-->
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Calculator</title>
	<link rel="stylesheet" href="style.php/calculator.scss">
</head>
<body ng-app="app", ng-controller="ctrl">
	<!--<?php include_once "navbar.php"; ?>-->
	<div id="main">
		<div id="calculator">
	        <div class="row">
	            <div class="col-md-4">
					<div class="row">
						<p>Principal</p>
					</div>
					<div class="row">
	            		<input ng-change="calculate()" type="number" min="0" ng-model="principal" class="form-control">
					</div>
				</div>
				
				<div class="col-md-4">
	            	<p>Annual Interest Rate</p>
	            	<input ng-change="calculate()" type="number" min="1" max="100" ng-model="annualInterestRate" class="form-control">
				</div>
				
				<div class="col-md-4">
	            <p>Length in Years</p>
	            <input ng-change="calculate()" type="number" min="1" ng-model="lengthYears" class="form-control">
			</div>	
            	<p>monthly interest rate</p>
            	<p ng-change="calculate()" ng-model="monthlyInterestRate">{{monthlyInterestRate}}</p>
				
	            <p>length in months</p>
	            <p ng-change="calculate()" ng-model="lengthMonths">{{lengthMonths}}</p>

            <table>
        <div>
        </div>
                <tr>
                    <td>Month</td>
                    <td>Principal</td>
                    <td>Current Monthly Interest</td>
                    <td>Monthly Payment</td>
                <tr ng-repeat="x in table track by $index">
                    <td>New Balance</td>
                </tr>
                    <td>{{x.month}}</td>
                    <td>{{x.principal}}</td>
                    <td>{{x.currentMonthlyInterest}}</td>
                    <td>{{x.monthPayment}}</td>
            </table>
                </tr>    
                    <td>{{x.newBalance}}</td>
        
        
	</div>
    <script src="calculator.js"></script>
</body>
</html>