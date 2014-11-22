@extends('layout.main')


@section('content')
<style>
h3 , h4{
	margin-top: 0px;
	margin-bottom: 5px;
} 

.myAnchor:link {
	color: #333;
}

.myAnchor:visited {
	color: #333;	
}
</style>
<script type="text/javascript">
$(document).ready(function(){

	var width = 900;
	var animationSpeed = 1000;
	var pause = 5000;
	var currentSlide = 1;

	var $slider = $('#slider');
	var $slideContainer = $slider.find('.slides');
	var $slides = $slideContainer.find('.slide');
	//copy slides1 to last
	$slideContainer.append($slides.first().clone());


	var interval;

	function startSlider(){
	  interval = setInterval(function() {
		  $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
			  currentSlide++;
				if (currentSlide === $slides.length+1) { // length+1 now...we added one
				  currentSlide = 1;
					$slideContainer.css('margin-left', 0);
			}
		});
	}, pause);
	}
				
	function stopSlider() {
	  clearInterval(interval);
	}

	$slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);

	startSlider();


});

</script>

<div id="slider">
	<ul class="slides">
		<li class="slide"><img src="img/large-udon_and_donburi.jpg" /></li>
		<li class="slide"><img src="img/large-sushi.jpg" /></li>
		<li class="slide"><img src="img/large-bento.jpg" /></li>
	</ul>
</div>
<section  id="leftsection">
<div class="floatleft">
<h3>Welcome to Japanese Kitchen WA</h3>
Japanese Kitchen WA is a authentic taste of Japanese cuisine located on 92 Victoria Avenue, 
in the centre of Wanganui. 
</div>
</section>

<aside>
<div class="floatright">
<h3>Top meal, service and setting</h3>
This is a wonderful little restaurant, you are greeted at the door with a cheery smile 
and there is a fantastic selection of cabinet choices and also an interesting menu. 
The food is fresh and delicious, the service is fast and friendly, the prices excellent. 
Another cheery smile on our way out. I would highly recommend this wonderful restaurant.
<a href="#" class="myAnchor">Read more reviews on Trip Advisor</a></div>
<div class="floatright">
<h3>Great Sushi place in Wanganui!</h3>
Friendly staff and delicious sushi! You pay for a true authentic Japanese sushi that delivers 
on taste, presentation and unique flavours that are different from your typical chicken 
varieties!
Would highly recommend for all sushi lovers and those who want to try something more 
adventurous than their typical fush and chups!
<a href="#" class="myAnchor">Read more reviews on Zomato</a></div>

</aside>
@stop

	