<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header"><? echo $head; ?></h3>
        <div class="col-md-12 breadcrumb"> <? echo $nav; ?> </div>
    </div>
    	
    	
    <?
    	if(count($album->gallery_dtls->all) == 0) {
    		echo '<div style="color:#bbb; text-align:center; height:350px; padding-top:120px;">No image</div>';
    	} else {
  	  ?>
	     <div class="col-md-12">
	    	<div class="row" align="center">
	    		<div class="slider-wrapper theme-default">
		            <div id="slider_project_gallery" class="nivoSlider" style="height: 350px; width: 850px;">
		            	<!--
		                <img src="images/201412121534064730.jpg" data-thumb="images/201412121534064730.jpg" alt="" />
		                <img src="images/201412121534243780.jpg" data-thumb="images/201412121534243780.jpg" alt="" />
		                <img src="images/201412260857166770.jpg" data-thumb="images/201412260857166770.jpg" alt="" />
		               -->
		                <?
		                	if(!empty($album->path_cover)) {
		                		echo '<img src="'.$album->path_cover.'" data-thumb="'.$album->path_thumb.'"/>';
		                	}
								
	                		foreach($album->gallery_dtls as $item) {
				        		echo '<img src="'.$item->path_image.'" data-thumb="'.$item->path_thumb.'"/>';
				        	}
		                ?>
		            </div>
		        </div> 
	    	</div>
    	<? } ?>
    		
    	
    	<?if(!empty($album->detail)) { ?> 
			<div class="row">
	        	<div class="col-md-12">
		        	<div class="underline-heading">
						<h3>Project Description</h3>
			        </div>
			        <p><? echo $album->detail; ?></p>
			    </div>
		    </div>
	    <? } ?>
	</div>  	
    
    <div class="col-md-12"><hr /></div>
</div>