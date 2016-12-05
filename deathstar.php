<link rel="stylesheet" href="style.php/deathstar.scss">

<div id="deathStarBackdrop"></div>
<div id="deathStar">
	<h1>JOIN THE DEATHSTAR PROJECT</h1>
	<img width="500px" src="https://www.wired.com/wp-content/uploads/2015/12/Death-Star-v2.jpg"/>
	<div>
		<button id="deathStarNo">NO THANKS</button>
		<button id="deathStarYes">YES PLEASE</button>
	</div>
</div>

<script>
$(document).ready(() => {
	setTimeout(() => {
		$('#deathStar').addClass('active');
		$('#deathStarBackdrop').addClass('active');
	}, 100);
});
</script>