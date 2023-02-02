<style>
	section {background: #e0e0e0; padding:40px 0; border-radius: 15px;}

	@media (max-width: 768px) {
		.m-text-center {text-align:center;}
		.call-to-action h1{font-size:20px;}
	}
	@media (max-width: 1024px) {
		.m-text-center {text-align:center;}
		.call-to-action h1{font-size:25px;}
	}
</style>


<?php echo form_open(base_url() . 'cashiers/addclient'); ?>


<div class="row">
	<div class="col">

		<section class="card">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8 text-left">
						<b>Orden para:</b> <span class="text-primary"><?php echo $client['client_name'] ?></span>
					</div>
					<div class="col-md-4 col-sm-4 ">
						<p><?php echo $client['client_phone'] ?></p>
						<p><?php echo $client['client_street'] . " " . $client['client_number'] . " " . $client['client_block'] ?></p>
					</div>
				</div>
			</div>
		</section>


	</div>
</div>


<div class="row">
	<div class="col">
		<table id="data-table" class="table">
			<br><br>
			<thead>
			<tr>
				<th>Platillo</th>
				<th>Acciones</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($items as $item): ?>

				<tr>
					<td><?php echo $item['item_name'] ?></td>
					<td> <a href="<?php echo base_url() ?>cashier/order/items/detail/<?php echo $item['item_id'] ?>/<?php echo $order; ?>" class="btn btn-primary">Pedir</a> </td>
				</tr>



			<?php endforeach; ?>

			</tbody>
		</table>
	</div>

	<div class="col">
		<table id="" class="table table-hover">
			<thead>
			<tr>
				<th>Platillo</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>Platillo 1</td>
					<td>2</td>
					<td>$ 200.00</td>
					<td>
						<a class="btn btn-danger" href="#"><i class="fa fa-trash text-white"></i></a>
						<a class="btn btn-success" href="#"><i class="fa fa-arrow-up text-white"></i></a>
						<a class="btn btn-warning" href="#"><i class="fa fa-arrow-down text-white"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>








<!--

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


-->

<?php echo form_close(); ?>
