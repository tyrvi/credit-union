<!DOCTYPE <html>
<html>
<head>
    <?php include_once "includes.php" ?>
	<link rel="stylesheet" href="style.php/apply.scss">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <title>Apply</title>
</head>

<body>
	<?php include_once "navbar.php"; ?>
	<script>
	(() => {
		var dotW = 20;
		var lineW = 44;
		
		$(document).ready(() => {			
			$('#apply-caption-carousel').on('slide.bs.carousel', (e) => {
			    var slideTo = $(e.relatedTarget).index();
				var maxW = $('.apply-progress').innerWidth();		
				var w = dotW * (slideTo + 1) + lineW * (slideTo);
				$('.apply-current-progress').css('width', w + 'px');
				$('.apply-current-slider').css('width', w + 'px');
			});

			$('#apply-next').click(() => {
				$('#apply-caption-carousel').carousel('next');
					
				setTimeout(() => { 
					$('#apply-carousel').carousel('next'); 
				}, 200);
			});
			
			$('#apply-prev').click(() => {
				$('#apply-caption-carousel').carousel('prev');
					
				setTimeout(() => { 
					$('#apply-carousel').carousel('prev'); 
				}, 200);
			});
		});
	})();
	</script>
	<div id="main" ng-app="app" ng-controller="ctrl">
		<a id="apply-next">Next</a>
		<a id="apply-prev">Prev</a>
		<div class="apply">
			<div class="apply-text">Join the dark side.</div>
			<form class="apply-box" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<span class="apply-progress">
					<span class="apply-progress-point"></span>
					<span class="apply-progress-point"></span>
					<span class="apply-progress-point"></span>
				</span>
				
				<div class="apply-current-progress">
					<span class="apply-progress-point"></span>
					<span class="apply-progress-point"></span>
					<span class="apply-progress-point"></span>
				</div>
				
				<div id="apply-caption-carousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="apply-mini-form">
								<p>Tell us about yourself.</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Hello {{name}}</p>
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<p>Woah there</p>
							</div>
						</div>
					</div>
				</div>
				<div class="apply-break"></div>
				<div id="apply-carousel" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="apply-mini-form">
								<input ng-model="name" class="form-control" type="text" name="Fname" placeholder="First Name">
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<input class="form-control" type="text" name="Fname" placeholder="First Name">
							</div>
						</div>
						<div class="item">
							<div class="apply-mini-form">
								<input class="form-control" type="text" name="Fname" placeholder="First Name">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
			// validates input and makes sure it is not corrupt or malicious
			function validate($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			//$link = mysqli_connect("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			
			$mysqli = new mysqli("us-cdbr-azure-central-a.cloudapp.net", "b3749d9a9bbf00", "c55f1efd", "cudb");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			//echo $mysqli->host_info . "\n";
			//init variables for form collection/validation
			$Fname = $Mname = $Lname = $Address1 = $Address2 = $City = $Phone = $Planet = $SS = $Pass = $confirm_pass = $email = $DOB = $gender = "";
			
			// collect form values
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$Fname = validate($_POST["Fname"]);
				$Mname = validate($_POST["Mname"]);
				$Lname = validate($_POST["Lname"]);				
				$Address1 = validate($_POST["Address1"]);
				$Address2 = validate($_POST["Address2"]);
				$City = validate($_POST["City"]);
				$Phone = validate($_POST["Phone"]);
				$SS =validate($_POST["SS"]);
				$Pass = validate($_POST["pass"]);
				$confirm_pass = validate($_POST["confirm_pass"]);
				$email = validate($_POST["email"]);
				$DOB = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["DOB"])));
				$gender = validate($_POST["gender"]);
				$Planet = validate($_POST["Planet"]);
				if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				echo "This $email is not a valid email address.";
				}
				$form = "INSERT INTO customers (Fname, Mname, Lname, Address1, Address2, City, Planet, DOB, SS, Email, Pass) 
				VALUES ('$Fname', '$Mname', '$Lname', '$Address1', '$Address2', '$City', '$Planet', '$DOB', '$SS', '$email', '$Pass')";

				if ($mysqli->query($form) === TRUE) {
					echo "Application successful!";
				} 
				else {
					echo "Error: ".$form."<br>".$mysqli->error;
				}
			}
			
			
			/*$res = $mysqli->query("select * from cudb.customers where C_Id=1;");

			$row = $res->fetch_assoc();
			echo gettype($row);
			
			foreach($row as $item) {
				echo "<br>";
				echo $item;
			}*/

			mysqli_close($mysqli);
		?>
	</div>
	<script>
	var app = angular.module('app', []);
	app.controller('ctrl', ($scope) => {
		
	});
	</script>
</body>
</html>