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
						<table class="table table-hover" id="data-table">
							<thead>
							<tr>
								<th>ID</th>
								<th>Cliente</th>
								<th>Productos</th>
								<th>Total</th>
								<th>Fecha</th>
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

												<h6 class="m-l-10 m-b-0">
													<?php
														if ($order['client_name'] == NULL)
														{
															echo "<b>Mostrador</b>";
														}
														else
														{
															echo "<b>".$order['client_name']."</b>";
														}
													?>

												</h6>
											</div>
										</div>
									</td>

									<td><?php echo $order['order_qty'] ?></td>

									<td>$<?php echo $order['order_total'] ?></td>


									<td>
									<?php
									//format date
									echo date("d/m/Y", strtotime($order['created_at']));
									?>
									</td>

									<td>
										<div class="d-flex align-items-center">
										<?php
											if ($order['order_closed'] == 1){
												echo '<span>Terminada</span>';
											}
											else{
												echo '<span>En Proceso</span>';
											}
										?>
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

