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
   <?php @$_GET['active'] = 'catalogs'; ?>
   <?php require_once('menu.php'); ?>
    
	<div class="container container_body">
		<div class="col-lg-12 header_list">
            <h3 class="page-header">CATALOGS</h3>
            <div class="col-md-12 breadcrumb">
            		<a href="index.php">HOME</a> >
                    <span class="active">CATALOGS</span>
            </div>
        </div>
        
        	
        <div class="col-md-12">
        	<div class="text-center">
	        	<div class="row">
	        		<div class="col-md-4">
	        			<div class="text-center">
	        				<a href="catalog_view.php">
		        				<img src="images/201412191636023500.jpg" />
		        			</a>
		        			<p class="catalos_detail" style="height: 50px">PORCELAIN GLAZED TILES</p>
	        			</div>
	        		</div>
	        		
	        		<div class="col-md-4">
	        			<div class="text-center">
	        				<a href="catalog_view.php">
		        				<img src="images/201412191635058930.jpg" />
		        			</a>
		        			<p class="catalos_detail" style="height: 50px">POLISHED TILES</p>
	        			</div>
	        		</div>
	        		
	        		<div class="col-md-4">
	        			<div class="text-center">
	        				<a href="catalog_view.php">
		        				<img src="images/201412191634152910.jpg" />
		        			</a>
		        			<p class="catalos_detail" style="height: 50px;">FULLY POLISHED PORCELAIN GLAZED TILES</p>
		        		</div>
	        		</div>
	        		
	        		<div class="col-md-4">
	        			<div class="text-center">
	        				<a href="catalog_view.php">
		        				<img src="images/201412191633203490.jpg" />
		        			</a>
		        			<p class="catalos_detail" style="height: 50px">CRYSTALLITE PORCELAIN TILES</p>
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