var maxContacts = 3;

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
		
		if($scope.contacts.length == maxContacts) {
			$('#addContactBtn').hide();
		} else {
			$('#addContactBtn').show();
		}
	};
	updateContacts();
	
	$scope.showPlanets = () => {
		$('#planets').show();
		$('#showPlanets').hide();
	};
	
	$scope.addContact = () => {
		$scope.contact += '|Secondary.';
		updateContacts();
	};
	
	$scope.removeContact = (c) => {
		$scope.contact = $scope.contact.replace(new RegExp('[^.|]+\\.' + c + '\\|*', 'i'), '');
		console.log($scope.contact);
		updateContacts();
	};
});