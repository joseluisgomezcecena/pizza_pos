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

	<div class="row card ">
		<div class="col-lg-12 mt-5 mb-5">



			<table style="width: 100%; font-size: 13px;" id="data-table" class="table table-responsive-lg">

				<thead>
				<tr>
					<th style="width: 20px;">ID</th>
					<th style="width: 100px;">Cliente</th>
					<th style="width: 100px;">Teléfono</th>
					<th style="width: 100px;">Dirección</th>
					<th style="width: 100px;">Productos</th>
					<th style="width: 100px;">Total</th>
					<th style="width: 100px;">Status</th>
					<th style="width: 100px;">Fecha</th>
					<th style="width: 301px;">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($orders as $order): ?>
					<tr>
						<td><?php echo $order['order_id']; ?></td>
						<td>
							<?php
							if ($order['client_name'] == NULL)
							{
								echo "<b class='text-success'>Mostrador</b>";
							}
							else
							{
								echo "<b class='text-primary'>".$order['client_name']."</b>";
							}
							?>
						</td>
						<td>
							<?php
							if ($order['client_phone'] == NULL)
							{
								echo "__";
							}
							else
							{
								echo $order['client_phone'];
							}

							?>
						</td>
						<td>
							<?php if ($order['client_phone'] == NULL): ?>
								<?php echo "__"; ?>
							<?php else: ?>
								<?php echo $order['client_street']; ?> <?php echo $order['client_number']; ?> <?php echo $order['client_block']; ?>
							<?php endif; ?>

						</td>
						<td><?php echo $order['order_qty']; ?></td>
						<td>
							<?php
							if ($order['order_total'] == NULL)
							{
								echo "__";
							}
							else
							{
								echo $order['order_total'];
							}
							?>
						</td>
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
							<?php echo date_format(date_create($order['created_at']),'m/d/Y H:i:s'); ?>
						</td>
						<td>
							<a href="<?php echo base_url() ?>cashier/view/<?php echo $order['order_id'] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-eye"></i></a>

							<?php if ($order['order_closed'] == 0 && $order['order_total'] == NULL): ?>
								<a href="<?php echo base_url() ?>cashier/delete/<?php echo $order['order_id'] ?>" class="btn btn-danger btn-rounded"><i class="fa fa-trash-alt"></i></a>
							<?php endif; ?>

							<?php if ($order['order_closed'] != 0 && $order['order_total'] != NULL): ?>
								<a href="<?php echo base_url() ?>cashier/delete/<?php echo $order['order_id'] ?>" class="btn btn-danger btn-rounded"><i class="fa fa-trash-alt"></i></a>
							<?php endif; ?>


						</td>
					</tr>
				<?php endforeach; ?>

				</tbody>


			</table>
		</div>
	</div>
</div>
