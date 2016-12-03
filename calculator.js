var app = angular.module("app", []);

app.controller("ctrl", ($scope) => {
    $scope.principal = 0;
    $scope.annualInterestRate = 1;
    $scope.monthlyInterestRate = $scope.annualInterestRate * (12/100);
    $scope.lengthYears = 1;
    $scope.lengthMonths = $scope.lengthYears * 12;
    $scope.result = 0;
    /*
    let P = $scope.principal;
    let J = $scope.monthlyInterestRate;
    let N = $scope.lengthMonths;
    $scope.result = P * (J/(1 - (1 + J) ** -N));
    */
    $scope.calculate = () => {
        let P = $scope.principal;
        let J = $scope.monthlyInterestRate;
        let N = $scope.lengthMonths;
        let M = P * (J/(1 - (1 + J) ** -N));

        $scope.result = M.toFixed(2);
        //return $scope.result;
    };
});