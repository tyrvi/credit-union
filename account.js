var maxContacts = 3;

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.contact = contact;
	$scope.Planet = planet;
	
	function updateContacts() {
		// Update DB representation
		$scope.contact = '';
		for(var c of $scope.contacts) {
			$scope.contact += c.type + '.' + c.val + '|';
		}
		
		// Check if we should show the add button or not
		if($scope.contacts.length == maxContacts) {
			$('#addContactBtn').hide();
		} else {
			$('#addContactBtn').show();
		}
	};
	
	function getContacts() {
		$scope.contact = contact.replace(/\|$/, '');
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
		updateContacts();
	};
	getContacts();
	
	$scope.showPlanets = () => {
		$('#planets').show();
		$('#showPlanets').hide();
	};
	
	$scope.addContact = () => {
		$scope.contacts.push(
		{
			val: '',
			type: 'Home'
		});
		updateContacts();
	};
	
	$scope.removeContact = (c) => {
		$scope.contacts.splice(c, 1);
		updateContacts();
	};
	
	$scope.contactChange = () => {
		updateContacts();
	};
});