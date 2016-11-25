<div id="userInfo">
	<h3>Account Information</h3>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#basicInfo">Basic Info</a></li>
		<li><a data-toggle="tab" href="#addressInfo">Address</a></li>
		<li><a data-toggle="tab" href="#contactInfo">Contact</a></li>
	</ul>
	
	<form id="userInfoForm" method="post" action="updateUserInfo.php">
		<div class="tab-content">
			<div id="basicInfo" class="tab-pane fade in active">
				<p>Email:</p>
				<input ng-model="email" class="form-control" type="text" name="Email" readonly="readonly" value="<?php echo $_SESSION['Email']; ?>">
				<br />
				<br />
				
				<p>First Name:</p>
				<input ng-model="Fname" class="form-control" type="text" name="Fname" value="<?php echo $_SESSION['Fname']; ?>">
				<br />
				<p id="FnameErr" class="apply-error"></p>
				<br />
				
				<p>Middle Name:</p>
				<input ng-model="Mname" class="form-control" type="text" name="Mname" value="<?php echo $_SESSION['Mname']; ?>">	
				<br />
				<br />
				
				<p>Last Name:</p>
				<input ng-model="Lname" class="form-control" type="text" name="Lname" value="<?php echo $_SESSION['Lname']; ?>">
				<br />
				<p id="LnameErr" class="apply-error"></p>
				<br />

				<!--PASSWORD STUFF-->
				<p>Password:</p>
				<input ng-model="pass" class="form-control" type="password" name="pass" value="<?php echo $_SESSION['Pass']; ?>">
				<br />
				<p id="passErr" class="apply-error"></p>
				<br />
				
				<p>Confirm Password:</p>
				<input ng-model="confirm_pass" class="form-control" type="password" name="confirm_pass" placeholder="confirm new password">
				<br />
				<p id="confirm_passErr" class="apply-error"></p>
				<br />
			</div>
			
			<div id="addressInfo" class="tab-pane fade">
				<p>Address 1:</p>
				<input ng-model="Address1" class="form-control" type="text" name="Address1" value="<?php echo $_SESSION['Address1']; ?>">
				<br />
				<p id="Address1Err" class="apply-error"></p>
				<br />
				
				<p>Address 2:</p>
				<input ng-model="Address2" class="form-control" type="text" name="Address2" value="<?php echo $_SESSION['Address2']; ?>">
				<br />
				<br />
				
				<p>City:</p>
				<input ng-model="City" class="form-control" type="text" name="City" value="<?php echo $_SESSION['City']; ?>">
				<br />
				<p id="CityErr" class="apply-error"></p>
				<br />
				
				<p>Planet:</p>
				<select ng-model="Planet" id="planets" class="form-control" name="Planet">
					<?php include('planets.php'); ?>
				</select>
				<br />
			</div>
			
			<div id="contactInfo" class="tab-pane fade">
				<input type="hidden" name="Contact" value="{{contact}}">
				<div ng-repeat="c in contacts" class="contact">
					<select ng-model="c.type" ng-change="contactChange()">
						<option placeholder="Primary">Primary</option>
						<option placeholder="Secondary">Home</option>
						<option placeholder="Secondary">Work</option>
						<option placeholder="Secondary">Subspace Transceiver</option>
						<option placeholder="Secondary">Mobile</option>
						<option placeholder="Secondary">Fax</option>
					</select>
					<input ng-model="c.val" ng-change="contactChange()" class="form-control" type="text" value="{{c.val}}">
					<button ng-click="removeContact($index)" type="button">-</button>
					<br />
					<p class="contact-error">{{c.err}}</p>
					<br />
				</div>
				<button id="addContactBtn" ng-click="addContact()" type="button">+</button>
			</div>
			<button ng-click="update()" type="button">Update</button>
			<input ng-click="update()" type="submit" value="submit" />
		</div>
	</form>
</div>