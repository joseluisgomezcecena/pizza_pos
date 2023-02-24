<div class="container">

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('message')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">

					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>

					<strong>Operación Exitosa</strong>

					<?php echo $this->session->flashdata('message'); ?>

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>


	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<div class="row">
				<div class="col-lg-12">
					<h1 class="font-weight-bolder">Platillos</h1>
				</div>
			</div>

			<?php echo form_open(base_url() . 'sides/delete/' . $item['item_id']) ?>

				<div class="row">
					<div class="form-group col-lg-12">
						<label for="inputPassword2" class="sr-only">Nombre del platillo</label>
						<input type="text" class="form-control" name="item_name"  id="name" value="<?php echo $item['item_name'] ?>" placeholder="Ej. Pizza de Pepperoni." disabled>
					</div>


					<div class="col mt-5 mb-5">
						<button type="submit" name="delete" class="btn btn-danger mb-2 float-right">Eliminar</button>
					</div>
				</div><!--row ends-->


		</div><!--col ends-->
	</div><!--card ends-->
</div>
