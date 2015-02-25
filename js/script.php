<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/Nivo-Slider-master/jquery.nivo.slider.js"></script>

<!-- fancyBox -->
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="js/fancyapps-fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/fancyapps-fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="js/fancyapps-fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="js/fancyapps-fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="js/fancyapps-fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="js/fancyapps-fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="js/fancyapps-fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="js/fancyapps-fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<!-- fancyBox -->

<!-- project gallery -->
<script type="text/javascript" src="js/simple-portfolio-page/js/jquery.easing.min.js"></script>	
<script type="text/javascript" src="js/simple-portfolio-page/js/jquery.mixitup.min.js"></script>

<script type="text/javascript" src="js/jQuery.dotdotdot-master/src/js/jquery.dotdotdot.min.js"></script>
	
<script type="text/javascript">
	$(document).ready(function() {
		$('.info-detail').dotdotdot();
		$('.catalos_detail').dotdotdot();
		
		$('#slider').nivoSlider({
			directionNav: true,
		    pauseTime: 4000
		});
		
		$('#slider_project_gallery').nivoSlider({
			directionNav: true,
			controlNav:false,
		    pauseTime: 4000
		});
		
		/*
		 *  Button helper. Disable animations, hide close button, change title type and content
		 */

		$('.fancybox-buttons').fancybox({
			openEffect : 'elastic',
			openSpeed  : 150,
			
			closeEffect : 'elastic',
			closeSpeed  : 150,

			prevEffect : 'none', 
			nextEffect : 'none',

			closeBtn  : false,

			helpers : {
				title : {
					type : 'inside'
				},
				buttons	: {}
			},

			afterLoad : function() {
				this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' <br /> ' + this.title : '');
			}
		});
		
		
		/* project gallery */
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					animation: {
						duration: 400,
						effects: 'fade translateZ(-360px) stagger(34ms)',
						easing: 'ease'
					},
					/*
					effects: ['fade'],
					easing: 'ease',*/
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: 0}, 500, 'easeOutQuad');
						//$(this).find('.label').show();
						//$(this).find('img').hide();				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: '-100%'}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
		/* end project gallery */
	 });
</script>