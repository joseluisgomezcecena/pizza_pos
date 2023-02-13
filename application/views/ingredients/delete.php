<div class="container">


	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Ingredientes</h1>

			<?php echo form_open(base_url() . 'ingredients/delete/' . $ingredient['ingredient_id'], array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Nombre del ingrediente</label>
				<input type="text" class="form-control" name="ingredient_name"  id="name" placeholder="Ingrediente" value="<?php echo $ingredient['ingredient_name'] ?>" disabled>
			</div>

			<button type="submit" name="delete" class="btn btn-danger mb-2">Eliminar</button>

		</div>
	</div>
</div>
