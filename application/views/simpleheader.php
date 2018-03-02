<!DOCTYPE html>
<html>
<head>
	<title>online store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="http://www.pngall.com/wp-content/uploads/2016/07/Online-Shopping-PNG-Clipart.png" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style  type="text/css">

		*{
			padding: 0;
			margin: 0;
			font-family: monospace;
		}

	</style>
</head>
<body>	

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">

		<a class="navbar-brand" href="#"> online store </a>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="collapsibleNavbar">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>user/signup" >Sign up</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>user/login">Sign in</a>
				</li>
			</ul>

		</div> 
		 
	</nav>
	<br>
