<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url()?>" ></base>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $template['title']; ?></title>
    
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="css/modern-business.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
	<link href="css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="js/Nivo-Slider-master/nivo-slider.css" type="text/css" media="screen" />

</head><!--/head-->

<body>
	
	 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="col-md-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="height: 65px">
                <a class="navbar-brand" >Logo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="height: 60px">
                <ul class="nav navbar-nav navbar-right" style="height: 65px">
                    <li style="height: 65px" <?php echo (@$active=='')?'class="active"':''; ?>>
                        <a href="index.php" style="height: 65px">HOME</a>
                    </li>
                    <li <?php echo (@$active=='one_stop_solution')?'class="active"':''; ?>>
                        <a href="one_stop_solution" style="height: 65px">ONE STOP SOLUTION</a>
                    </li>
                    <li <?php echo (@$active=='project_gallery')?'class="active"':''; ?>>
                        <a href="project_gallery" style="height: 65px">PROJECT GALLERY</a>
                    </li>
                    <li <?php echo (@$active=='catalogs')?'class="active"':''; ?>>
                        <a href="catalogs" style="height: 65px">CATALOGS</a>
                    </li>
                    <li <?php echo (@$active=='about_us')?'class="active"':''; ?>>
                        <a href="about_us" style="height: 65px">ABOUT US</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <div style="font-size: 12px;border-top: 1px solid #ff5f01;width:100%;text-align: center">
	        	<ul class="nav navbar-nav product_list" style="display:inline-block;text-align:center;float:none !important;">
			        <li <?php echo (@$active=='product_list')?'class="active"':''; ?>><a href="product_list">TILES</a></li>
			        <li><a href="product_list">DOORS</a></li>
			        <li><a href="product_list">WINDOWS</a></li>
			        <li><a href="product_list">RAILING</a></li>
			        <li><a href="product_list">BATH</a></li>
			        <li><a href="product_list">KITCHEN</a></li>
			        <li><a href="product_list">BEDROOM</a></li>
			        <li><a href="product_list">LIVING</a></li>
			        <li><a href="product_list">DINING</a></li>
			        <li><a href="product_list">OUTROOM</a></li>
			        <li><a href="product_list">LIGHTING</a></li>
			        <li><a href="product_list">DECOR</a></li>
			    </ul>
			</div>
        </div>
        <!-- /.container -->
    </nav>
    
    <? echo $template['body']; ?>
	
	<div class="footer">
		<div class="container">
	   		<div class="row">
	            <div class="col-md-12">
	            	<h3>Contact us</h3>
	                <p>Mainland International Group</p>
	                <p>
	                	
	                	Office : C, 22/F, Development Tower, Huayuan East Road, Foshan City, Guangdong Province, China <br />
						Showroom :  Huaxia Ceramic City, Nangzhuang Town, Foshan, G.D.Province, China <br />
						Tel : +86-757-83207360, +86-757-83207390 <br />
						Email : Mainland@Mainland.com.cn
	                </p>
	            </div>
	        </div>
	        COPYRIGHT © Super Living Co.,Ltd.
        <!-- /.row -->
	   	</div>
	</div>
</body>

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
</html>