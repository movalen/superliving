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
   <?php @$_GET['active'] = 'project_gallery'; ?>
   <?php require_once('menu.php'); ?>
    
	<div class="container container_body">
		<div class="col-lg-12 header_list">
            <h3 class="page-header">PROJECT GALLERY</h3>
            <div class="col-md-12 breadcrumb">
            		<a href="index.php">HOME</a> >
                    <span class="active">PROJECT GALLERY</span>
            </div>
        </div>
        
        	
        <div class="col-md-12">
        	<!--
        	<div class="row">
        		<ul id="filters" class="clearfix">
					<li><span class="filter active" data-filter="type_1 type_2">All</span></li>
					<li><span class="filter" data-filter="type_1">Type 1</span></li>
					<li><span class="filter" data-filter="type_2">Type 2</span></li>
				</ul>
        	</div>
        	-->
        	
        	<div class="row" id="portfoliolist">
        		
        		<div class="portfolio type_1 col-md-4" data-cat="type_1">
					<div class="portfolio-wrapper">				
						<img src="images/201412171141528240.jpg" alt="" />
						<div class="label">
							<div class="label-text">
								<a href="project_gallery_detail.php" class="text-title" title="
										Bird Document Document Document Document Document Document Document Document Document DocumentDocumentDocumentDocumentDocumentDocument DocumentDocument DocumentDocument">
									<i class="fa fa-search"></i><br>
									<p class="text-title-detail">
										Bird Document Document Document Document Document Document Document Document Document DocumentDocumentDocumentDocumentDocumentDocument DocumentDocument DocumentDocument
									</p>
								</a>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>
				
				<div class="portfolio type_2 col-md-4" data-cat="type_2">
					<div class="portfolio-wrapper">				
						<img src="images/201412121621266280.jpg" alt="" />
						<div class="label">
							<div class="label-text">
								<a href="project_gallery_detail.php" class="text-title">
									<i class="fa fa-search"></i><br>
									<p class="text-title-detail">
										Bird Document
									</p>
								</a>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>
        		
        		
        		<div class="portfolio type_1 col-md-4" data-cat="type_1">
					<div class="portfolio-wrapper">				
						<img src="images/201412171144478790.jpg" alt="" />
						<div class="label">
							<div class="label-text">
								<a href="project_gallery_detail.php" class="text-title">
									<i class="fa fa-search"></i><br>
									<p class="text-title-detail">
										Bird Document
									</p>
								</a>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>
				
				<div class="portfolio type_2 col-md-4" data-cat="type_2">
					<div class="portfolio-wrapper">				
						<img src="images/201412121621266280.jpg" alt="" />
						<div class="label">
							<div class="label-text">
								<a href="project_gallery_detail.php" class="text-title">
									<i class="fa fa-search"></i><br>
									<p class="text-title-detail">
										Bird Document
									</p>
								</a>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
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