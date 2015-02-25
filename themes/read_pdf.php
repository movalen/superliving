<?php 
	$_GET['file_name'] = (empty($_GET['file_name']))?'':$_GET['file_name'];
	$dir = "uploads/documents/";
    $file = $dir.$_GET['file_name'];
	
	if ($_GET['file_name'] != '') {
		header('Content-type: application/pdf');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Content-Type: application/pdf');
		@readfile($file);
	}
	
?>