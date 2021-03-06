<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url()?>" ></base>
    <meta charset="utf-8">
    <title><? echo $template['title']; ?></title>
    
    <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="css/modern-business.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
	<link href="css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="js/Nivo-Slider-master/nivo-slider.css" type="text/css" media="screen" />

	<?
		$path_info = @explode('/', $_SERVER['PATH_INFO']);
		$path_info = @$path_info[1];
		
		$menu = array(
			0 => array(
				'title' => 'HOME',
				'link' => '',
				'active' => array(
					'', 
					'home'
				)
			),
			1 => array(
				'title' => 'ONE STOP SOLUTION',
				'link' => 'one_stop_solution',
				'active' => array(
					'one_stop_solution'
				)
			),
			2 => array(
				'title' => 'PROJECT GALLERY',
				'link' => 'gallerys',
				'active' => array(
					'gallerys'
				)
			),
			3 => array(
				'title' => 'CATALOGS',
				'link' => 'catalogs',
				'active' => array(
					'catalogs'
				)
			),
			4 => array(
				'title' => 'ABOUT US',
				'link' => 'about_us',
				'active' => array(
					'about_us'
				)
			)
		);
		
		
		
		//Header
			//--logo
			$logo = new Contact();
			$logo
				->where('type', 'logo')
				->get(1);
			$logo = @$logo->detail;
			$logo = (empty($logo))?'<span style="line-height:50px;">Logo</span>':'<img src="'.$logo.'" />';
			
	?>
</head><!--/head-->

<body>
	
	 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="border-radius:0px;">
        <div class="col-md-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="min-height: 65px; display:inline-block; padding:8px; margin:0px;">
                <a class="navbar-brand" style="float:none; display:block; padding:0px;"> <? echo $logo; ?> </a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="height: 60px">
                <ul class="nav navbar-nav navbar-right" style="height: 65px">
                	<? foreach($menu as $item) {
                		?>
                		<li style="height:65px;" <? echo (in_array($path_info, $item['active']))?"class='active'":null; ?>>
                			<a href="<? echo $item['link']; ?>"  style="height: 65px"><? echo $item['title']; ?></a>
                		</li>
                		<?
                	} ?>
                	<!--
                    <li style="height: 65px" <?php echo (@$path_info=='')?'class="active"':''; ?>>
                        <a href="index.php" style="height: 65px">HOME</a>
                    </li>
                    <li <?php echo (@$path_info=='one_stop_solution')?'class="active"':''; ?>>
                        <a href="one_stop_solution" style="height: 65px">ONE STOP SOLUTION</a>
                    </li>
                    <li <?php echo (@$path_info=='gallerys')?'class="active"':''; ?>>
                        <a href="project_gallery" style="height: 65px">PROJECT GALLERY</a>
                    </li>
                    <li <?php echo (@$path_info=='catalogs')?'class="active"':''; ?>>
                        <a href="catalogs" style="height: 65px">CATALOGS</a>
                    </li>
                    <li <?php echo (@$path_info=='about_us')?'class="active"':''; ?>>
                        <a href="about_us" style="height: 65px">ABOUT US</a>
                    </li>
                   -->
                </ul>
            </div>
            
            <!-- /.navbar-collapse -->
            <div style="font-size: 12px;border-top: 1px solid #ff5f01;width:100%;text-align: center">
	        	<ul class="nav navbar-nav product_list" style="display:inline-block;text-align:center;float:none !important;">
        		    <? 
						$menu_category = @explode('/', $_SERVER['PATH_INFO']);

	        			$category = new Category();
						$category	->where('status', 1)
									//->group_start()
										->where('parent_id', 0)
									//	->where('parent_id is null')
									//->group_end()
									->get();

	        			foreach($category as $item) {
	        				echo '<li ';
								if(@$menu_category[1] == 'products' && @$menu_category[3] == $item->id) {
									echo ' class="active"';
								}
	        				echo '>';
								echo '<a href="products/lists/'.$item->id.'">'.$item->title.'</a>';
	        				echo '</li>';
	        				#echo '<li><a href="product/'.$item->id.'">'.$item->title.'</a></li>';
	        			}
	        		?>
	        		<!--
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
			        -->
			    </ul>
			</div>
        </div>
        <!-- /.container -->
    </nav>
    <div style="min-height:51%;">
    	<? echo $template['body']; ?>
    </div>
	
	<div class="footer">
		<div class="container">
	   		<div class="row">
	            <div class="col-md-12">
	            	<h3>Contact us</h3>
	            	<?
	            		$contact = new Contact();
						$contact->where('type', 'contact_us')
								->get(1);
								
						echo $contact->detail; 
	            	?>
	            </div>
	        </div>
	        COPYRIGHT © SuperLiving Co.,Ltd.
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