// 
var app = angular.module("app", []);

app.controller("ctrl", ($scope) => {
    $scope.principal = $scope.principal = 1;
    $scope.annualInterestRate = 1;
    //monthlyInterestRate = $scope.annualInterestRate / (12 * 100);
    $scope.lengthYears = 1;
    $scope.lengthMonths = $scope.lengthYears * 12;
    $scope.table = [];
    
    function calculateTable(P, J, M) {
        var results = [];
        let H = 0;
        let C = 0;
        let Q = 0;

        while (true) {
            H = P * J;
            C = M - H;
            Q = P - C;
            P = Q;
            if (P.toFixed(2) <= 0) break;
            results.push(P.toFixed(2));
        }

        return results;
    }
	
    $scope.calculate = () => {
        monthlyInterestRate = $scope.annualInterestRate / (12 * 100);
		
        $scope.lengthMonths = $scope.lengthYears * 12;

        let P = $scope.principal;
        let J = monthlyInterestRate;
        let N = $scope.lengthMonths;
        let M = P * (J/(1 - (1 + J) ** (-N)));

        $scope.monthlyPayment = M.toFixed(2);
        $scope.table = calculateTable(P, J, M);
    };
});