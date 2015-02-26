<!DOCTYPE html>
<html lang="th">
<head>
	<base href="<?php echo base_url()?>" ></base>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    
    <script src="js/bootstrap.min.js"></script>
    <style type='text/css'>
    	html, body {
			margin:0px;
			padding:0px;
			height:100%;
		}

		.input_txt label, .input_txt input[type='text'], .input_txt input[type='password'], .input_txt input[type='submit'] {
			margin-top:10px;
			width:300px;
			display:inline-block;
		}
		
		.input_txt.label {
			display:inline-block;
			text-align:left;
			color:#eee;
			font-size:22px;
			padding-bottom:10px;
			width:300px;
		}
		
		.input_txt input[type='text'], .input_txt input[type='password'], .input_txt input[type='submit'] {
			border-radius:0px;
		}
    </style>
</head><!--/head-->

<div style="height:100%; background:#222; text-align:center;">
	<form method='post' action='' style='padding-top:20%;'>
		<div class='input_txt label'>Sign in </div>
		<div class='input_txt'><input type='text' name='user' class="form-control" placeholder="Username"></div>
		<div class='input_txt'><input type='password' name='pass' class="form-control" placeholder="Password"></div>
		<div class='input_txt'><input type='submit' value='Sign in' class="btn btn-warning "></div>
	</form>
</div>