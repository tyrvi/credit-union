<!--CALCULATOR-->
<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
    <title>Calculator</title>
	<link rel="stylesheet" href="style.php/calculator.scss">
</head>
<body ng-app="app", ng-controller="ctrl">
	<?php include_once "navbar.php"; ?>
	<div id="main">
		<div id="calculator">
			<h1>Amortization Calculator</h1>
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
					<div style="text-align: center; font-size: 16px;">
			            <p>Length in Months: {{lengthMonths}}</p>
					</div>
				</div>
			</div>
			
			<canvas id="myChart" width="50" height="50"></canvas>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
			<table>
            <tr>
                <th width="16%">Month</th>
                <th width="16%">Payment</th>
                <th width="16%">Principal</th>
                <th width="16%">Interest</th>
                <th width="16%">Total Interest</th>
                <th width="16%">Balance</th>
            </tr>
            <tr ng-repeat="x in table track by $index">            
                <td>{{x.month}}</td>
                <td>{{x.payment}}<span>$</span></td>
                <td>{{x.principal}}<span>$</span></td>
                <td>{{x.interest}}<span>$</span></td>
                <td>{{x.totalInterest}}<span>$</span></td>
                <td>{{x.balance}}<span>$</span></td>
            </tr>  
        </table>
		</div>
	</div>
    <script src="calculator.js"></script>
</body>
</html>