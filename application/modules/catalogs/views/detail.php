<div class="container container_body">
	<div class="col-lg-12 header_list">
        <h3 class="page-header">
        	<? echo $catalog->title; ?>
        	
        	<? if(!empty($catalog->path_file)) { ?> 
        		<div style="float: right"><a href="catalogs/download_pdf/<? echo $catalog->id; ?>" class="btn btn btn-primary">Download <i class="fa fa-download"></i></a></div>
        	<? } ?>
        </h3>
        <div class="col-md-12 breadcrumb">
        	<? echo anchor('', 'HOME').' > '.anchor('catalogs', 'CATALOGS').' > '; ?>
			<span class="active"><? echo $catalog->title; ?></span>
        </div>
    </div>
    	
    
    <?
    	if(empty($catalog->path_file)) {
    		echo '<div style="text-align:center; color:#bbb; height:390px; padding-top:200px;">No files.</div>'; 
    	} else {
    	?> 
		    <div class="col-md-12">
		    	<div class="text-center">
		    		<div>
		    			<iframe src="<? echo $catalog->path_file; ?>" style="width: 90%; height: 500px"></iframe>
		    		</div>
		    	</div>
		    </div>   
    <? } ?>
    
    <div class="col-md-12"><hr /></div>
</div>