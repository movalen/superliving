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
		$('#category').on('change', function(){
			$('[name=category_id]').html('<option value="">Loading...</option>').attr('disabled', true);
			if(!$(this).val()) {
				$('[name=category_id]').html('<option value="">--กรุณาเลือกหมวดหมู่สินค้า--</option>');
			} else {
				$.get('admin/products/coption_category/'+$(this).val(), function(data){
					if(data == 0) {
						$('[name=category_id]').html('<option value="">--ไม่พบข้อมูล--</option>');
					} else {
						$('[name=category_id]').html(data).attr('disabled', false);
					}
				});
			}	
		});
	});
</script>


<div class="col-lg-12">
    <h1 class="page-header">
    	สินค้า <?php if(!empty($rs->id)) { echo ' > ('.$rs->model_number.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/products/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >หมวดหมู่สินค้า</label>
		<div class="col-lg-4"><?php echo form_dropdown(false, get_option('id', 'title', 'category where parent_id is null'), @$rs->category->parent->id, 'id="category" class="form-control" style="width:auto;"', '--ประเภทสินค้า--'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >หมสวดหมู่ย่อย</label>
		<div class="col-lg-4">
			<?php
				if(empty($rs->category->parent->id)) {
					echo form_dropdown('category_id', array(), false, 'class="form-control" disabled="true"', '--กรุณาเลือกหมวดหมู่สินค้า--');
				} else {
					$cat_option = @(get_option('id', 'title', "category where parent_id = '".@$rs->category->parent->id."'"))?get_option('id', 'title', "category where parent_id = '".$rs->category->parent->id."'"):array();
					echo form_dropdown('category_id', $cat_option, @$rs->category_id, 'class="form-control"', '--หมวดหมู่ย่อย--');
				}	
			?>
		</div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Model number</label>
		<div class="col-lg-4"><?php echo form_input('model_number', @$rs->model_number, 'class="form-control"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Size</label>
		<div class="col-lg-4"><?php echo form_input('model_size', @$rs->model_size, 'class="form-control"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >ภาพประกอบ</label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_thumb)) {
				echo anchor('admin/products/delete_image/'.$rs->id, 'Delete image', 'class="btn btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_image."' class='thumbnail'><hr>";
			} ?>
			<input type='file' name='path_image'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> ยีนยัน</button>
			<? echo anchor('admin/products/', 'ยกเลิก', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

