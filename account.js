var maxContacts = 3;

$(document).ready(() => {			
	$('#planets').hide();
});

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.contact = contact;
	
	var updateContacts = () => {
		$scope.contact = $scope.contact.replace(/\|$/, '');
		var con = $scope.contact.split('|');
		
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
		
		console.log($scope.contact);
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
		if($scope.contacts.length == 1)
			return;
			
		var remove = new RegExp('[^.|]+\\.' + c + '(\\||$)', 'i');
		$scope.contact = $scope.contact.replace(remove, '');
		console.log(remove);
		updateContacts();
	};
});