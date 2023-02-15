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


	<?php //echo form_open(base_url() . 'cashiers/addclient',array('class' => 'mt-5', 'id' => 'form')); ?>

	<div class="container-fluid mt-5 mb-5">
		<div class="row">
		<div class="col-lg-5 mt-5">
			<div class="card">
				<div class="card-body">
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
								<td>
									<a href="<?php echo base_url() ?>cashier/order/items/detail/<?php echo $item['item_id'] ?>/<?php echo $order; ?>" class="btn btn-primary">Pedir</a>
								</td>
							</tr>



						<?php endforeach; ?>

						</tbody>
					</table>
				</div>

			</div>
		</div>

		<div class="col-lg-7 mt-5">
			<div class="card">
				<div class="card-body">
					<table id="" class="table table-hover">
						<thead>
						<tr>
							<th style="width: 35%">Platillo</th>
							<th style="width: 25%">Precio X Cantidad</th>
							<th style="width: 25%">Precio</th>
							<th style="width: 15%">Acciones</th>
						</tr>
						</thead>
						<tbody>

						<?php
						$extra_suma = 0;
						?>

						<?php foreach ($order_details as $order_detail): ?>
							<tr>
								<td>
									<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
									<?php foreach ($order_extras as $order_extra): ?>
									    <?php
											echo "<b>Extra:</b>" . $order_extra["ingredient_name"] ." <b class='text-primary' '> +".$order_extra['price']."</b><br>";
											$extra_suma += $order_extra['price'];
										?>
									<?php endforeach; ?>
								</td>
								<td>$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>Extras: +<?php echo $extra_suma*$order_detail['qty']; ?></td>
								<td>$<?php echo $order_detail['price'] *  $order_detail['qty'] ?><br><b>Total: $<?php echo ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?></b></td>
								<td>

									<a class="btn btn-dark" href="<?php echo base_url() ?>cashier/order/items/edit/<?php echo $order_detail['oi_id'] ?>"><i class="fa fa-edit text-white"></i></a>

									<?php echo form_open(base_url() . 'orders/remove/' . $order_detail['order_id'] . '/' . $order_detail['oi_id'], array('class' => '', 'id' => 'form')) ?>
										<button class="btn btn-danger" name="remove"><i class="fa fa-trash text-white"></i></button>
									<?php echo form_close() ?>

									<?php echo form_open(base_url() . 'orders/up/' . $order_detail['order_id'] . '/' . $order_detail['oi_id'],array('class' => '', 'id' => 'form')) ?>
										<button class="btn btn-success" name="up"><i class="fa fa-arrow-up text-white"></i></button>
									<?php echo form_close() ?>

									<?php echo form_open(base_url() . 'orders/down/' . $order_detail['order_id'] . '/' . $order_detail['oi_id'],array('class' => '', 'id' => 'form')) ?>
										<button class="btn btn-warning" name="down"><i class="fa fa-arrow-down text-white"></i></button>
									<?php echo form_close() ?>

								</td>
							</tr>
						<?php

							endforeach;
						?>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>
	</div>

	<?php //echo form_close(); ?>




