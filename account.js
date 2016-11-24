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
		updateContacts();
	};
	
	$scope.contactChange = () => {
		console.log($scope.contacts);
		
		$scope.contact = '';
		$('.contact').each((i, e) => {
			var type = $(e).children('.contactType')[0].innerHTML;
			var val = $(e).children('input').val();
			$scope.contact += type + '.' + val + '|';
		});
	};
});