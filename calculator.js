var app = angular.module("app", []);

app.controller("ctrl", ($scope) => {
    $scope.test = "hello";
    $scope.testchange = () => {
        $scope.test += "#";
    };
});