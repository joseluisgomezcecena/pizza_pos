<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>" class="btn btn-dark float-right btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Volver A Inicio</a>

			<a href="<?php echo base_url(); ?>cashier" class="btn btn-dark float-right btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Paso Anterior</a>

			<a href="<?php echo base_url(); ?>cashier/order/counter" class="btn btn-success float-left btn-rounded"> <i class="fa fa-cash-register"></i>&nbsp;Orden De Mostrador</a>
			&nbsp;&nbsp;
		</div>
	</div>
</div>


<div style="margin-top: 500px;" class="container mt-5">
	<div class="row card ">
		<div class="col-lg-12 mt-5 mb-5">



			<table style="width: 100%; font-size: 13px;" id="data-table" class="table table-responsive-lg">

				<thead>
				<tr>
					<th>ID</th>
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Dirección</th>
					<th>Productos</th>
					<th>Total</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($orders as $order): ?>
					<tr>
						<td><?php echo $order['order_id']; ?></td>
						<td><?php echo $order['client_name']; ?></td>
						<td><?php echo $order['client_phone']; ?></td>
						<td><?php echo $order['client_street']; ?> <?php echo $order['client_number']; ?> <?php echo $order['client_block']; ?></td>
						<td><?php echo $order['order_qty']; ?></td>
						<td><?php echo $order['order_total']; ?></td>
						<td>
							<?php
							if ($order['order_closed'] == 1){
								echo '<span class="badge badge-success">Terminada</span>';
							}
							else{
								echo '<span class="badge badge-warning">En Proceso</span>';
							}
							?>
						</td>
						<td>
							<a href="<?php echo base_url() ?>cashier/order/<?php echo $order['client_id'] ?>" class="btn btn-primary btn-rounded">
								<i class="fa fa-pizza-slice"></i>&nbsp;+Orden
							</a>
						</td>
					</tr>
				<?php endforeach; ?>

				</tbody>


			</table>
		</div>
	</div>
</div>
