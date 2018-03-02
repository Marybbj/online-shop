	<?php if($this->session->flashdata('error')): ?>
		<div class="alert alert-danger text-center col-md-5 mx-auto">
			<?= $this->session->flashdata('error');  ?>
		</div>	
	<?php endif; ?>

	<div class="container col-md-8">
		<div class="bg-light mx-auto border text-center rounded p-3 w-50">
			<h3 class="text-center text-danger">change your info</h3>
			<form action="<?= base_url() ?>user/edit" method="post" class="text-center" enctype="multipart/form-data">

				<!--<h6 class="text-center text-primary">
				 	<?php if(!empty($msg) && empty($this->session->flashdata('error')) ){
				 		echo $msg; 
				 	} ?> 
				<h6> -->

				<br>
				<input type="file" name="file" size="20" />
				<br><br>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?= $this->session->userdata("user")->name ?>" name="name">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?= $this->session->userdata("user")->surname ?>" name="surname">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="old-pass" placeholder="your password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="new-pass" placeholder="new password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="new-pass2"  placeholder="confirm password">
				</div>

				<button type="submit" class="btn btn-primary">save</button>
				
				<h6 class="text-center pt-3 text-primary">log in again for see all changes</h6>

			</form>
		</div>
	</div>
