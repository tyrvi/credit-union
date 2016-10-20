<link rel="stylesheet" href="style.php/caption.scss">

<script>
(function() {

var height = 40;
var statements = ['World', 'Future', 'Community', 'Bank'];
var animation = 'ease-in 0.3s';

$(document).ready(function() {
	var caption1 = $('#caption1');
	var caption2 = $('#caption2');
	
	caption1.css('transform', 'none');
	caption2.css('transform', 'matrix3d(1, 0, 0, 0, 0, 0, -1, 0, 0, 1, 0, 0, 0,' + (height/2) + ',' + (-height) + ', 1)');
	caption1.html(statements[0]);
	caption2.html(statements[0]);
	
	setTimeout(function() {
		$('#caption').children().css('transition', animation);
	}, 100);
	
	$('#mainCarousel').on('slid.bs.carousel', function(e) {
		var slideIndex = $(e.relatedTarget).index();
		
		$('#caption').children().css('transition', 'none');
		caption1.css('transform', 'none');
		caption2.css('transform', 'matrix3d(1, 0, 0, 0, 0, 0, -1, 0, 0, 1, 0, 0, 0,' + (height/2) + ',' + (-height) + ', 1)');
		
		var text = caption2.html();
		caption1.html(text);
		caption2.html(statements[slideIndex]);
		
		setTimeout(function() {
			$('#caption').children().css('transition', animation);
			caption1.css('transform', 'matrix3d(1, 0, 0, 0, 0, 0, 1, 0, 0, -1, 0, 0, 0,' + (-height/2) + ',' +  (-height) + ', 1)');
			caption2.css('transform', 'none');
		}, 40);
	});
});

})();
</script>

<div id="mainCarousel" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="4000">
	<ol class="carousel-indicators">
		<li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#mainCarousel" data-slide-to="1"></li>
		<li data-target="#mainCarousel" data-slide-to="2"></li>
		<li data-target="#mainCarousel" data-slide-to="3"></li>
	</ol>
	
	<div width="20px" id="caption">
		<p id="caption-intro">BUILD A BETTER</p>
		<b id="caption1"></b>
		<b id="caption2"></b>
	</div>
	
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="http://a.dilcdn.com/bl/wp-content/uploads/sites/6/2014/08/imperial_officers_rotj-2400x1200-394899181649.jpg" alt="Chania">
		</div>

		<div class="item">
			<img src="http://bi9he1w7hz8qbnm2zl0hd171.wpengine.netdna-cdn.com/wp-content/uploads/2015/04/des1020-4k_pub_still_pnt-1179-2.jpg" alt="Chania">
		</div>

		<div class="item">
			<img src="https://s-media-cache-ak0.pinimg.com/originals/66/ba/23/66ba232d545247c2381700ebb20f3b31.png" alt="Flower">
		</div>

		<div class="item">
			<img src="https://thehothspot.files.wordpress.com/2013/08/mos_espa.png" alt="Flower">
		</div>
	</div>
</div>
