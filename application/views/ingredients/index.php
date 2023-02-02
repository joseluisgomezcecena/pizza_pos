<div class="container">

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('ingredient_created')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">

					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>

					<strong>Cambios Guardados!</strong>

					<?php echo $this->session->flashdata('ingredient_created'); ?>
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
				<label for="inputPassword2" class="sr-only">Nombre del ingrediente</label>
				<input type="text" class="form-control" name="ingredient_name"  id="name" placeholder="Ingrediente">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Guardar</button>

		</div>
	</div>

	<div class="row card">
		<div class="col mt-5 mb-5">
			<table id="data-table" class="table mx-sm-3">
				<thead>
				<tr>
					<th style="width: 70%">Ingrediente</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($ingredients as $ingredient): ?>
					<tr>
						<td class="font-weight-bold"><?php echo $ingredient['ingredient_name']; ?></td>
						<td class="">
							<a href="<?php echo $ingredient['ingredient_id']; ?>" class="btn btn-primary">Actualizar</a>
							<a href="<?php echo $ingredient['ingredient_id']; ?>" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>


			</table>
		</div>
	</div>
</div>
