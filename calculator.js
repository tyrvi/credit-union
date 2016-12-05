// 
var app = angular.module("app", []);

app.controller("ctrl", ($scope) => {
    $scope.principal = 1;
    $scope.annualInterestRate = 1;
    $scope.lengthYears = 1;
    $scope.lengthMonths = $scope.lengthYears * 12;
    $scope.table = [];
    
    function calculateTable(P, J, M) {
        var results = [];
        let H = 0;
        let C = 0;
        let Q = 0;
        let month = 0;
        let totalInterest = 0;

        while (true) {
            month += 1;
            H = P * J;
            totalInterest += H;
            C = M - H;
            Q = P - C;
            P = Q;
            if (P.toFixed(2) < 0) break;
            results.push({"month": month, "payment": M.toFixed(2), "principal": C.toFixed(2), "interest": H.toFixed(2), "totalInterest": totalInterest.toFixed(2), "balance": P.toFixed(2)});
        }

        return results;
    }
	
    function validate() {
        let P = $scope.principal.toFixed(2);
        let L = $scope.lengthYears.toFixed(0);
        let A = $scope.annualInterestRate;
        
        if (P == undefined || P < 1) {
            P = 1;
        }
        if (L == undefined || L < 1 || L > 40) {
            L = 1;
        }
        if (A == undefined || A < 1 || A > 50) {
            A = 1;
        }
        return [P, L, A]
    }
	
	function createChart() {
		let labels = [];
		let principal = [];
		let interest = [];
		
		let step = 1;
		if($scope.table.length > 20) {
			step = Math.round($scope.table.length / 20);
		} 
		
		for(let i = 0; i < $scope.table.length; i += step) {
			let row = $scope.table[i];
			labels.push(row.month);
			principal.push(row.principal);
			interest.push(row.interest);
		}
		
		var ctx = document.getElementById("myChart").getContext("2d");;
		ctx.canvas.width = 400;
		ctx.canvas.height = 200;
		
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: labels,
				datasets: 
				[
					{
						label: 'Principal',
						data: principal,
						backgroundColor: [
							'rgba(121, 173, 235, 0.2)',
						],
						borderColor: [
							'rgba(121, 173, 235, 1)',
						],
						borderWidth: 2
					},
					{
						label: 'Interest',
						data: interest,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
						],
						borderColor: [
							'rgba(255,99,132,1)',
						],
						borderWidth: 2
					},
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	}

    $scope.calculate = () => {
        let P = validate()[0]; // Principal amount
        let L = validate()[1]; // length in years
        let J = validate()[2] / (12 * 100); // monthly interest rate

        $scope.lengthMonths = L * 12; // number of months
        let N = $scope.lengthMonths; 
        let M = P * (J/(1 - (1 + J) ** (-N))); // formula for monthly payment

        $scope.monthlyPayment = M.toFixed(2);
        $scope.table = calculateTable(P, J, M); // calculate the table
		
		createChart();
    };
});