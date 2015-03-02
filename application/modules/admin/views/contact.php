<div class="col-lg-12">
    <h1 class="page-header">
    	<? echo $title; ?> 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/contact_save/<?php echo @$rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('type', @$type); ?>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Detail : </label>
		<div class="col-lg-4">
			<? echo form_textarea('detail', @$rs->detail, 'class="form-control" style="width:400px;" autofocus'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
		</div>
	</div>
</form>

