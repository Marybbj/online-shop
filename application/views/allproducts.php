	<div class="container mx-auto">
	
	<?php require_once('./config.php'); ?>
		
		<form action="<?= base_url() ?>product/all" method="post" class="" enctype="multipart/form-data" accept-charset="utf-8">

				<label>Sort by: </label> <br>
				<a  href="<?= base_url();?>product/sortLow" class="pr-5"> Lowest Price </a>
				<a href="<?= base_url();?>product/sortHigh" class=""> Highest Price </a>
				<hr>

			<div class="row  mx-auto">
				<?php if( !empty($data) ){
					foreach ( $data as $r ){ 
						if( $r->type_product == 1){ ?>

						<div class="col-md-4 border  p-2 border-white bg-light">

							<?php if( $r->top_product == 1 ){ ?>
								<button class="btn-danger w-25 rounded mb-2" disabled> top 
								</button>
							<?php } ?>

							<?php if( $this->session->userdata('user')->type == 1  &&  $r->top_product != 1){ ?>
							<form action="<?= base_url() ?>admin/top" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">		

								<button type="submit" class=" btn-outline-danger w-25 rounded mb-2		">set  top 
								</button>
								<input type="hidden" name="top" value="<?=$r->id; ?>">

							</form>
							<?php }?>



							<img src="<?= base_url("uploads/$r->img");?>" alt="" width="300px" height="250px" class="border rounded" /> 

							<h6><?= $r->product_name;?></h6>

							<h6 class="text-muted">
								<?= 'price_ '.$r->price.'$  / ' . '  quantity_ '. $r->quantity ;?>
							</h6>

							author:
							<a href="<?= base_url();?>product/all/<?=$r->user_id;?>">
								<?= $r->name. " " .$r->surname;?> 
							</a> <br>


							<?php if( $this->session->userdata('user')->amount < $r->price ){?> 
								
								<i class="fa fa-ban text-danger text-center mt-2"></i>
							<?php }else{ ?>
								 
							<form action="<?=base_url()?>product/buy" method="post" class="text-center">
								<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								data-key="<?php echo $stripe['publishable_key']; ?>"
								data-description="<?= $this->session->userdata('user')->name; ?>"
								data-amount="<?= $r->price ?>"
								data-locale="auto"></script>
								<input type="hidden" name="price"  value="<?= $r->price ?>">
								<input type="hidden" name="seller_id"  value="<?= $r->user_id ?>">
							</form>

							<?php }?> 							

							</div> 

						<?php } } } else{ ?>

						<h4 class="text-danger text-center w-100 p-3"> signup or signin for shop!</h4>

						<?php foreach ( $all as $x ){ 
						if( $x->type_product == 1  ){ ?>

						<div class="col-md-4 border p-2  border-white bg-light">

							<img src="<?= base_url("uploads/$x->img");?>" alt="" width="280px" height="250px" class="border rounded" /> 

							<h4><?= $x->product_name;?></h4>
							<h6 class="text-muted">
								<?= 'price_ '.$x->price.'$  / ' . '  quantity_ '. $x->quantity ;?>
							</h6>

						</div>	
						<?php }  } } ?> 
			


						<?php if( !empty($id) ){ 
							$query = $this->db->query("SELECT * from users join products on users.id = $id and user_id = $id"); ?>
							 <div class="col-md-12">
								<br><hr> <h3 class="text-primary p-2 m-2">
									all products of <?= $query->result()[0]->name ." " .$query->result()[0]->surname; ?>
								</h3> <br>
							</div> 

							<?php foreach ( $query->result() as $q ){ 
								if( $q->type_product == 1 ){ ?>

								<div class="col-md-4 border border-secondary p-2 mt-4 bg-light text-center">
									<img src="../../uploads/<?=$q->img ?>" alt="" width="130px" height="130px" class="border rounded" /> 

									<h4><?= $q->product_name;?></h4>

									<h6 class="text-muted">
										<?= 'price_ '.$q->price.'$  / ' . '  quantity_ '. $q->quantity ;?>
									</h6>

									<?php if( $this->session->userdata('user')->amount < $q->price ){?> 
										<i class="fa fa-ban text-danger float-left mt-3"></i>
									<?php }else{ ?>
										<i class="fa fa-check-circle text-primary float-left mt-3"></i>
									<?php }; ?> 

								</div>
						<?php }	}  }?>
				</div> 
				<br><hr>
		</form>
	</div>
