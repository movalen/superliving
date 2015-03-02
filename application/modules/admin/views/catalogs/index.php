<style type='text/css'>
	img.thumb {
		border:solid 1px #aaa;
	}
	img.thumb:hover {
		cursor:pointer;
		border:solid 1px #000;
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

<h3>Catalog</h3>
<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:50px;">#</th>
			<th style="width:80px;">status</th>
			<th style="width:150px;">Cover page</th>
			<th>Title</th>
			<th>Download</th>
			<th class='text-center' style="width:140px;">
				<? echo anchor('admin/catalogs/form', '<span class="glyphicon glyphicon-plus"></span> เพิ่มรายการ', 'class="btn btn-sm btn-info"'); ?>
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
					<td class="text-center">
						<?
							if(!empty($item->path_cover)) {
								echo '<img src="';
									echo $item->path_cover;
								echo '" style="width:120px;">';
							} else {
								echo '<span style="color:#aaa;">ไม่พบข้อมูลภาพ</span>';
							}
						?>
					</td>
					<td><? echo $item->title; ?></td>
					<td>
						<?
							if(!empty($item->path_file)) {
								echo anchor($item->path_file, 'Download', 'class="btn btn-sm btn-success"');
							} else {
								echo form_button(false, 'Download', 'class="btn btn-sm btn-success disabled"');
							}
						?>
					</td>
					<td class='text-center'>
						<? 
							echo anchor('admin/catalogs/form/'.$item->id, '<span class="glyphicon glyphicon-pencil"></span> แก้ไข', 'class="btn btn-sm btn-warning"').' ';
							echo anchor('admin/catalogs/delete/'.$item->id, '<span class="glyphicon glyphicon-remove"></span> ลบ', 'class="btn btn-delete btn-sm btn-danger"');
						?>
					</td>
				</tr>
				<?
				
			}
		?>
	</tbody>
</table>

<div class='text-center'><? echo $row->pagination(); ?></div>

<script type="text/javascript">
	$(document).ready(function(){
		//Switch status
			$('button[data-loading-text]').click(function () {
				var btn = $(this);
			    var id = btn.attr("id");
			    $.post("admin/switch_status/catalog/"+id, function(data){
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