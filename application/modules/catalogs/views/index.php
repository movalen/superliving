<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header">CATALOGS</h3>
        <div class="col-md-12 breadcrumb">
        	<? echo anchor('', 'HOME'); ?> > 
			<span class="active">CATALOGS</span>
        </div>
    </div>
    
    	
    <div class="col-md-12">
    	<div class="text-center">
        	<div class="row">
        		<?
        			foreach($rs as $item) {
        				$path_cover = (empty($item->path_cover))?'media/images/noimage_coverpage.png':$item->path_cover;
        				?>
        				<div class="col-md-4">
		        			<div class="text-center">
		        				<a href="catalogs/detail/<? echo $item->id; ?>">
			        				<img src="<? echo $path_cover; ?>" style="width:225px; height:280px;"/>
			        			</a>
			        			<p class="catalos_detail" style="height: 50px"><? echo $item->title; ?></p>
		        			</div>
		        		</div>
        				<?
        			}
        		?>
        	</div>	
    	</div>
    </div>  
    
    <div class="col-md-12"><hr /></div> 
</div>