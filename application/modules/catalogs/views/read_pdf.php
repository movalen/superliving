<?php 
	$file_name = (empty($file_name))?'':$file_name;
	$dir = base_url()."../uploads/catalog/file/";
    $file = $dir.$file_name;
	
	if ($file_name != '') {
		header('Content-type: application/pdf');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');

		@readfile($file);
	}
	
?>