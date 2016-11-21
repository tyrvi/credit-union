const dotW = 20;
const lineW = 44.4;
var skip = false;
var curPage = 0;

$(document).ready(() => {			
	$('[data-toggle="popover"]').popover();
	
	$('#apply-caption-carousel').on('slide.bs.carousel', (e) => {
		var slideTo = $(e.relatedTarget).index();
		curPage = slideTo;
		
		var maxW = $('.apply-progress').innerWidth();
		var w = dotW * (slideTo + 1) + lineW * (slideTo);
		$('.apply-current-progress').css('width', w + 'px');
		$('.apply-current-slider').css('width', w + 'px');
		
		if(curPage == 5) {
			$('#submit').addClass('lastPage');
			$('#apply-next').addClass('lastPage');
		} else {
			$('#submit').removeClass('lastPage');
			$('#apply-next').removeClass('lastPage');
		}
	});
	
	$('#apply-prev').click(() => {
		$('#apply-caption-carousel').carousel('prev');
			
		setTimeout(() => { 
			$('#apply-carousel').carousel('prev'); 
		}, 200);
	});
});

var validators = {
	'Required' : (val) => {
		if(val == undefined || val == '')
			return 'Required';
	},
	'DOB': (dob) => {
		if(dob == undefined)
			return 'Required';
		if(new Date().getFullYear() - dob.getFullYear() < 18) 
			return 'Must be 18 years or older';
	},
	'Phone': (phone) => {
		if(phone == undefined)
			return 'Required';
		
		phone = phone.replace(/-/g, '');
		phone = phone.replace(/\(/g, '');
		phone = phone.replace(/\)/g, '');
		phone = phone.replace(/ /g, '');
		if(/.*\D.*/.test(phone))
			return 'Please enter a valid phone number';
	},
	'SS': (ss) => {
		if(ss == undefined)
			return 'Required';
		
		ss = ss.replace(/-/g, '');
		if(/.*\D.*/.test(ss) || ss.length != 9)
			return 'Please enter a valid social security number';
	},
	'Email': (email) => {
		if(!/.+@.+/.test(email))
			return 'Must be a valid email address';
	},
};

var app = angular.module('app', []);
app.controller('ctrl', ($scope) => {
	$scope.income = 100;
	
	$scope.socialSecChange = () => {
		$scope.SS = $scope.SS.replace(/-/g, '');
		$scope.SS = $scope.SS.replace(/\D/, '');
		
		if($scope.SS.length > 3) {
			$scope.SS = $scope.SS.slice(0, 3) + '-' + $scope.SS.slice(3);
		}
		
		if($scope.SS.length > 6) {
			$scope.SS = $scope.SS.slice(0, 6) + '-' + $scope.SS.slice(6);
		}
		
		if($scope.SS.length > 10) {
			$scope.SS = $scope.SS.slice(0, 11);
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
				check('pass', 'Required');
				check('confirm_pass', 'Required');
				
				if($scope.confirm_pass != $scope.pass) {
					errors.push({id: 'confirm_pass', error: 'Passwords must match'});
				}
				break;
		}
		
		return errors;
	};
	
	$scope.next = () => {
		errors = $scope.validate();
		$('.apply-error').html('');
		
		if(errors.length == 0 || skip) {
			$('#apply-caption-carousel').carousel('next');
			
			setTimeout(() => { 
				$('#apply-carousel').carousel('next'); 
			}, 200);
		} else for(let e of errors) {
			$('#' + e.id + 'Err').html(e.error);
		}
	};
});