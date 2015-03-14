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
    	Links - <? echo $head['title']; ?>
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/links/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Title<span style="color: red">*</span> : </label>
		<div class="col-lg-4">
			<?php 
				echo form_hidden('type', $type);
				echo $head['title']; 
			?>
		</div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Detail<span style="color: red">*</span> : </label>
		<div class="col-lg-4"><?php echo form_textarea('detail', @$rs->detail, 'class="form-control"'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/links/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>



<script src="media/addon/tinymce/tinymce.min.js"></script>
<script language="JavaScript">
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
	});
</script>