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

			<h1 class="font-weight-bolder mx-sm-3">Ingredientes</h1>

			<?php echo form_open(base_url() . 'ingredients/index',array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="">Nombre del ingrediente: </label>
				<input type="text" class="form-control" name="ingredient_name"  id="name" placeholder="Ingrediente" required>
			</div>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="">Es orilla: </label>
				<select  class="form-control" name="is_crust"  id="is_curst" required>
					<option value="">Seleccione</option>
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Guardar</button>

		</div>
	</div>

	<div class="row card">
		<div class="col mt-5 mb-5">
			<table id="data-table" class="table mx-sm-3">
				<thead>
				<tr>
					<th style="width: 50%">Ingrediente</th>
					<th style="width: 25%">Tipo</th>
					<th style="width: 25%">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($ingredients as $ingredient): ?>
					<tr>
						<td class="font-weight-bold"><?php echo $ingredient['ingredient_name']; ?></td>
						<td class="font-weight-bold">
							<?php
								 if($ingredient['is_crust']==1)
								 {
									 echo "Orilla";
								 }
								 else
								 {
									 echo "Ingrediente";
								 }
							?>
						</td>
						<td class="">
							<a href="<?php echo base_url() ?>admin/ingredients/edit/<?php echo $ingredient['ingredient_id']; ?>" class="btn btn-primary">Actualizar</a>
							<a href="<?php echo base_url() ?>admin/ingredients/delete/<?php echo $ingredient['ingredient_id']; ?>" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>


			</table>
		</div>
	</div>
</div>
