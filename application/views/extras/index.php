<div class="container">

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('extra_created')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">

					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>

					<strong>Cambios Guardados!</strong>

					<?php echo $this->session->flashdata('extra_created'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Extras</h1>

			<?php echo form_open(base_url() . 'extras/index',array('class'=>'form-inline')) ?>

			<div class="form-group mb-3 col-lg-12">
				<label for="inputPassword2" class="sr-only">Ingrediente</label>
				<select class="form-control" name="ingredient_id" required>
					<option value="">Ingrediente</option>
					<?php foreach ($ingredients as $ingredient): ?>
						<option value="<?php echo $ingredient['ingredient_id']; ?>"><?php echo $ingredient['ingredient_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>


			<?php foreach ($sizes as $size): ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Precio para: <?php echo $size['size_name'] ?></label>
				<input type="text" class="form-control" name="<?php echo $size['size_name'] ?>_price"  id="name" placeholder="Precio para: <?php echo $size['size_name'] ?>">
			</div>

			<?php endforeach; ?>

			<button type="submit" class="btn btn-primary mb-2">Guardar</button>

		</div>
	</div>

	<div class="row card">
		<div class="col mt-5 mb-5">
			<table id="data-table" class="table mx-sm-3">
				<thead>
				<tr>
					<th style="">Ingrediente</th>
					<th style="">Tamaño</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>


				<?php
				//loop through json data
				foreach ($extras as $extra) { ?>
					<tr>
						<td><?php echo $extra['ingredient_name']; ?></td>
						<td><?php echo $extra['size_name']; ?></td>
						<td><?php echo $extra['extra_price']; ?></td>
						<td>
							<a href="<?php echo base_url(); ?>extras/edit/<?php echo $extra['extra_id']; ?>" class="btn btn-primary btn-sm">Editar</a>
							<a href="<?php echo base_url(); ?>extras/delete/<?php echo $extra['extra_id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
						</td>
					</tr>
				<?php } ?>



				</tbody>


			</table>
		</div>
	</div>
</div>
