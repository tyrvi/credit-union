var maxContacts = 3;

var validators = {
	'Required' : (val) => {
		if(val == undefined || val == '')
			return 'Required';
	},
	'Phone': (phone) => {
		if(phone == undefined)
			return 'Required';
		
		phone = phone.replace(/-/g, '');
		phone = phone.replace(/\(/g, '');
		phone = phone.replace(/\)/g, '');
		phone = phone.replace(/ /g, '');
		if(/\D+/.test(phone) || phone.length != 10)
			return 'Please enter a valid phone number';
	},
	'Email': (email) => {
		if(!/.+@.+/.test(email))
			return 'Must be a valid email address';
	},
	'Pass': (pass) => {
		if(pass == undefined || pass == '') 
			return 'Required';
		if (pass.length < 8)
			return 'Your password must be at least 8 characters';
		if (!/\d/g.test(pass))
			return 'Your password must contain at least 1 digit';
		if (!/[A-Z]+/g.test(pass))
			return 'Your password must have at least 1 uppercase letter'; 
	}
};

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.contact = contact;
	$scope.Fname = Fname;
	$scope.Mname = Mname;
	$scope.Lname = Lname;
	$scope.email = email;
	$scope.Address1 = Address1;
	$scope.City = City;
	$scope.pass = Pass;
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

	$scope.validate = () => {
		errors = [];

		var check = (id, validator) => {
			e = validators[validator]($scope[id]);
			if(e != undefined) {
				errors.push({id: id, error: e});
			}
		};	
		
		check('Fname', 'Required');
		check('Lname', 'Required');
		check('City', 'Required');
		check('Address1', 'Required');
		check('email', 'Email');
		check('pass', 'Pass');
		//check('contact', 'Phone')

		$('.apply-error').html('');
		for(let e of errors) {
			$('#' + e.id + 'Err').html(e.error);
		}
		
		return errors.length == 0;
	};

	$scope.update = () => {
		var valid = $scope.validate();

		if (valid) {
			$.ajax({
				type: 'POST',
				url: 'account.php',
				data: $('#userInfoForm').serialize(),
				success: () => {},
				error: () => {},
			});
		};
	};
});