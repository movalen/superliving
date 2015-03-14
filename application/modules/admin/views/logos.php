<script language="javascript">
	$(function(){		
		$('form').validate({
			rules: {
				logo:{<? if(empty($rs->detail)) { ?>required:true, <? } ?>accept: "jpg, jpeg, png, gif"} 
			},
			messages: {
				logo:{<? if(empty($rs->detail)) { ?>required:'Please attach image.', <? } ?> accept: "Please attach file type IMAGE (jpg, jpeg, png, gif)"}
			}
		});
	});
</script>


<h2>Change logo</h2>
<hr>
<form class="form-horizontal" role="form" action="admin/logos" method="post"  enctype="multipart/form-data">
	<div class="form-group" >
		<label for="title" class="col-sm-2 control-label" >Logo : </label>
		<div class="col-lg-4">
			
			<?
				if(!empty($rs->detail)) {
					echo '<div style="width:80px; text-align:center;">';
						echo '<img src="'.$rs->detail.'" class="thumbnail" style="display:inline-block; margin:10px;"><br>';
						echo anchor('admin/delete_logo', 'Delete', 'class="btn btn-sm btn-danger"');
					echo '</div><br>';
				}
			?>
			
			<input type='file' name='logo'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" ></span> Save</button>
		</div>
	</div>
</form>


