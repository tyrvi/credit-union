<style>

#menu-button {
	z-index: 200000;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 100%;
	cursor: pointer;
	
	transition: width ease-in 4s, height ease-in 4s;
}

.menu-icon {
	font-size: 38px;
	position: absolute;
	color: white;
	transition: color ease-in-out 0.2s;
}

#menu-button:hover .menu-icon, #menu-exit-button:hover .menu-icon {
	color: #ec2a2a;
}

#menu-exit-button {
	position: fixed;
	top: -100px;
	right: 20px;
	background-color: rgba(0, 0, 0, 0.6);
	width: 80px;
	height: 80px;
	z-index: 200000;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 100%;
	cursor: pointer;
	
	transition: ease-in 0.3s;
}

#menu-inner {
	display: none;
	position: relative;
	left: 50%;
	transform: translate(-50%, 0);
	top: 120px;
	width: 400px;
	height: calc(100vh);
	transition: ease-in-out 0.3s;
	z-index: 20000;
	overflow: hidden;
	text-align: center;
}

#menu-inner .list-group {
	-webkit-box-menu-shadow: none;
	box-menu-shadow: none;
}

#menu-inner .list-group-item {
	position: relative;
	transition: ease-in-out 0.3s;
	background-color: transparent;
	border: none;
	border-bottom: 2px solid rgba(255, 255, 255, 0.2);
	color: rgba(255, 255, 255, 0.8) !important;
	font-size: 30px;
	text-transform: uppercase;
	font-family: federation;
	letter-spacing: 4px;
	cursor: pointer;
}

#menu-inner * {
	color: white;
	text-decoration: none;
}

#menu-button:hover > #menu-icon {
	color: rgb(220, 30, 30);
}

.list-group-item .highlight {
	background-color: rgba(255, 255, 255, 0.2);
	position: absolute;
	left: 50%;
	top: 0;
	width: 0;
	height: 100%;
	transform: translateX(-50%);
	transition: width ease-in-out 0.2s;
}

.list-group-item:hover .highlight {
	width: 100%;
}

.list-group-item .highlight2 {
	background-color: rgba(255, 255, 255, 0.8);
	position: absolute;
	left: 50%;
	bottom: 2px;
	width: 0;
	height: 2px;
	border-radius: 20px;
	transform: translateX(-50%);
	transition: width 0.4s;
}

.list-group-item:hover .highlight2 {
	width: 40%;
}

#menu {
	position: absolute;
	width: 500px;
	height: calc(100vh);
	overflow: hidden;
	z-index: 20000;
}

@media screen and (max-width: 860px) {
	#menu {
		width: 100%;
	}
}

#menu-shadow {
	position: fixed;
	top: 56px;
	left: 56px;
	transform: translate(-50%, -50%);
	background-color: rgba(0, 0, 0, 0.6);
	width: 80px;
	height: 80px;
	border-radius: 100%;
	transition: 0.4s ease-in;
}

.bars-and-x, .bars-and-x:before, .bars-and-x:after {
	border-radius: 1px;
	height: 5px;
	width: 35px;
	position: absolute;
	display: block;
	content: '';
	background: white;
}

#menu-icon {
	position: fixed;
	left: 39px;
	top: 53px;
}

#menu-button:hover .bars-and-x.inactive, #menu-button:hover .bars-and-x:before, #menu-button:hover .bars-and-x:after {
	background-color: red;
}

.bars-and-x:before {
	top: -10px;
}

.bars-and-x:after {
	bottom: -10px;
}

.bars-and-x, .bars-and-x:before, .bars-and-x:after {
	transition: all 0.4s ease-in-out;
}

.bars-and-x.active {
	background-color: transparent;
}

.bars-and-x.active:before, .bars-and-x.active:after {
	top: 0;
}

.bars-and-x.active:before {
	transform: rotate(45deg);
}

.bars-and-x.active:after {
	transform: rotate(-45deg);
}

.menu-social {
	display: flex;
	justify-content: space-around;
	align-items: center;
	position: absolute;
	width: 100%;
	left: -16px;
	top: calc(100vh - 212px);
}

.menu-social-icon {
	position: relative;
	cursor: pointer;
	transition: ease-out 0.2s;
}

.menu-social-icon:hover {
	top: -5px !important;
}

</style>

<div id="menu">
	<div id="menu-button">
		<span id="menu-shadow"></span>
		<span id="menu-icon"><span class="bars-and-x inactive"></span></span>
	</div>
	<div id="menu-inner">
		<ul class="list-group">
		  <li class="list-group-item">
			  <div class="highlight"></div>
			  <div class="highlight2"></div>
			  <a>Home</a>
		  </li>
		  <li class="list-group-item">
			  <div class="highlight"></div>
			  <div class="highlight2"></div>
			  <a>Invest</a>
		  </li>
		  <li class="list-group-item">
			  <div class="highlight"></div>
			  <div class="highlight2"></div>
			  <a>Borrow</a>
		  </li>
		  <li class="list-group-item">
			  <div class="highlight"></div>
			  <div class="highlight2"></div>
			  <a>Apply</a>
		  </li>
		  <li class="list-group-item">
			  <div class="highlight"></div>
			  <div class="highlight2"></div>
			  <a>Log In</a>
		  </li>
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

function onActivate() {
	$('#menu-shadow').css('width', 'calc(200vw + 100vh)');
	$('#menu-shadow').css('height', 'calc(200vw + 100vh)');
	
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
}

function onDeactivate() {
	$('#menu-shadow').css('width', menuShadowSize);
	$('#menu-shadow').css('height', menuShadowSize);
	
	$('#menu-icon .bars-and-x').removeClass('active');
	$('#menu-icon .bars-and-x').addClass('inactive');
	
	$('#main').css('filter', 'none');
	
	$('#menu-inner').css('display', 'none');
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