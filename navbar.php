<?php 
	session_start();
	$GLOBALS['loggedIn'] = array_key_exists('Email', $_SESSION);
?>

<link rel="stylesheet" href="style.php/navbar.scss">

<div id="menu" class="inactive">
	<div id="menu-button">
		<span id="menu-shadow"></span>
		<span id="menu-icon"><span class="bars-and-x inactive"></span></span>
	</div>
	<div id="menu-inner">
		<?php if($GLOBALS['loggedIn']): ?>
		<div id="menu-signout">
			<span>HELLO </span>
			<a><?php echo $_SESSION['Fname']; ?></a>
		</div>
		<?php endif; ?>
		<ul class="list-group">
			<a href="index.php">
				<li class="list-group-item">
					<div class="highlight"></div>
					<div class="highlight2"></div>
					<a href="index.php">Home</a>
				</li>
			</a>
			<a href="calculator.php">
				<li class="list-group-item">
					<div class="highlight"></div>
					<div class="highlight2"></div>
					<div>Calculator</div>
				</li>
			</a>
			<a href="account.php">
				<li class="list-group-item">
					<div class="highlight"></div>
					<div class="highlight2"></div>
					<div>Account</div>
				</li>
			</a>
			<a href="apply.php">
				<li class="list-group-item">
					<div class="highlight"></div>
					<div class="highlight2"></div>
					<div>Apply</div>
				</li></a>
			<a href="
			<?php
				if($GLOBALS['loggedIn'])
					echo 'signout.php';
				else
					echo 'login.php';
			?>">
				<li class="list-group-item">
					<div class="highlight"></div>
					<div class="highlight2"></div>
					<div>
					<?php 
						if($GLOBALS['loggedIn'])
							echo 'Sign Out';
						else
							echo 'Log In';
					?>
					</div>
				</li>
			</a>
		</ul>
		<div class="menu-social">
			<img class="menu-social-icon" width="80px" src="images/Twitter_Social_Icon_White.png"/>
			<img class="menu-social-icon" width="49px" src="images/FB-f-Logo__white_512.png"/>
			<img class="menu-social-icon" width="56px" src="images/LinkedIn-In-White-128px-TM.png"/>
		</div>
	</div>
</div>

<script>
(function() {

var active = false;
var menuShadowSize;
var listGroupItemTransition;
var socialIconTransition;
var menuSizeTimeout;

function onActivate() {
	$('#menu-shadow').css('width', 'calc(200vw + 100vh)');
	$('#menu-shadow').css('height', 'calc(200vw + 100vh)');
	
	$('#menu').removeClass('inactive');
	$('#menu').addClass('active');
	
	$('#menu-icon .bars-and-x').removeClass('inactive');
	$('#menu-icon .bars-and-x').addClass('active');
	
	$('#main').css('filter', 'blur(4px)');
	
	$('#menu-inner').css('display', 'block');
	
	$('#menu-inner .list-group-item').css('transition', 'none');
	$('#menu-inner .list-group-item').css('top', 40);
	$('#menu-inner .list-group-item').css('opacity', 0);
	$('#menu-inner .list-group-item').each(function(i, obj) {
		setTimeout(function() {
			$(obj).css('transition', listGroupItemTransition);
			$(obj).css('top', 0);
			$(obj).css('opacity', 1);
		}, 120 + i * 150);
	});
	
	$('.menu-social-icon').css('transition', 'none');
	$('.menu-social-icon').css('opacity', 0);
	$('.menu-social-icon').css('top', '20px');
	$('.menu-social-icon').each(function(i, obj) {
		setTimeout(function() {
			$(obj).css('transition', socialIconTransition);
			$(obj).css('top', 0);
			$(obj).css('opacity', 1);
		}, 450 + i * 150);
	});
	
	setTimeout(() => { 
		$('#menu-signout').addClass('active');
	}, 400);
}

function onDeactivate() {
	$('#menu-shadow').css('width', menuShadowSize);
	$('#menu-shadow').css('height', menuShadowSize);
	
	if(menuSizeTimeout) {
		clearTimeout(menuSizeTimeout);
	}
	menuSizeTimeout = setTimeout(function() {
		if(!active) {
			$('#menu').removeClass('active');
			$('#menu').addClass('inactive');
		}
	}, 1000);
		
	$('#menu-icon .bars-and-x').removeClass('active');
	$('#menu-icon .bars-and-x').addClass('inactive');
	
	$('#main').css('filter', 'none');
	
	$('#menu-inner').css('display', 'none');
	
	$('#menu-signout').removeClass('active');
}

$(document).ready(function() {
	menuShadowSize = $('#menu-shadow').css('width');
	listGroupItemTransition = $('#menu-inner .list-group-item').css('transition');
	socialIconTransition = $('.menu-social-icon').css('transition');
	
	$('#menu-button').click(function() {
		if(active) {
			onDeactivate();
		} else {
			onActivate();
		}
		active = !active;
	});
});

})();
</script>