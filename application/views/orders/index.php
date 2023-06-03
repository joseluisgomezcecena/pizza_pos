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


<div class="container-fluid mt-2 mb-5">
	<div class="row">
		<div class="col-lg-6">
			<?php echo form_open(base_url() . "orders/end_and_print/" . $order . "/cashier");?>
			<input type="hidden" id="destiny" name="order_total">
			<input type="hidden" id="shipping-destiny" name="shipping_total">
			<button style="opacity: 0" type="submit" id="primaryButton" name="end"></button>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>



<div class="container-fluid mt-5 mb-5">
	<div class="row">

		<div class="col-lg-12 ">
			<a href="<?php echo base_url(); ?>" class="btn btn-dark float-right mt-5 mb-5 btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Volver A Inicio</a>
			<a href="<?php echo base_url(); ?>cashier" class="btn btn-dark float-right mt-5 mb-5 btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Paso Anterior</a>

			<br><br>
			<button type="submit" name="end1" id="endorder" onclick="document.getElementById('primaryButton').click()"" class="btn btn-primary btn-lg btn-rounded mt-5 float-left"><i class="anticon anticon-check"></i> Terminar Orden</button>
		</div>

		<!--columna izquierda-->
		<div class="col-lg-5 mt-5">
			<div class="card">
				<div class="card-body">
					<table style="width: 100%;" id="data-table" class="table">
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
		<!--termina columna izquierda-->

		<!--columna derecha-->
		<div class="col-lg-7 mt-5">
			<div class="card">
				<div class="card-body">

					<label> <i style="font-size: 28px;">🛵</i> Tipo de envio</label>
					<select style="" class="form-control" name="shipping" id="shipping" required>
						<option value="">Seleccione</option>
						<?php foreach ($deliveries as $delivery): ?>
							<option value="<?php echo $delivery['delivery_price']; ?>"><?php echo $delivery['delivery_name']; ?> - $<?php echo $delivery['delivery_price']; ?></option>
						<?php endforeach; ?>
					</select>

					<table style="width: 100%" id="" class="table table-hover">
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
						$total_suma = 0;
						?>

						<?php foreach ($order_details as $order_detail): ?>
							<tr>

								<td>
									<!--platillo-->
									<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
									<?php echo $order_detail['notes']?><br/>
									<!--termina platillo-->
									<!--extras-->
									<?php
									$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
									foreach ($extras as $extra):
										$extra_suma += $extra['price'];
									?>
											<b>Extra:<br><?php echo $extra["ingredient_name"] ?></b> <b class="text-primary">+ $<?php echo $extra['price'] ?></b><br>
									<?php endforeach; ?>
									<!--termina extras-->
								</td>


								<!--precio-->
								<td>
									$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>
									Extras: +<?php echo $extra_suma*$order_detail['qty']; ?>
								</td>
								<!--termina precio-->

								<!--precio total-->
								<td>
									$<?php echo $order_detail['price'] *  $order_detail['qty'] ?><br>
									<b>Total: $<?php echo $total = ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?></b>
								</td>
								<!--termina precio-->

								<!--botones-->
								<td>
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
								<!--termina botones-->
							</tr>
						<?php
							$total_suma += $total;
							$extra_suma = 0;
							endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="order_total_origin" id="origin" onchange="sync()" value="<?php echo $total_suma; ?>">


<script>
	function sync(){
		var n1 = document.getElementById('origin');
		var n2 = document.getElementById('destiny');
		n2.value = n1.value;
	}
	sync();




	//disable endorder button if select shipping is empty with vanilla javascript.
	var shipping = document.getElementById('shipping');
	var endorder = document.getElementById('endorder');
	var shipping_destiny = document.getElementById('shipping-destiny');

	endorder.disabled = true;

	shipping.addEventListener('change', function(){
		if(shipping.value == ''){
			endorder.disabled = true;
		}else{
			endorder.disabled = false;

			shipping_destiny.value = shipping.value;
		}
	});


</script>

