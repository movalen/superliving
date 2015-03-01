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
				$.get('admin/gallerys/coption_category/'+$(this).val(), function(data){
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
    	อัลบั้มภาพ <?php if(!empty($rs->id)) { echo ' > ('.$rs->title.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/gallerys/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >ชื่ออัลบั้ม</label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control"'); ?></div>
	</div>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >ภาพปก</label>
		<div class="col-lg-4">
			<? if(!empty($rs->path_cover)) {
				echo anchor('admin/gallerys/delete_image/'.$rs->id, 'Delete image', 'class="btn btn-sm btn-danger" style="position:absolute; margin:10px;"');
				echo "<img src='".$rs->path_cover."' class='thumbnail'><hr>";
			} ?>
			<input type='file' name='path_cover'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> ยีนยัน</button>
			<? echo anchor('admin/gallerys/', 'ยกเลิก', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

