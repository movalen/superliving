<?
	function product_block($obj) {
		$thumb = (empty($obj->path_thumb))?$obj->path_image:$obj->path_thumb;
		$thumb = (empty($thumb))?'media/images/noimage_coverpage.png':$thumb;
		
		$image = (empty($obj->path_image))?$thumb:$obj->path_image;
		?>
		<div class="col-md-4 div_col-4_product_list text-center">
            <div class="thumbnail">
            	<a href="<? echo $image; ?>" data-fancybox-group="button" class="fancybox-buttons" 
            		title="<span>
		                    	<b style='word-wrap: break-word;'>Model Number: <? echo $obj->model_number; ?></b>
		                    	<p style='word-wrap: break-word;'>Size : <? echo $obj->model_size; ?></p>
		                    </span>"
            	>
                    <img class="img-responsive" style="width: 180px; height: 180px" src="<? echo $thumb; ?>" alt="">
                </a>
                <div class="caption detail_product">
                    <p title="<? echo $obj->model_number; ?>">Model Number : <? echo $obj->model_number; ?></p>
                    <p title="<? echo $obj->model_size; ?>">Size : <? echo $obj->model_size; ?></p>
                </div>
            </div>
        </div>
		<?	
	}
?>
<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header"><? echo $cat_1->title; ?></h3>
        <div class="col-md-12 breadcrumb"> <? echo $nav; ?> </div>
    </div>
    	
    <div class="col-md-12">
        <div class="col-md-4 div_col-4_product_menu">
        	<div class="series"><h4>SERIES</h4></div>
            <ul class="nav nav-pills nav-stacked menu_sub_product">
            	<?
            		if(count($cat_1->child->all) == 0) {
            			echo '<li><a href="#no_data" style="color:#aaa;" onclick="return false;">No data</a></li>';
            		} else {
            			foreach($cat_1->child as $item) {
            				if($item->status == 1) {
            					if(count($item->child->all) >= 1 && $item->sub_cat_status == 1) {
            						$main_status = 0;
            						foreach($item->child as $item2) {
            							if($child->id == $item2->id) {
            								$main_status = 1;
            							} 
            						}
            						echo '<li ';
										echo (($item->id == @$child->id) || $main_status == 1) ? 'class="active"' : null ;
			            			echo '>';
			            				echo '<a href="javascript:;" data-toggle="collapse" data-target="#cat_'.$item->id.'">';
			            					echo $item->title.' <i class="fa fa-fw fa-caret-down"></i>';
			            				echo '</a>';
										
										echo '<ul class="nav menu_sub_product1 collapse ';
											echo ($main_status == 1) ? 'in' : false ;
										echo '" id="cat_'.$item->id.'">';
										foreach($item->child as $item2) {
											echo '<li';
												echo ($item2->id == $child->id)?' class="active" ':false;
											echo '>';
												echo '<a href="products/lists/'.$item->parent_id.'/'.$item2->id.'">';
												echo ' - '.$item2->title;
												echo '</a>';
											echo '</li>';
										}
										echo '</ul>';
			            			echo '</li>';
            					} else {
            						echo '<li ';
										echo ($item->id == @$child->id) ? 'class="active"' : null ;
			            			echo '><a href="products/lists/'.$cat_1->id.'/'.$item->id.'">'.$item->title.'</a></li>';
            					}
	            					
            				}	
	            		}
            		}	
            	?>
			</ul>
        </div>
        
        <div class="col-md-8 div_col-8_product_list">
        	<div class="col-md-12">
        		<div class="form-group" >
        			<form action='' method='get'>
		        		<div class="input-group">
							<input type="text" name='s_box' class="form-control" data-fancybox-group="button" placeholder="Search for..." value="<? echo @$_GET['s_box']; ?>">
							<span class="input-group-btn">
								<? echo form_submit(false, 'Search', 'class="btn btn-default"'); ?>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12">
			<?
				if(count($rs->all) == 0) {
					echo '<div style="color:#aaa; text-align:center;"> No data </div>';
				} else {
					foreach($rs as $item) {
						product_block($item);
					}
				}
			echo "</div>";	
			echo '<div class="col-md-12 text-center">';
				echo $rs->pagination();
			echo '</div>';
			?>
			
        </div> <!-- col-md-8 -->
    </div>
    
    <div class="col-md-12"><hr /></div>
</div>