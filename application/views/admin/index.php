<div class="row">
	<!--col-->
	<div class="col-md-6 col-lg-3">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between align-items-center">
					<div>
						<p class="m-b-0">Ventas</p>
						<h2 class="m-b-0">
							<span>$14,966</span>
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
						<p class="m-b-0">Net Revenue</p>
						<h2 class="m-b-0">
							<span>$14,966</span>
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
						<p class="m-b-0">Net Revenue</p>
						<h2 class="m-b-0">
							<span>$14,966</span>
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
						<p class="m-b-0">Net Revenue</p>
						<h2 class="m-b-0">
							<span>$14,966</span>
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
					<h5>Ultimas Transacciones</h5>
					<div>
						<a href="#" class="btn btn-sm btn-default">Ver Todo</a>
					</div>
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
										<div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
											<img src="<?php echo base_url() ?>assets/img/2094661.png" alt="">
										</div>
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

