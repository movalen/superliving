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
    	Category <?php if(!empty($rs->id)) { echo ' > ('.$rs->title.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/categorys/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? 
		echo form_hidden('status', (empty($rs->status))?1:$rs->status);
		echo form_hidden('parent_id', @$parent_id); 
		
		echo (empty($rs->parent_id))?form_hidden('sub_cat_status', 1):null;
	?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Title<span style="color: red">*</span> : </label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control" autofocus maxlength="512"'); ?></div>
	</div>

	<? if(!empty($parent_id) && empty($layer_index)) { ?> 
		<div class="form-group" >
			<label for="title" class="col-sm-2 control-label" >Have sub category : </label>
			<div class="col-lg-4">
				<?php
					if(count($rs->child->all) != 0) {
						echo form_hidden('sub_cat_status', 1);
						echo form_checkbox(false, '1', $sub_cat_status, 'disabled="disabled"');
					} else {
						echo form_checkbox('sub_cat_status', '1', $sub_cat_status, '');
					}
						 
				?>
			</div>
		</div>
	<? } ?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/categorys/index/'.$parent_id, 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

<script language="JavaScript">
	$(function(){
		$('form').validate({
			rules: {
				title:{'required':true }
			},
			messages: {
				title : {'required':'Please identify'}
			}
		});
	});
</script>