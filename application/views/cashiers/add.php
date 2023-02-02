<?php echo form_open(base_url() . 'cashiers/addclient'); ?>
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
