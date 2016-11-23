var maxContacts = 3;

$(document).ready(() => {			
	$('#planets').hide();
});

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

	$scope.telChange = () => {
		$scope.Phone = $scope.Phone.replace(/-/g, '');
		$scope.Phone = $scope.Phone.replace(/\D/g, '');

		if ($scope.Phone.length > 3) {
			$scope.Phone = $scope.Phone.slice(0, 3) + '-' + $scope.Phone.slice(3);
		}

		if ($scope.Phone.length > 7) {
			$scope.Phone = $scope.Phone.slice(0, 7) + '-' + $scope.Phone.slice(7);
		}

		if ($scope.Phone.length > 11) {
			$scope.Phone = $scope.Phone.slice(0, 12);
		}
	}

	$scope.validate = () => {
		errors = [];
		
		var check = (id, validator) => {
			e = validators[validator]($scope[id]);
			if(e != undefined) {
				errors.push({id: id, error: e});
			}
		};	
		
		switch(curPage) {
			case 0:
				check('Fname', 'Required');
				check('Lname', 'Required');
				break;
			case 1:
				check('DOB', 'DOB');
				check('Phone', 'Phone');
				check('SS', 'SS');
				break;
			case 2:
				check('gender', 'Required');
				break;
			case 3:
				check('City', 'Required');
				check('Address1', 'Required');
				break;
			case 5:
				check('email', 'Email');
				check('pass', 'Pass');
				
				if($scope.confirm_pass != $scope.pass) {
					errors.push({id: 'confirm_pass', error: 'Passwords must match'});
				}
				break;
		}
		
		$('.apply-error').html('');
		for(let e of errors) {
			$('#' + e.id + 'Err').html(e.error);
		}
		
		return errors.length == 0;
	};
	
	$scope.update = () => {
		var valid = $scope.validate();
		if (valid) {
			/*
			$.ajax({
					type: 'POST',
					url: 'account.php',
					data: $('#applyForm').serialize(),
					success: () => {},
					error: () => {},
			});
			*/
		}
	};
});