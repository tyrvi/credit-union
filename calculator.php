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
	            <div class="col-sm-4">
					<div class="row">
						<p>Principal</p>
					</div>
					<div class="row">
	            		<input ng-change="calculate()" type="number" min="0" ng-model="principal" class="form-control">
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="row">
	            		<p>Annual Interest Rate</p>
					</div>
					<div class="row">
	            		<input ng-change="calculate()" type="number" min="1" max="100" ng-model="annualInterestRate" class="form-control">
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="row">
	            		<p>Length in Years</p>
					</div>
					<div class="row">
	            		<input ng-change="calculate()" type="number" min="1" ng-model="lengthYears" class="form-control">
					</div>
				</div>
			</div>
			
			<div style="text-align: left; margin-left: 18px;">
	            <p>Length in Months: {{lengthMonths}}</p>
			</div>
			
			<table>
                <tr>
                    <th width="12%">Month</th>
                    <th width="12%">Principal</th>
                    <th width="36%">Current Monthly Interest</th>
                    <th width="24%">Monthly Payment</th>
					<th width="16%">New Balance</th>
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