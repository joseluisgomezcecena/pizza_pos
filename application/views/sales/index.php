<div class="row">

	<div class="col-md-12">
		<?php echo form_open(base_url() . "sales/index"); ?>
			<div class="row">
				<div class="col-md-3">
					<input class="form-control" type="date" name="start" id="start">
				</div>
				<div class="col-md-3">
					<input class="form-control" type="date" name="end" id="end">
				</div>
				<div class="col-md-6">
					<button class="btn btn-primary float-left" type="submit" name="report"><i class="fa fa-search"></i>&nbsp;Buscar</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>

	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<h5>Reporte de ventas</h5>
				</div>
				<div class="m-t-30">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Cliente</th>
								<th>Productos</th>
								<th>Total</th>
								<th>Status</th>
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

												<h6 class="m-l-10 m-b-0"><?php echo $order['client_name'] ?></h6>
											</div>
										</div>
									</td>

									<td><?php echo $order['order_qty'] ?></td>

									<td>$<?php echo $order['order_total'] ?></td>

									<td>
										<div class="d-flex align-items-center">
											<span class="badge badge-success badge-dot m-r-10"></span>
											<span>Terminada</span>
										</div>
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

