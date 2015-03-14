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

<script language="javascript">
	$(function(){		
		$('form').validate({
			rules: {
				category:{required:true },
				category_id:{required:true },
				model_number:{required:true },
				model_size:{required:true },
				path_image:{<? if(empty($rs->path_thumb)) { ?>required:true, <? } ?>accept: "jpg, jpeg, png, gif"} 
			},
			messages: {
				category:{required:'Please select category.' },
				category_id:{required:'Please select sub category.' },
				model_number:{required:'Please identify.' },
				model_size:{required:'Please identify.' },
				path_image:{<? if(empty($rs->path_thumb)) { ?>required:'Please attach image.', <? } ?> accept: "Please attach file type IMAGE (jpg, jpeg, png, gif)"}
			}
		});
	});
</script>


<div class="col-lg-12">
    <h1 class="page-header">
    	Hilight <?php echo (empty($rs->title))?null:'('.$rs->title.')'; ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/hilights/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Image : </label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_thumb)) {
				echo anchor('admin/hilights/delete_image/'.$rs->id, 'Delete image', 'class="btn btn-delete btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_thumb."' class='thumbnail' style=''><hr>";
			} ?>
			<input type='file' name='path_image'>
		</div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Title : </label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control" maxlength="80"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Detail : </label>
		<div class="col-lg-4"><?php echo form_textarea('detail', @$rs->detail, 'class="form-control"'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/hilights/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

