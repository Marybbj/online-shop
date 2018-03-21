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
	<style>
	*{
		padding: 0;
		margin: 0;
		font-family: monospace;
	}

	.user-photo{
		border: 2px solid lightgray;
		border-radius: 50%;
	}

	</style>
</head>
<body>	

	<form action="<?= base_url() ?>admin/accept" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="<?= base_url() ?>user/profile"> 
			<img src="../../uploads/<?=$user->userfile ?>" alt=" "  width="40px" height="40px" class="user-photo" />
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
				<li class="nav-item">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>admin/accept" >Requests</a>
					</li>
					<a class="nav-link" href="<?= base_url() ?>product/all" >All product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>product/addproduct" >Add product</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url() ?>user/logout" style="margin-left: 600px">Log out</a>
				</li>    
			</ul>
		</div>  
	</nav>
				<?php if( !empty($data)){
					foreach ($data as $r){ ?>
					<div class="col-md-4 border border-secondary p-2 m-1" style="max-width: 31%!important">
						<img src="<?= base_url('uploads/$r->img');?>" alt="" width="130px" height="130px" class="border border-secondary rounded" /> 
						<h4><?= $r->product_name;?></h4>
						<h5><?= $r->price.'$';?></h5>
						<h6><?= $r->quantity;?></h6>
						<a href="<?= base_url();?>product/all/<?=$r->user_id;?>">
							<?= $r->name. " " .$r->surname;?>  
						</a> 
					</div>	
					<?php } 
				}else{
					var_dump(1111);
				} ?> 

	</form>
