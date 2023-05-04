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

			<div>
				<?php echo validation_errors(); ?>
			</div>

		</div>
	</div>

	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Envios</h1>

			<?php echo form_open(base_url() . 'shipping/index',array('class'=>'form-inline')) ?>

			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Nombre o tipo de envio</label>
				<input type="text" class="form-control" name="delivery_name"  id="name" placeholder="Nombre">
			</div>


			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">Precio del envio</label>
				<input type="numbre" step="0.1" class="form-control" name="delivery_price"  id="price" placeholder="Precio">
			</div>


			<button type="submit" class="btn btn-primary mb-2">Guardar</button>

		</div>
	</div>

	<div class="row card">
		<div class="col mt-5 mb-5">
			<table id="data-table" class="table mx-sm-3">
				<thead>
				<tr>
					<th style="width: 70%">Entrega</th>
					<th style="width: 70%">Precio</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($deliveries as $delivery): ?>
					<tr>
						<td class="font-weight-bold"><?php echo $delivery['delivery_name']; ?></td>
						<td class="font-weight-bold"><?php echo $delivery['delivery_price']; ?></td>
						<td class="">
							<a href="<?php echo base_url() ?>admin/shipping/edit/<?php echo $delivery['delivery_id']; ?>" class="btn btn-primary">Actualizar</a>
							<a href="<?php echo base_url() ?>admin/shipping/delete/<?php echo $delivery['delivery_id']; ?>" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
