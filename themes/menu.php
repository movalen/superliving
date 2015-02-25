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
                    <li style="height: 65px" <?php echo (@$_GET['active']=='')?'class="active"':''; ?>>
                        <a href="index.php" style="height: 65px">HOME</a>
                    </li>
                    <li <?php echo (@$_GET['active']=='one_stop_solution')?'class="active"':''; ?>>
                        <a href="one_stop_solution.php" style="height: 65px">ONE STOP SOLUTION</a>
                    </li>
                    <li <?php echo (@$_GET['active']=='project_gallery')?'class="active"':''; ?>>
                        <a href="project_gallery.php" style="height: 65px">PROJECT GALLERY</a>
                    </li>
                    <li <?php echo (@$_GET['active']=='catalogs')?'class="active"':''; ?>>
                        <a href="catalogs.php" style="height: 65px">CATALOGS</a>
                    </li>
                    <li <?php echo (@$_GET['active']=='about_us')?'class="active"':''; ?>>
                        <a href="about_us.php" style="height: 65px">ABOUT US</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <div style="font-size: 12px;border-top: 1px solid #ff5f01;width:100%;text-align: center">
	        	<ul class="nav navbar-nav product_list" style="display:inline-block;text-align:center;float:none !important;">
			        <li <?php echo (@$_GET['active']=='product_list')?'class="active"':''; ?>><a href="product_list.php">TILES</a></li>
			        <li><a href="product_list.php">DOORS</a></li>
			        <li><a href="product_list.php">WINDOWS</a></li>
			        <li><a href="product_list.php">RAILING</a></li>
			        <li><a href="product_list.php">BATH</a></li>
			        <li><a href="product_list.php">KITCHEN</a></li>
			        <li><a href="product_list.php">BEDROOM</a></li>
			        <li><a href="product_list.php">LIVING</a></li>
			        <li><a href="product_list.php">DINING</a></li>
			        <li><a href="product_list.php">OUTROOM</a></li>
			        <li><a href="product_list.php">LIGHTING</a></li>
			        <li><a href="product_list.php">DECOR</a></li>
			    </ul>
			</div>
        </div>
        <!-- /.container -->
    </nav>