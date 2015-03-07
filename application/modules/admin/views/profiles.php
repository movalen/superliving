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
    	Profiles 
    </h1>
</div>

<form class="form-horizontal" role="form" action="admin/profile_save/<?php echo $rs->id?>" method="post"  enctype="multipart/form-data">
	<? echo form_hidden('status', (empty($rs->status))?1:$rs->status); ?>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Name : </label>
		<div class="col-lg-4"><?php echo form_input('name', @$rs->name, 'class="form-control"'); ?></div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Username : </label>
		<div class="col-lg-4"><?php echo form_input('user', @$rs->user, 'class="form-control"'); ?></div>
	</div>
	<hr>
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Password : </label>
		<div class="col-lg-4"><?php echo form_password('pass', false, 'class="form-control"'); ?></div>
	</div>
	
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Re-Password : </label>
		<div class="col-lg-4"><?php echo form_password('repass', false, 'class="form-control"'); ?></div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
			<? echo anchor('admin/users/', 'Back', 'class="btn btn-danger"'); ?>
		</div>
	</div>
</form>

<script language="JavaScript">
	$(function(){
		$('form').validate({
			rules: {
				name:{'required':true },
				user:{'required':true }
			},
			messages: {
				name:{'required':'Please identify' },
				user:{'required':'Please identify' }			}
		});
	});
</script>