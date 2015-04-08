<style type='text/css'>
	img.thumb {
		border:solid 1px #aaa;
	}
	img.thumb:hover {
		cursor:pointer;
		border:solid 1px #000;
	}
	.table_td {
		display: inline-block;
		white-space: nowrap;
		text-overflow: ellipsis;
		overflow: hidden;
		width:280px;	
	}
</style>
<!-- Modal#fullImage -->
	<div class="modal fade text-center" id="fullImage">
		<div class="modal-dialog" style="display:inline-block; width:auto; height:auto;">
			<div class="modal-content">
		      	<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    			<h4 class="modal-title text-left" >n/a</h4>
	      		</div>
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
		<h3>Product</h3>
		<hr>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
    	<? if($row->paged->total_pages != 1) { ?>
    		<div class='text-center'><? echo $row->pagination(); ?></div>
    	<? } ?>
    		
    	<div class="table-responsive">
    		<table class="table table-striped">
				<thead>
					<tr>
						<th style="width:50px;">#</th>
						<th style="width:80px;">Status</th>
						<th style="width:100px;">Thumbnail</th>
						<th style="width:100px;">Category</th>
						<th>Model Number</th>
						<th>Size</th>
						<th class='text-center' style="width:165px;">
							<? echo anchor('admin/products/form', '<span class="glyphicon glyphicon-plus"></span> Add', 'class="btn btn-sm btn-info"'); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?
						if(count($row->all) == 0) {
							echo '<tr><td colspan="5" class="text-center" style="color:#aaa;"> ไม่พบข้อมูล</td></tr>';
						}
						foreach($row as $item) {
							$no++;
							$btn_status = array(
								'label' => ($item->status == 1)?'On':'Off',
								'class' => ($item->status == 1)?'btn-primary':'btn-danger'
							);
						?>
							<tr>
								<td><? echo $no; ?></td>
								<td>
									<button type="button" 
										id="<?php echo $item->id; ?>" 
										class="btn btn-sm <? echo $btn_status['class']; ?>" 
										data-loading-text="บันทึก..." ><? echo $btn_status['label']; ?></button>
								</td>
								<td class='text-center'>
									<? 
										if(!empty($item->path_thumb)) {
											echo (!chk_image_path($item->path_thumb))?'n/a':'<img class="thumb" style="width:50px;" data-toggle="modal" data-target="#fullImage" data-title="'.$item->model_number.'" data-image="'.$item->path_thumb.'" src="'.$item->path_thumb.'">';
											
										} else if(!empty($item->path_image)) {
											echo (!chk_image_path($item->path_image))?'n/a':'<img class="image" style="width:50px;" data-toggle="modal" data-target="#fullImage" data-title="'.$item->model_number.'" data-image="'.$item->path_image.'" src="'.$item->path_image.'">';
											
										} else {
											echo 'no image.';
										}
											 
									?>
								</td>
								<td class='text-center'><span class='glyphicon glyphicon-info-sign' title="<? echo $item->categorys->parent->title.' > '.$item->categorys->title; ?>"></span></td>
								<td><span class="table_td" title="<? echo $item->model_number; ?>"><? echo $item->model_number; ?></span></td>
								<td><span class="table_td" title="<? echo $item->model_size; ?>"><? echo $item->model_size; ?></span></td>
								<td class='text-center'>
									<? 
										echo anchor('admin/products/form/'.$item->id, '<span class="glyphicon glyphicon-pencil"></span> Edit', 'class="btn btn-sm btn-warning"').' ';
										echo anchor('admin/products/delete/'.$item->id, '<span class="glyphicon glyphicon-remove"></span> Delete', 'class="btn btn-delete btn-sm btn-danger"');
									?>
								</td>
							</tr>
							<?
							
						}
					?>
				</tbody>
			</table>
		</div>
		<? if($row->paged->total_pages != 1) { ?>
    		<div class='text-center'><? echo $row->pagination(); ?></div>
    	<? } ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip()
		//Switch status
			$('button[data-loading-text]').click(function () {
				var btn = $(this);
			    var id = btn.attr("id");
			    $.post("admin/switch_status/product/"+id, function(data){
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
				modal.find('.modal-title').text('Model number : '+button.data('title'));
				modal.find('.modal-body').html('<img src="'+button.data('image')+'">');
			})
		//End - modal
	});
</script>