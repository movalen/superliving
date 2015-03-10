<style tyep='text/css'>
	img[data-target="#fullImage"] {
		cursor:pointer;
		border:solid 1px #fff;
	}
	img[data-target="#fullImage"]:hover {
		border:solid 1px #555;
	}	
	
	label.error {
		display:inline-block;
		width:auto;
		color:#f00;
		font-style:italic;
		line-height:35px;
	}
	
</style>
<!-- Modal#fullImage -->
	<div class="modal fade text-center" id="fullImage">
		<div class="modal-dialog" style="display:inline-block; width:auto; height:auto;">
			<div class="modal-content">
      			<div class="modal-body text-center">
	      			
				</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
			</div>
		</div>
	</div>
<!-- End - Modal#fullImage -->


<div class="row">
    <div class="col-lg-12">
		<h3 style="word-wrap: break-word;"><? echo anchor('admin/gallerys', 'Gallery'); ?> > (<? echo $rs->title; ?>)</h3>
		<hr>
	</div>
</div>
<form method='post' action='admin/gallery_dtls/save'  enctype="multipart/form-data" style='border:solid 1px #bbb; background:#eee; display:inline-block; padding:8px;'>
	<? 
		echo form_hidden('gallery_id', @$rs->id);
		echo form_hidden('status', 1); 
	?>
	<input type='file' name='path_image' style="display:inline-block;"> 
	<? echo form_submit(false, 'Add image.', 'class="btn btn-success"'); ?>
	<div id="error_path_image"></div>
</form>
<hr>
<?
	if(count($rs->gallery_dtl->all) == 0) {
		echo '<div class="text-center" style="color:#bbb;">ไม่พบข้อมูล</div>';
	}
	foreach($rs->gallery_dtl as $item) {
		$btn_status = array(
			'label' => ($item->status == 1)?'On':'Off',
			'class' => ($item->status == 1)?'btn-primary':'btn-danger'
		);
		
		echo '<div style="background:#333; display:inline-block; margin:5px; padding:5px; width:18.8%;">';
			echo "<img src='".$item->path_thumb."'  data-toggle='modal' data-target='#fullImage' data-image='".$item->path_image."' class='thumbnail' style='display:inline-block; width:100%; border-radius:0px; height:150px;'/>";
			echo '<div>';
				?>
					<button type="button" 
						id="<?php echo $item->id; ?>" 
						class="btn btn-sm <? echo $btn_status['class']; ?>" 
						data-loading-text="บันทึก..." ><? echo $btn_status['label']; ?></button>
				<?
				echo anchor('admin/gallery_dtls/delete/'.$item->id, 'Delete', 'class="btn btn-delete btn-sm btn-danger" style="float:right;"');
			echo '</div>';
		echo '</div>';
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		//Switch status
			$('button[data-loading-text]').click(function () {
				var btn = $(this);
			    var id = btn.attr("id");
			    $.post("admin/switch_status/gallery_dtl/"+id, function(data){
			    	if(data == 1) {
			    		btn.removeClass("btn-danger");
			    		btn.addClass("btn-primary");
			    		btn.html('On');
			    	} else if(data == 0) {
			    		btn.removeClass("btn-primary");
			    		btn.addClass("btn-danger");
			    		btn.html('Off');
			    	}
			    });
			    return false;
			});
		//End - switch status
		
		//Modal active
			$('#fullImage').on('show.bs.modal', function (event) {
			 	var button = $(event.relatedTarget);
			 	var modal = $(this)
				//modal.find('.modal-title').text('Model number : '+button.data('title'));
				modal.find('.modal-body').html('<img src="'+button.data('image')+'">');
			})
		//End - modal
		
		$('form').validate({
			rules: {
				path_image:{required:true, accept: "jpg, jpeg, png, gif"}
			},
			messages: {
				path_image:{required:'Please attach image.', accept: "Please attach file type IMAGE (jpg, jpeg, png, gif)"}
			},
			errorPlacement: function(error, element) 
   			{
		        if (element.attr("name") == "path_image") {
		        	$('#error_path_image').html(error);
		        } else {
		        	error.insertAfter(element);
		        }
		   }
		});
	});
</script>