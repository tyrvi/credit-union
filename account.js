$(document).ready(() => {			
	$('#planets').hide();
});

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.contact = contact;
	
	var updateContacts = () => {
		var con = $scope.contact.split('|').filter((e) => {
			return e != undefined && e.length > 0;
		});
		
		$scope.contacts = [];
		for(var c of con) {
			var cc = c.split('.');
			$scope.contacts.push(
			{
				type: cc[0],
				val: cc[1]
			});
		}
	};
	updateContacts();
	
	$scope.showPlanets = () => {
		$('#planets').show();
		$('#showPlanets').hide();
	};
});