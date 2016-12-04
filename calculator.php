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
                    <input ng-change="calculate()" type="number" min="1" max="40" ng-model="lengthYears" class="form-control">
                </div>
            </div>
		</div>					
	            <p>length in months</p>
	            <p ng-change="calculate()" ng-model="lengthMonths">{{lengthMonths}}</p>
        <table>
            <tr>
                <td>Month</td>
                <td>Payment</td>
                <td>Principal</td>
                <td>Interest</td>
                <td>Total Interest</td>
                <td>Balance</td>
            </tr>
            <tr ng-repeat="x in table track by $index">            
                <td>{{x.month}}</td>
                <td>{{x.payment}}</td>
                <td>{{x.principal}}</td>
                <td>{{x.interest}}</td>
                <td>{{x.totalInterest}}</td>
                <td>{{x.balance}}</td>
            </tr>  
        </table>
                  
	</div>
    <script src="calculator.js"></script>
</body>
</html>