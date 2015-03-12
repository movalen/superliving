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
		<h3>Links</h3>
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
						<th style="width:250px;">Title</th>
						<th>Detail</th>
						<th class='text-center' style="width:120px;"> Manage </th>
					</tr>
				</thead>
				<tbody>
					<?
						
						
						foreach($row as $key => $item) {
							$no++;
						?>
							<tr>
								<td><? echo $no; ?></td>
								<td> <? echo $item['title']; ?> </td>
								<td> <?	echo @$item['detail']; ?> </td>
								<td class='text-center'>
									<? echo anchor('admin/links/form/'.$key, '<span class="glyphicon glyphicon-pencil"></span> Edit', 'class="btn btn-sm btn-warning"').' '; ?>
								</td>
							</tr>
							<?
							
						}
					?>
				</tbody>
			</table>
		</div>
		<div class='text-center'></div>
	</div>
</div>