$(function(){
	$('.btn-delete').on('click', function(){
		if(!confirm('กรุณายืนยันการลบข้อมูล')) {
			return false;
		}
	});	
});