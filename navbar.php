<style>

#menu-button {
	position: fixed;
	top: 20px;
	left: 20px;
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

#menu {
	/*background-color: #2a1c1c;*/
	width: 100vw;
	height: 100vh;
	position: fixed;
	left: -100vw;
	right: 0;
	/*transition: ease-in-out 0.4s;*/
	z-index: 20000;
}

#menu-inner {
	position: relative;
	left: 0px;
	top: 120px;
	/*background-color: #311f1f;*/
	/*border: 8px solid #311f1f;*/
	width: 500px;
	height: calc(100vh);
	transition: ease-in-out 0.3s;
	z-index: 20000;
	overflow: hidden;
}

#menu-inner .list-group {
	-webkit-box-shadow: none;
	box-shadow: none;
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

.del {
	position: absolute;
	width: 500px;
	height: calc(100vh);
	overflow: hidden;
	z-index: 20000;
}

#menu-button {
	position: relative;
	left: 70px;
	top: 70px;
	transform: translate(-50%, -50%);
}
</style>

<div class="del">
	

<div id="menu-button">
	<i class="menu-icon fa fa-bars" aria-hidden="true"></i>
</div>
</div>




<div id="menu-exit-button">
	<i class="menu-icon fa fa-times" aria-hidden="true"></i>
</div>

<div id="menu">
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
			  <a>Sign up</a>
		  </li>
		</ul>
	</div>
</div>


<script>
(function() {

var menuButtonTop;
var menuButtonTopAway = '-100px';
var menuLeftAway;

$(document).ready(function() {
	menuButtonTop = $('#menu-button').css('top');
	menuLeftAway = $('#menu').css('left');
	listGroupItemTransition = $('#menu-inner .list-group-item').css('transition');
	
	$('#menu-button').click(function() {
		//$('#menu-button').css('top', menuButtonTopAway);
		$('#menu-button').css('width', 'calc(100vw + 100vh)');
		$('#menu-button').css('height', 'calc(100vw + 100vh)');
		
		
		$('#main').css('filter', 'blur(4px)');
		
		setTimeout(function() {
			$('#menu').css('left', 0);
		}, 100);
		
		setTimeout(function() {
			$('#menu-exit-button').css('top', menuButtonTop);
		}, 200);
		
		$('#menu-inner .list-group-item').css('transition', 'none');
		$('#menu-inner .list-group-item').css('top', 40);
		$('#menu-inner .list-group-item').css('opacity', 0);
		$('#menu-inner .list-group-item').each(function(i, obj) {
			setTimeout(function() {
				$(obj).css('transition', listGroupItemTransition);
				$(obj).css('top', 0);
				$(obj).css('opacity', 1);
			}, i * 150);
		});
	});
	
	$('#menu-exit-button').click(function() {
		$('#menu').css('left', menuLeftAway);
		$('#menu-button').css('top', menuButtonTop);
		$('#menu-exit-button').css('top', menuButtonTopAway);
		$('#main').css('filter', 'none');
	});
});

})();
</script>