	<div class="container col-md-8">

		<?php if($this->session->flashdata('error')): ?>
			<div class="alert alert-danger text-center col-md-5 mx-auto">
				<?= $this->session->flashdata('error');  ?>
			</div>	
		<?php endif; ?>

		<div class="bg-light mx-auto border rounded p-3 w-50">

			<h3 class="text-center text-danger">add products</h3>
			<br>

			<form action="<?= base_url() ?>product/addproduct" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">

				<input type="file" name="img"  size="20" />
				<br><br>
				
				<div class="form-group">
					<input type="text" name="product-name" placeholder="product name" class="form-control">
				</div>
				
				<div class="form-group">
					<input type="number" name="product-quantity" placeholder="product quantity
					" min="1" class="form-control">
				</div>
				
				<div class="form-group">
					<input type="number" name="product-price" placeholder="product price
					" min="1" class="form-control">
				</div>
				
				<button type="submit" class="btn btn-primary">save</button>
				
			</form>

		</div>
	</div>