$(document).ready(() => {			
	$('#planets').hide();
});

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.showPlanets = () => {
		$('#planets').show();
		$('#showPlanets').hide();
	};
});