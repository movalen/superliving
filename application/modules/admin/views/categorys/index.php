<h3>Category</h3>
<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:50px;">#</th>
			<th style="width:80px;">Status</th>
			<th style="width:50px;">Index</th>
			<th>Title</th>
			<th class='text-center' style="width:165px;">
				<? echo anchor('admin/categorys/form', '<span class="glyphicon glyphicon-plus"></span> Add', 'class="btn btn-sm btn-info"'); ?>
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
							class="btn <? echo $btn_status['class']; ?>" 
							data-loading-text="Loading..." ><? echo $btn_status['label']; ?></button>
					</td>
					<td><? echo (empty($item->ordinal_index))?'-':$item->ordinal_index; ?></td>
					<td><? echo anchor('admin/categorys/sub_index/'.$item->id, $item->title); ?> (<? echo count($item->child->all); ?>)</td>
					<td class='text-center'>
						<? 
							echo anchor('admin/categorys/form/'.$item->id, '<span class="glyphicon glyphicon-pencil"></span> Edit', 'class="btn btn-sm btn-warning"').' ';
							if(count($item->child->all) == 0) {
								echo anchor('admin/categorys/delete/'.$item->id, '<span class="glyphicon glyphicon-remove"></span> Delete', 'class="btn btn-delete btn-sm btn-danger"');
							} 
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
		$('button[data-loading-text]').click(function () {
			var btn = $(this);
		    var id = btn.attr("id");
		    $.post("admin/switch_status/category/"+id, function(data){
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
	});
</script>