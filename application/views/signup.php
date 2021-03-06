<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="http://www.pngall.com/wp-content/uploads/2016/07/Online-Shopping-PNG-Clipart.png" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<title> signup online store</title>

	<style  type="text/css">
		*{
			padding: 0;
			margin: 0;
			font-family: monospace;
		}
	
		body{
			background-image: url("https://media.giphy.com/media/k39QAVgJg1s76/giphy.gif");
			background-size: cover;
			background-position: center;
		}

	</style>

</head>
<body>

	<?php if($this->session->flashdata('error')): ?>
		<div class="alert alert-danger text-center col-md-5 mx-auto">
			<?= $this->session->flashdata('error');  ?>
		</div>	
	<?php endif; ?>

	<h1 class="text-center text-primary">online store</h1>
	<br>

	<div class="container col-md-8 ">
		<div class="bg-light mx-auto border rounded p-3 w-50">

			<h3 class="text-center text-danger">sign up</h3>
			<br>

			<form action="<?= base_url() ?>user/insert" method="post" class="text-center" enctype="multipart/form-data">

				<input type="file" name="userfile" size="20"/>
				<br><br>

				<div class="form-group">
					<input type="text" class="form-control" placeholder=" name" name="name">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder=" surname" name="surname">
				</div>

				<div class="form-group">
					<input type="email" class="form-control" placeholder=" email" name="email">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder=" password" name="pswd">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="password confirmation" name="pswd2">
				</div>

				<button type="submit" class="btn btn-primary">submit</button>
				<br>
				Have an account? <a href="<?= base_url() ?>user/login"> sign in</a>

			</form>
		</div>
	</div>