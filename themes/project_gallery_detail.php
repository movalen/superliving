<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <?php require_once('css/css.php'); ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

   <!-- Navigation -->
   <?php @$_GET['active'] = 'project_gallery_detail'; ?>
   <?php require_once('menu.php'); ?>
    
	<div class="container container_body">
		<div class="col-lg-12 header_list">
            <h3 class="page-header">PROJECT GALLERY NAME</h3>
            <div class="col-md-12 breadcrumb">
            		<a href="index.php">HOME</a> >
            		<a href="project_gallery.php">PROJECT GALLERY</a> >
                    <span class="active">PROJECT GALLERY DETAIL</span>
            </div>
        </div>
        
        	
        <div class="col-md-12">
        	<div class="row" align="center">
        		<div class="slider-wrapper theme-default">
		            <div id="slider_project_gallery" class="nivoSlider" style="height: 350px; width: 850px;">
		                <img src="images/201412121534064730.jpg" data-thumb="images/201412121534064730.jpg" alt="" />
		                <img src="images/201412121534243780.jpg" data-thumb="images/201412121534243780.jpg" alt="" />
		                <img src="images/201412260857166770.jpg" data-thumb="images/201412260857166770.jpg" alt="" />
		            </div>
		        </div> 
        	</div>
        		
        	
   			<div class="row">
            	<div class="col-md-12">
		        	<div class="underline-heading">
			          <h3>Project Description</h3>
			        </div>
			        
			        <p>Project Description Detail</p>
			        	
			    </div>
		    </div>
		    
    	</div>  
	    
	    <div class="col-md-12"><hr /></div> 
    </div>
    
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
	        COPYRIGHT © 1992-2015 Mainland International Group
        <!-- /.row -->
	   	</div>
	</div>

    
    <!-- jQuery -->
    <?php require_once('js/script.php'); ?>
</body>

</html>