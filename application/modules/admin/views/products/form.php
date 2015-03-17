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
		$('[name=cat_1]').on('change', function(){
			$('[name=cat_2]').html('<option value="">Loading...</option>').attr('disabled', true);
			if(!$(this).val()) {
				$('[name=cat_2]').html('<option value="">--Please select category.--</option>');
			} else {
				$.get('admin/products/coption_category/'+$(this).val(), function(data){
					$('#sector_cat_3').hide();
					$('[name=category_id]').val('');
					if(data == 0) {
						$('[name=cat_2]').html('<option value="">--No data.--</option>');
					} else {
						$('[name=cat_2]').html(data).attr('disabled', false);
					}
				});
			}	
		});
		
		$('[name=cat_2]').on('change', function(){
			$('[name=cat_3]').html('<option value="">Loading...</option>').attr('disabled', true);
			if(!$(this).val()) {
				$('[name=cat_3]').html('<option value="">--Please select category.--</option>');
			} else {
				$.get('admin/products/coption_category/'+$(this).val(), function(data){
					if(data == 0) {
						$('#sector_cat_3').hide();
						$('[name=category_id]').val($('[name=cat_2]').val());
						$('[name=cat_3]').html('<option value="">--No data.--</option>');
					} else {
						$('#sector_cat_3').show();
						$('[name=category_id]').val('');
						$('[name=cat_3]').html(data).attr('disabled', false);
					}
				});
			}
		});
		
		$('[name=cat_3]').on('change', function(){
			$('[name=category_id]').val($('[name=cat_3]').val());
		});
		
		$('form').validate({
			rules: {
				cat_1:{required:true },
				category_id:{required:true },
				model_number:{required:true },
				model_size:{required:true },
				path_image:{<? if(empty($rs->path_thumb)) { ?>required:true, <? } ?>accept: "jpg, jpeg, png, gif"} 
			},
			messages: {
				cat_1:{required:'Please select category.' },
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
    	Product <?php if(!empty($rs->id)) { echo ' > ('.$rs->model_number.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/products/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Category<span style="color: red">*</span> : </label>
		<div class="col-lg-4">
			<?php 
				echo form_dropdown('cat_1', get_option('id', 'title', 'category where parent_id is null or parent_id = 0'), @$cat['cat_1'], 'id="category" class="form-control" style="width:auto;"', '-- Select category --'); 
			?>
		</div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >
			Sub category<span style="color: red">*</span> :
			<? echo form_input('category_id',false, 'class="sr-only"'); ?> 
		</label>
		<div class="col-lg-4">
			<?php
				if(empty($cat['cat_2'])) {
					echo form_dropdown('cat_2', array(), false, 'class="form-control" disabled="true"', '-- Please select category --');
				} else {
					echo form_dropdown('cat_2', get_option('id', 'title', "category where parent_id = '".@$cat['cat_1']."'"), @$cat['cat_2'], 'class="form-control"');
				}
			?>
		</div>
	</div>
	
	<div class="form-group" id="sector_cat_3" style="<? echo (empty($cat['cat_3']))?'display:none;':null; ?>">
		<label for="title" class="col-sm-2 control-label" ></label>
		<div class="col-lg-4">
			<?php
				if(empty($cat['cat_3'])) {
					echo form_dropdown('cat_3', array(), false, 'class="form-control"');
				} else {
					echo form_dropdown('cat_3', @get_option('id', 'title', "category where parent_id = '".@$cat['cat_2']."'"), @$cat['cat_3'], 'class="form-control"');
				}
			?>
		</div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Model number<span style="color: red">*</span> : </label>
		<div class="col-lg-4"><?php echo form_input('model_number', @$rs->model_number, 'class="form-control" maxlength="50"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Size<span style="color: red">*</span> : </label>
		<div class="col-lg-4"><?php echo form_input('model_size', @$rs->model_size, 'class="form-control" maxlength="50"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Image<span style="color: red">*</span> : </label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_thumb)) {
				echo anchor('admin/products/delete_image/'.$rs->id, 'Delete image', 'class="btn btn-delete btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_image."' class='thumbnail' style='min-width:200px; min-height:200px; width:500px; height:500px;'><hr>";
			} ?>
			<input type='file' name='path_image'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/products/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

