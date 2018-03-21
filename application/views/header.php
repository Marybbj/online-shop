<!DOCTYPE html>
<html>
<head>
	<title>your profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="http://www.pngall.com/wp-content/uploads/2016/07/Online-Shopping-PNG-Clipart.png" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<script src="<?=base_url();?>assets/js/script.js" type="text/javascript" charset="utf-8" async defer></script>


	<style  type="text/css">
	
		*{
			padding: 0;
			margin: 0;
			font-family: monospace;
		}

		img{
			object-fit: cover;
		}

	</style>
</head>
<body>	
	<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
		<a class="navbar-brand" href="<?= base_url() ?>user/profile"> 
			<img src='<?= base_url("uploads/$user->userfile");?>' alt=" "  width="40px" height="40px" class="border rounded-circle" />
			<?= $user->name. " " .$user->surname;?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>user/profile" >Profile</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url() ?>user/edit"  class="edit-pass nav-link"> Edit info </a>
				</li>

				<?php if(isset($user->type)){ ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>admin/accept" >Requests</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>user/onlineUsers" >Last signin</a>
					</li>
				<?php } ?>
				
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>product/all">All product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>product/addproduct">Add product</a>
				</li>   
			</ul>
		</div>  
		<ul class="nav navbar-nav navbar-right">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>user/logout" ">
					Log out
				</a>
			</li>
		</ul>
	</nav>
	<br>
