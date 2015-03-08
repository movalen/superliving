<style type='text/css'>
	.table_td {
		display: inline-block;
		white-space: nowrap;
		text-overflow: ellipsis;
		overflow: hidden;
		width:400px;	
	}
</style>
<div class="row">
    <div class="col-lg-12">
		<h3>Gallery</h3>
		<hr>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
    	<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width:50px;">#</th>
						<th style="width:80px;">Status</th>
						<th style="width:150px;">Cover image</th>
						<th>Title</th>
						<th style="width:165px;">Number of images.</th>
						<th class='text-center' style="width:160px;">
							<? echo anchor('admin/gallerys/form', '<span class="glyphicon glyphicon-plus"></span> Add', 'class="btn btn-sm btn-info"'); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?
						if(count($row->all) == 0) {
							echo '<tr><td colspan="5" class="text-center" style="color:#aaa;"> n/a</td></tr>';
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
										data-loading-text="Loading..." ><? echo $btn_status['label']; ?></button>
								</td>
								<td class='text-center'>
									<? echo (empty($item->path_thumb))?'n/a':'<img class="thumb" src="'.$item->path_thumb.'" style="width:140px; height:75px;">'; ?>
								</td>
								<td><? echo anchor('admin/gallery_dtls/index/'.$item->id, $item->title, 'class="table_td" title="'.$item->title.'"'); ?></td>
								<td class='text-center'><? echo '('.count($item->gallery_dtl->all).')'; ?></td>
								<td class='text-center'>
									<? 
										echo anchor('admin/gallerys/form/'.$item->id, '<span class="glyphicon glyphicon-pencil"></span> Edit', 'class="btn btn-sm btn-warning"').' ';
										if(count($item->gallery_dtl->all) == 0) {
											echo anchor('admin/gallerys/delete/'.$item->id, '<span class="glyphicon glyphicon-remove"></span> Delete', 'class="btn btn-delete btn-sm btn-danger"');
										}	
									?>
								</td>
							</tr>
							<?
							
						}
					?>
				</tbody>
			</table>
		</div>
		<div class='text-center'><? echo $row->pagination(); ?></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//Switch status
			$('button[data-loading-text]').click(function () {
				var btn = $(this);
			    var id = btn.attr("id");
			    $.post("admin/switch_status/gallery/"+id, function(data){
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