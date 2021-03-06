<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<? echo site_url(); ?>"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Superliving - Administrator</title>



    <!-- jQuery -->
    <script src="media/template/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="media/template/admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!--
    <script src="media/template/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="media/template/admin/js/plugins/morris/morris.min.js"></script>
    <script src="media/template/admin/js/plugins/morris/morris-data.js"></script>
    -->
	
    <!-- Bootstrap Core CSS -->
    <link href="media/template/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="media/template/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="media/template/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="media/template/admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="media/template/admin/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="media/template/admin/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style teyp='text/css'>
		html, body{
		  height:100%;
		  margin:0px;
		  padding:0px;
		}
		
		.pagination span.current {
			background:#428bca;
			color:#fff;
			
		}
	</style>
	
	<? echo $template['metadata']; ?>
</head>

<body>

    <div id="wrapper"  style="min-height:100%;">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">
                Back office : <? echo anchor('', 'Views'); ?>
                </span>
                
                
            </div>
            <? echo anchor('admin/signout', 'Sign out', 'class="btn btn-danger" style="float:right; margin:10px;"'); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?
            	$path_info = @explode('/', $_SERVER['PATH_INFO']);
				$path_info = @strtolower($path_info[2]);
				$menu = array(
					'Home' => array(
						'link' => 'admin',
						'active' => array('', 'index')
					),
					'Profile' => array(
						'link' => 'admin/profiles',
						'active' => array('profiles')
					),
					
					'Manage site' => array(
						'type' => 'collape', 
						'name' => 'managesite',
						'child' => array(
							'Change logo' => array(
								'link' =>'admin/logos',
								'active' => array('logos')
							),
							'Hilight' => array(
								'link' => 'admin/hilights',
								'active' => array('hilights')
							)
						)
					),
					'ONE STOP SOLUTION' => array(
						'link' => 'admin/links',
						'active' => array('links')
						),
					
					'Product data' => array(
						'type' => 'collape',
						'name' => 'product',
						'child' => array(
							'Category' => array(
		            			'link' => 'admin/categorys',
		            			'active' => array('categorys')
							),
							'Product' => array(
								'link' => 'admin/products',
								'active'=>array('products')
							)
						)
					),
					'Gallery' => array(
						'link' => 'admin/gallerys',
						'active' => array('gallerys')
					),
					'Catalog' => array(
						'link' => 'admin/catalogs',
						'active' => array('catalogs')
					),
					'Contact' => array(
						'type' => 'collape',
						'name' => 'contact',
						'child' => array(
							'About us' => array(
								'link' => 'admin/about_us',
								'active' => array('about_us')
							),
							'Contact us' => array(
								'link' => 'admin/contact_us',
								'active' => array('contact_us')
							)
						)
					),
					'User' => array(
						'link' => 'admin/users',
						'active' => array('users')
					)
				);
			?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	<?
                		foreach($menu as $title => $attr) {
                			if(@$attr['type'] != 'collape') {
                				echo "<li ";
									echo (in_array($path_info, $attr['active']))?'class="active"':null; 
	                			echo ">";
	                				echo anchor($attr['link'], ucfirst($title));
	                			echo "</li>";
                			} else {
                				//Check active
                				$active = 0;
                				foreach($attr['child'] as $c_title => $c_attr) {
                					if(in_array($path_info, $c_attr['active'])) {
                						$active = 1;
                					}
                				}
								
								
                				echo '<li ';
									echo ($active == 1)?'class="active"':null;
                				echo '>';
									echo '<a href="javascript:;" data-toggle="collapse" data-target="#'.$attr['name'].'">'.$title.' <i class="fa fa-fw fa-caret-down"></i></a>';
									echo '<ul id="'.$attr['name'].'" class="collapse ';
										echo ($active == 1)?'in':null;
									echo '">';
										foreach($attr['child'] as $c_title => $c_attr) {
											echo '<li>';
											
												echo '<a href="'.$c_attr['link'].'" ';
													echo (in_array($path_info, $c_attr['active']))?'style="font-weight:bold; color:#fff;"':null;
												echo '>';
													echo $c_title;
												echo '</a>';
											echo '</li>';
										}
									echo '</ul>';
								echo '</li>';
                			}
                		}
                	?>
                	<!--
                    <li>
                        <a href="media/template/admin/index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="media/template/admin/charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="media/template/admin/tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="media/template/admin/forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="media/template/admin/bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="media/template/admin/bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="media/template/admin/#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="media/template/admin/#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="media/template/admin/blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                   -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style='padding-top:60px; min-height:45.9em; background:#fff;'>
        	<div class="container-fluid" style=''>
        		<div class="row">
                    <div class="col-lg-12">
        				<? echo $template['body']; ?>
        			</div>
        		</div>
        	</div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


</body>

</html>
