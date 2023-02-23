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

			<?php echo validation_errors(); ?>


		</div>
	</div>


	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<div class="row">
				<div class="col-lg-12">
					<h1 class="font-weight-bolder">Platillos</h1>
				</div>
			</div>

			<?php echo form_open(base_url() . 'sides/index') ?>

				<div class="row">
					<div class="form-group col-lg-6">
						<label for="inputPassword2" class="sr-only">Nombre del platillo</label>
						<input type="text" class="form-control" name="item_name"  id="name" placeholder="Ej. Pizza de Pepperoni.">
					</div>

					<div class="form-group col-lg-6">
						<label for="inputPassword2" class="sr-only">Price</label>
						<input type="number" class="form-control" name="side_price"  id="name" placeholder="Precio">
					</div>


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
							$item_details=$controller->item_details($item['item_id']);
							foreach ($item_details as $row):
								echo $row['price']  . '<br>';
							endforeach;
							?>
						</td>
						<td>
							<a href="<?php echo base_url() . 'sides/edit/' . $item['item_id'] ?>" class="btn btn-primary btn-sm">Editar</a>
							<a href="<?php echo base_url() . 'sides/delete/' . $item['item_id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
						</td>
					</tr>


				<?php endforeach; ?>


				</tbody>


			</table>
		</div>
	</div>
</div>
