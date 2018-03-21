<div class="container">

	<div class="row ">
	<div class="col-md-6 bg-light text-center mx-auto p-3">
		<h3 class="text-primary">Successfully charged!</h3>
		<h5> Ka <?=  $this->session->userdata('user')->amount - $amount; ?></h6>
		<h6> Kar <?=  $this->session->userdata('user')->amount; ?></h6>
		<h6>Product price_ <?= $amount;?></h6>	
	</div>

</div>
</div>