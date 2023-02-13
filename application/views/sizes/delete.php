<div class="container">
	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Tamaños</h1>

			<?php echo form_open(base_url() . 'sizes/delete/' . $size['size_id'], array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Tamaño</label>
				<input type="text" class="form-control" name="size_name"  id="name" value="<?php echo $size['size_name'] ?>" placeholder="Tamaño" disabled>
			</div>
			<button type="submit" name="delete" class="btn btn-danger mb-2">Eliminar</button>
		</div>
	</div>
</div>
