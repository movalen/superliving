<?php 
	$file_name = (empty($_GET['file_name']))?'':$_GET['file_name'];
	$dir = "../uploads/catalog/file/";
    $file = $dir.$file_name;
	
	if ($file_name != '') {
		header('Content-type: application/pdf');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');

		@readfile($file);
	} else {
		echo "<div style='text-align: center;'>not file pdf</div>";
	}
	
?>
