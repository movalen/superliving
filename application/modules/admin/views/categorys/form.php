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
    	ประเภทสินค้า <?php if(!empty($rs->id)) { echo ' > ('.$rs->title.')'; } ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/categorys/save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >ประเภทเรื่อง</label>
		<div class="col-lg-4"><?php echo form_input('title', @$rs->title, 'class="form-control"'); ?></div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> ยีนยัน</button>
			<? echo anchor('admin/categorys/', 'ยกเลิก', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>