<div class="container ">
	<form action="<?= base_url() ?>user/onlineUsers" method="post" class="text-center" enctype="multipart/form-data" accept-charset="utf-8">

		<div class="row ">

			<?php if( !empty($data) ){
			foreach ( $data as $d ){ 
			if(!empty($d->login_time) && $d->id != $user->id){ ?>

				<div class="col-md-3 border border-white rounded p-2  bg-light">
					<div >
						<img src="<?= base_url("uploads/$d->userfile");?>" alt="" width="100px" height="100px" class="border  rounded" /> 
					</div>

					<div >
						<h5><?= $d->name . " " . $d->surname ?></h5>
						<h6> <?= $d->email; ?></h6>
						<h6 class="text-danger">last signin <br> <?= $d->login_time; ?></h6>

						<button type="button" class="btn edit-block-time" data-toggle="modal" data-target="#myModal">
							edit block time
						</button>
						
					</div>

				</div>

			<?php }} }?>

		</div>

		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title"><?=$d->name. " " . $d->surname;  ?> </h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<p> blocked <?= $d->block_time; ?></p>
						<input type="text" name="set-blocktime" value="" class="form-control" placeholder="add block time in minutes">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>

	</form>
</div>