<div class="container">


	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Ingredientes</h1>

			<?php echo form_open(base_url() . 'ingredients/edit/' . $ingredient['ingredient_id'], array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="">Nombre del ingrediente</label>
				<input type="text" class="form-control" name="ingredient_name"  id="name" placeholder="Ingrediente" value="<?php echo $ingredient['ingredient_name'] ?>">
			</div>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="">Es orilla: </label>
				<select  class="form-control" name="is_crust"  id="is_curst" required>
					<option value="">Seleccione</option>
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary mb-2">Actualizar</button>

		</div>
	</div>
</div>
