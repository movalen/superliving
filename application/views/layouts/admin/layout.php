<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url()?>" ></base>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $template['title']; ?></title>
    <style type='text/css'>
    	html, body {
		    min-height: 100%;
		    margin:0px; 
		    padding:0px;
		    background:#eee;
		}
		
		div#wrap {
		    min-height: 100vh;
		    background: #EEE;
		}
		#wrap div#header, #wrap div#footer {
		    height:12vh;
		    background: #bbb;
		}
		#wrap div#body {
			height:76vh;
		}
    </style>
</head><!--/head-->

<body>
	<div id="wrap">
		<div id="header">Header : Admin (ทดสอบภาษาไทย)</div>
		<div id="body">
			Body
			<div><? echo $template['body']; ?></div>
		</div>
		<div id="footer">Footer</div>
	</div>
</body>
</html>