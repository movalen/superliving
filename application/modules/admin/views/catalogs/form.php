<style type='text/css'>
	label.error {
		display:inline-block;
		width:auto;
		color:#f00;
		font-style:italic;
		line-height:35px;
	}
	
	div.form-group > div {
		line-height:35px;
	}
</style>
	

<div class="col-lg-12">
    <h1 class="page-header">
    	Catalog <?php if(!empty($rs->id)) { echo ' > ('.$rs->title.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/catalogs/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Title : </label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control" autofocus maxlength="80"'); ?></div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Cover image : </label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_cover)) {
				echo anchor('admin/catalogs/delete_file/path_cover/'.$rs->id, 'Delete image', 'class="btn btn-delete btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_cover."' style='height:200px;' class='thumbnail'><hr>";
			} ?>
			<input type='file' name='path_cover'>
		</div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Attach file : </label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_file)) {
				echo anchor($rs->path_file, 'Download', 'class="btn btn-sm btn-success"').' ';
				echo anchor('admin/catalogs/delete_file/path_file/'.$rs->id, 'Delete', 'class="btn btn-delete btn-sm btn-danger"');
				
				#echo "<img src='".$rs->path_file."' style='height:200px;' class='thumbnail'><hr>";
			} ?>
			<input type='file' name='path_file'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/catalogs/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

<script language="JavaScript">
	$(function(){
		$('form').validate({
			rules: {
				title:{required:true },
				path_file:{<? if(empty($rs->path_file)) { ?> required:true, <? } ?> accept: "pdf"}, 
				path_cover:{<? if(empty($rs->path_cover)) { ?> required:true, <? } ?> accept: "jpg, jpeg, png, gif"}
			},
			messages: {
				title : {required:'Please identify'}, 
				path_file:{<? if(empty($rs->path_file)) { ?> required:'Please attach file catalog.', <? } ?> accept: "Please attach file type PDF"},
				path_cover:{<? if(empty($rs->path_cover)) { ?> required:'Please attach image cover.', <? } ?> accept: "Please attach file type IMAGE (jpg, jpeg, png, gif)"}
			}
		});
	});
</script>