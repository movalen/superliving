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
<script src="media/addon/tinymce/tinymce.min.js"></script>
<script language="javascript">
	$(function(){
		tinymce.init({
		    selector: "textarea",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    width:"700px",
		    //resize: false,
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
		
		tinymce.triggerSave();
		$('#category').on('change', function(){
			$('[name=category_id]').html('<option value="">Loading...</option>').attr('disabled', true);
			if(!$(this).val()) {
				$('[name=category_id]').html('<option value="">--กรุณาเลือกหมวดหมู่สินค้า--</option>');
			} else {
				$.get('admin/gallerys/coption_category/'+$(this).val(), function(data){
					if(data == 0) {
						$('[name=category_id]').html('<option value="">--ไม่พบข้อมูล--</option>');
					} else {
						$('[name=category_id]').html(data).attr('disabled', false);
					}
				});
			}	
		});
		
		$('form').validate({
			rules: {
				title:{required:true }, 
				path_cover:{ <? if(empty($rs->path_cover)) { ?>required:true, <? } ?> accept: "jpg, jpeg, png, gif" },
				detail:{required:true }
			},
			messages: {
				title:{required:'Please identify.' }, 
				path_cover:{ <? if(empty($rs->path_cover)) { ?>required:'Please attach image cover.' , <? } ?> accept: "Please attach file type IMAGE (jpg, jpeg, png, gif)" },
				detail:{required:'Please identify.' }, 
			}
		});
	});
</script>


<div class="col-lg-12">
    <h1 class="page-header">
    	Gallery <?php if(!empty($rs->id)) { echo ' > ('.$rs->title.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/gallerys/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Title<span style="color: red">*</span> : </label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control" autofocus maxlength="80"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Cover image<span style="color: red">*</span> : </label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_thumb)) {
				echo anchor('admin/gallerys/delete_image/'.$rs->id, 'Delete image', 'class="btn btn-delete btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_thumb."' class='thumbnail'><hr>";
			} ?>
			<input type='file' name='path_cover'>
		</div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Project Description : </label>
		<div class="col-lg-4">
			<? echo form_textarea('detail', @$rs->detail, 'class="form-control" style="width:400px;" autofocus'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/gallerys/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

