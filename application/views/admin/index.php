<div class="row">
	<!--col-->
	<div class="col-md-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<p class="m-b-0">Ordenes Hoy</p>
						<h2 class="m-b-0">
							<span><?php echo $panels['orders'] ?></span>
						</h2>
					</div>
					<div class="avatar avatar-icon avatar-lg avatar-blue">
						<i class="anticon anticon-ordered-list"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end col-->
	<!--col-->
	<div class="col-md-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<p class="m-b-0">Ventas Hoy</p>
						<h2 class="m-b-0">
							<span>$<?php echo $panels['total'] ?></span>
						</h2>
					</div>
					<div class="avatar avatar-icon avatar-lg avatar-blue">
						<i class="anticon anticon-dollar"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end col-->
	<!--col-->
	<div class="col-md-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<p class="m-b-0">Ordenes Mes</p>
						<h2 class="m-b-0">
							<span><?php echo $panels_month['orders'] ?></span>
						</h2>
					</div>
					<div class="avatar avatar-icon avatar-lg avatar-blue">
						<i class="anticon anticon-ordered-list"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end col-->
	<!--col-->
	<div class="col-md-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<p class="m-b-0">Ventas Mes</p>
						<h2 class="m-b-0">
							<span>$<?php echo $panels_month['total'] ?></span>
						</h2>
					</div>
					<div class="avatar avatar-icon avatar-lg avatar-blue">
						<i class="anticon anticon-dollar"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end col-->
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="font-weight-bolder">Ultimas Ventas</h5>
					<div>
						<a href="<?php echo base_url() ?>admin/sales" class="btn btn-primary btn-rounded">Ver todas las ventas </a>
					</div>
				</div>
				<div class="m-t-30">
					<div class="table-responsive">
						<table id="data-table" class="table table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Cliente</th>
								<th>Productos</th>
								<th>Venta</th>
								<th>Envio</th>

								<!--
								<th>Status</th>
								-->

								<th>Fecha</th>
								<th>Detalles</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($orders as $order): ?>

								<tr>
									<td>
										#<?php echo $order['order_id'] ?>
									</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="d-flex align-items-center">

												<h6 class="m-l-10 m-b-0">
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
												</h6>

											</div>
										</div>
									</td>
									<td><?php echo $order['order_qty'] ?></td>
									<td>$<?php echo $order['order_total'] ?></td>
									<td>$
										<?php
											if ($order['delivery_price'] == 0 || $order['delivery_price'] == NULL)
											{
												echo "0";
											}
											else
											{
												echo $order['delivery_price'];
											}
										?>
									<!--
									<td>
										<div class="d-flex align-items-center">
										
										<?php
											if ($order['order_closed'] == 1){
												echo '<span class="badge badge-success">Terminada</span>';
											}
											else{
												echo '<span class="badge badge-warning">En Proceso</span>';
											}
										?>

										</div>
									</td>
									-->

									<td>
										<?php echo date_format(date_create($order['created_at']), 'd/M/Y H:i')  ?>
									</td>

									<td>
										<a href="<?php echo base_url() ?>admin/view/<?php echo $order['order_id'] ?>" class="btn btn-primary btn-rounded">
											<i class="fa fa-file-invoice"></i>&nbsp; Detalles
										</a>
									</td>


								</tr>

							<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

