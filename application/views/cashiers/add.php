<?php echo form_open(base_url() . 'cashiers/addclient/' . $param); ?>
	<div class="row">
		<div class="col">
			<?php if ($this->session->flashdata('message')): ?>
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
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<label for="">Nombre</label>
			<input type="text" class="form-control" name="name" placeholder="Nombre">
		</div>
		<div class="col">
			<label for="">Telefono</label>
			<input type="text" class="form-control" name="phone" placeholder="Telefono">
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<label for="">Calle</label>
			<input type="text" class="form-control" name="street" placeholder="Calle">
		</div>
		<div class="col">
			<label for="">Numero Externo</label>
			<input type="text" class="form-control" name="number" placeholder="Numero externo">
		</div>
		<div class="col">
			<label for="">Cuadra</label>
			<input type="text" class="form-control" name="neighborhood" placeholder="Cuadra">
		</div>
	</div>
	<div class="row mt-5">
		<div class="col">
			<label for="">Notas de la dirección</label>
			<textarea  class="form-control" name="notes" placeholder="Notas"></textarea>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col">
			<button type="submit" class="btn btn-primary">Guardar Cliente</button>
		</div>
	</div>

<?php echo form_close(); ?>
