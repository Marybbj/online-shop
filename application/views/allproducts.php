	<div class="container mx-auto">
		
		<form action="<?= base_url() ?>product/all" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="row  mx-auto">

				<?php if( !empty($data) ){
					foreach ( $data as $x ){ 
						if( $x->top_product == 1 ){ ?>

						<div class="col-md-4 border p-2 border-white bg-light">

							<img src="<?= base_url("uploads/$x->img");?>" alt="" width="200px" height="200px" class="border rounded" /> 

							<h4><?= $x->product_name; ?></h4>

							<h6 class="text-muted">
								<?= 'price_ '.$x->price.'$  / ' . '  quantity_ '. $x->quantity ;?>
							</h6>

							<a href="<?= base_url();?>product/all/<?=$x->user_id;?>">
								<?= $x->name. " " .$x->surname; ?> 
							</a> <br>

								<?php if($this->session->userdata('user')->amount <  $x->price){
									;?>
									<i class="fa fa-ban text-danger float-left mt-3" ></i>

									<?php }else{ ?>

									<i class="fa fa-check-circle text-primary float-left mt-3"></i>
								<?php };?> 

								<span class="bg-danger float-right p-2 text-white rounded">top</span>


						</div>

					<?php }} 
					foreach ( $data as $r ){ 
						if( $r->type_product == 1 && $r->top_product != 1 ){ ?>

						<div class="col-md-4 border  p-2 border-white bg-light">
							<img src="<?= base_url("uploads/$r->img");?>" alt="" width="200px" height="200px" class="border rounded" /> 

							<h6><?= $r->product_name;?></h6>

							<h6 class="text-muted">
								<?= 'price_ '.$r->price.'$  / ' . '  quantity_ '. $r->quantity ;?>
							</h6>

							<a href="<?= base_url();?>product/all/<?=$r->user_id;?>">
								<?= $r->name. " " .$r->surname;?> 
							</a> <br>

							<?php if( $this->session->userdata('user')->amount < $r->price ){?> 
								<i class="fa fa-ban text-danger float-left mt-3"></i>

								<?php }else{ ?>

								<i class="fa fa-check-circle text-primary float-left mt-3"></i>
							<?php };?> 
							

							<?php if( $this->session->userdata('user')->type == 1 ){ ?>
							<form action="<?= base_url() ?>admin/top" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">		

								<button type="submit" class="btn btn-outline-danger">set top product
								</button>
								<input type="hidden" name="top" value="<?=$r->id; ?>">

							</form>
							<?php }?>

							</div>	

						<?php } } } else{ ?>

						<h4 class="text-danger text-center w-100 p-3"> signup or signin for shop!</h4>

						<?php foreach ( $all as $x ){ 
						if( $x->type_product == 1  ){ ?>

						<div class="col-md-4 border p-2  border-white bg-light">

							<img src="<?= base_url("uploads/$x->img");?>" alt="" width="200px" height="200px" class="border rounded" /> 

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

								<div class="col-md-4 border border-secondary p-2 mt-4 bg-light">
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
