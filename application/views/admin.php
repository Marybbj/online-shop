	<div class="container mx-auto text-center">
		<div class="row  mx-auto">

			<?php if( !empty($data) ){
				foreach( $data as $r ){ 
					if( $r->type_product != 1 ){ ?>

					<div class="col-md-4 border border-white p-1 bg-light" >

						<img src='<?= base_url("uploads/$r->img");?>' alt="" width="200px" height="200px" class="border  rounded" /> 

						<h4><?= $r->product_name;?></h4>

						<h6 class="text-muted">
							<?= 'price_ '.$r->price.'$  / ' . '  quantity_ '. $r->quantity ;?>	
						</h6>	

						<a href="<?= base_url();?>product/all/<?=$r->user_id;?>">
							<?= $r->name. " " .$r->surname;?>  
						</a> 
						<hr>					

						<span class="border border-secondary rounded  p-1">
							for one,income <?= $r->percent;?>$
						</span>
						<br><br>

						<form action="<?= base_url() ?>admin/save" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8" style="display:inline-block">

							<button type="submit" class="btn btn-info" >Save</button>
							<input type="hidden"  name="save" value="<?= $r->id; ?>">

						</form>

						<form action="<?= base_url() ?>admin/delete" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8" style="display:inline-block">					
							<button type="submit" class="btn btn-danger" name="del">Delete</button>
							<input type="hidden" name="del" value="<?=$r->id; ?>">

						</form>

					</div>	
					<?php }} 
				}else{
					var_dump("admin.php/line 29");
				} ?> 

			</div>
		</div>
