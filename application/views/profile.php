	<div class="container mx-auto">
<div class="row mx-auto text-center">

	<div class="col-md-3 text-center p-2 m-1 border  rounded bg-light float-left" >
		<img src='<?= base_url("uploads/$user->userfile");?>' alt=" "  width="150px" height="150px" class="border rounded-circle" />

		<h4><?= $user->name. " " .$user->surname;?> </h4>

		<?php if($user->type == 1){ ?>
		<i class="fas fa-check">admin</i>
		<?php } ?>

		<hr>
		<h6><?= $user->email;?> </h6>
		<h6 class="border w-75  mx-auto">amount_ <?= $user->amount;?>$ </h6>
	</div>
	<div class="col-md-8">
		<h3 class="text-danger">welcome <?= $user->name?>!</h3>
		<h3>this is your profile and here you see your active products.</h3>
	</div>
	<div class="col-md-12"> <hr> </div>

	<?php foreach ( $data as $x ){ 
	 if($x->type_product == 1){ ?>

	 <div class="col-md-3 p-2 border-white border bg-light">

	 	<img src="<?= base_url("uploads/$x->img");?>" alt="" width="200px" height="200px" class="border rounded" /> 

	 	<h4><?= $x->product_name; ?></h4>

	 	<h6 class="text-muted">
	 		<?= 'price_ '.$x->price.'$  / ' . '  quantity_ '. $x->quantity ;?>
	 	</h6>
		<?php	if( $x->top_product == 1 ){ ?>
			<span class="bg-danger text-white p-2 rounded">top</span>
			<?php } ?>
	 	</div>
	<?php } }?>
</div>
	<hr>
</div>