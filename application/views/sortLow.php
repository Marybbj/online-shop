<div class="container mx-auto">
	<form action="<?= base_url() ?>product/sortLow" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">

		<label>Sort by: </label> <br>
		<a  href="<?= base_url();?>product/sortLow" class="pr-5"> Lowest Price </a>
		<a href="<?= base_url();?>product/sortHigh" class=""> Highest Price </a>
		<hr>

		<div class="row  mx-auto pb-3">

			<?php if( !empty($data) ){
			foreach ( $data as $d ){ 
			if( $d->type_product == 1){?>

			<div class="col-md-4 border p-2 border-white bg-light">

				<img src="<?= base_url("uploads/$d->img");?>" alt="" width="200px" height="200px" class="border rounded" /> 

				<h4><?= $d->product_name; ?></h4>

				<h6 class="text-muted">
					<?= 'price_ '.$d->price.'$  / ' . '  quantity_ '. $d->quantity ;?>
				</h6>

				<a href="<?= base_url();?>product/all/<?=$d->user_id;?>">
					<?= $d->name. " " .$d->surname; ?> 
				</a> <br>

				<?php if($this->session->userdata('user')->amount <  $d->price){ ?>
					<i class="fa fa-ban text-danger float-left mt-3" ></i>

				<?php }else{ ?>

					<i class="fa fa-check-circle text-primary float-left mt-3"></i>
				<?php } ?> 

				<?php if($d->top_product == 1){ ?>
					<span class="bg-danger float-right p-2 text-white rounded">top</span>
				<?php } ?>
			</div>

			<?php }} }?>

		<div class="row  mx-auto">
	</form>

</div>