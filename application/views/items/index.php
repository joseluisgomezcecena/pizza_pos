<div class="container">

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('message')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">

					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>

					<strong>Operación exitosa</strong>

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

			<?php echo form_open(base_url() . 'items/index') ?>

				<div class="row">
					<div class="form-group col-lg-12">
						<label for="inputPassword2" class="sr-only">Nombre del platillo</label>
						<input type="text" class="form-control" name="item_name"  id="name" placeholder="Ej. Pizza de Pepperoni.">
					</div>

					<div style="padding-left: 32px; padding-right: 15px" class="row">
						<?php foreach ($ingredients as $ingredient): ?>
							<!--checkboxes-->
							<div class="form-check col-lg-3 mt-2 mb-2">
								<input class="form-check-input" type="checkbox" name="ingredient_id[]" value="<?php echo $ingredient['ingredient_id']; ?>" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1">
									<?php echo $ingredient['ingredient_name']; ?>
								</label>
							</div>
						<?php endforeach; ?>
					</div>

					<?php foreach ($sizes as $size): ?>
						<div class="form-group mb-2 mt-3 col-lg-4">
							<label for="inputPassword2" class="">Precio para: <?php echo $size['size_name'] ?></label>
							<input type="number" class="form-control" name="<?php echo $size['size_name'] ?>_price"  id="name" placeholder="Precio para: <?php echo $size['size_name'] ?>">
						</div>
					<?php endforeach; ?>


					<div class="col mt-5 mb-5">
						<button type="submit" class="btn btn-primary mb-2 float-right">Guardar</button>
					</div>
				</div><!--row ends-->


		</div><!--col ends-->
	</div><!--card ends-->

	<div class="row card">
		<div class="col mt-5 mb-5">
			<table id="data-table" class="table mx-sm-3">
				<thead>
				<tr>
					<th style="">Platillo</th>
					<th style="">Precios</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>


				<?php
				foreach ($items as $item):
				?>

					<tr>
						<td><?php echo $item['item_name'] ?></td>
						<td>
							<?php
							//$item_details  = Items::item_details($item['item_id']);
							$item_details=$controller->item_details($item['item_id']);
							foreach ($item_details as $row):
								echo $row['price']  . '<br>';
							endforeach;
							?>
						</td>
						<td>
							<a href="<?php echo base_url() . 'items/edit/' . $item['item_id'] ?>" class="btn btn-primary btn-sm">Editar</a>
							<a href="<?php echo base_url() . 'items/delete/' . $item['item_id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
						</td>
					</tr>


				<?php endforeach; ?>


				</tbody>


			</table>
		</div>
	</div>
</div>
