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

			<div>
				<?php echo validation_errors(); ?>
			</div>

		</div>
	</div>

	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Eliminar Envios.</h1>

			<?php echo form_open(base_url() . 'shipping/delete/' . $delivery['delivery_id'], array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Nombre o tipo de envio</label>
				<input type="text" class="form-control" name="delivery_name"  id="name" value="<?php echo $delivery['delivery_name']; ?>" placeholder="Nombre" disabled>
			</div>


			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Precio del envio</label>
				<input type="numbre" step="0.1" class="form-control" name="delivery_price"  id="price" value="<?php echo $delivery['delivery_price'] ?>" placeholder="Precio" disabled>
			</div>


			<button type="submit" name="delete" class="btn btn-danger mb-2">Eliminar</button>

		</div>
	</div>
</div>
