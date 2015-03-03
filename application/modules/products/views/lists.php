<?
	function product_block($obj) {
		?>
		<div class="col-md-4 div_col-4_product_list text-center">
            <div class="thumbnail">
            	<a href="<? echo $obj->path_image; ?>" data-fancybox-group="button" class="fancybox-buttons" 
            		title="<span>
		                    	<b>Model Number: <? echo $obj->model_number; ?></b>
		                    	<p>Size : <? echo $obj->model_size; ?></p>
		                    </span>"
            	>
                    <img class="img-responsive" src="<? echo $obj->path_image; ?>" alt="">
                </a>
                <div class="caption detail_product">
                    <p>Model Number : <? echo $obj->model_number; ?></p>
                    <p>Size : <? echo $obj->model_size; ?></p>
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
	            			echo '<li ';
								echo ($item->id == @$child->id) ? 'class="active"' : null ;
	            			echo '><a href="products/lists/'.$cat_1->id.'/'.$item->id.'">'.$item->title.'</a></li>';
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
			
			<?
				if(count($rs->all) == 0) {
					echo '<div style="color:#aaa; text-align:center;"> No data </div>';
				} else {
					foreach($rs as $item) {
						product_block($item);
					}
				}
					
				echo $rs->pagination();
			?>
			
        </div> <!-- col-md-8 -->
    </div>
    
    <div class="col-md-12"><hr /></div>
</div>