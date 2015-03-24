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
		    	<?php
		    		$file_name = '';
		    		if ($catalog->path_file) {
		    			$path_file = explode('file/', $catalog->path_file); 
						$tmp_file_name = @$path_file['1'];
		    		}
		    	 	$file_name = (empty($tmp_file_name))?'':$tmp_file_name;
		    	?>
		    	<div class="text-center">
		    		<div>
		    			<iframe src="<?php echo base_url(); ?>themes/read_pdf.php?file_name=<?php echo $file_name; ?>" style="width: 90%; height: 500px"></iframe>
		    		</div>
		    	</div>
		    </div>   
    <? } ?>
    
    <div class="col-md-12"><hr /></div>
</div>