<br><br>
<?php
$extra_suma = 0;
$total = 0;
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>" class="btn btn-dark float-right btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Volver A Inicio</a>

			<a href="<?php echo base_url(); ?>admin" class="btn btn-dark float-right btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Paso Anterior</a>
			&nbsp;&nbsp;
		</div>
	</div>
</div>


<div style="margin-top: 500px;" class="container mt-5">
	<div class="row card ">
		<div class="col-lg-12 mt-5 mb-3">

		<?php echo form_open(base_url() . "orders/end_and_print/" . $order['order_id']);?>
			<button type="submit" name="end" class="btn btn-primary btn-rounded"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir Recibo</button>
		<?php echo form_close();?>
			<br>

			<table class="table table-responsive-lg">
				<thead>
				<tr>
					<th style="width: 20px;">ID</th>
					<th style="width: 150px;">Cliente</th>
					<th style="width: 100px;">Teléfono</th>
					<th style="width: 180px;">Dirección</th>
					<th style="width: 70px;">Productos</th>
					<th style="width: 100px;">Fecha</th>
				</tr>
				</thead>
				<tbody>
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
							<?php echo date_format(date_create($order['created_at']),'m/d/Y H:i:s'); ?>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>



<div style="margin-top: 500px;" class="container mt-2">
	<div class="row card ">
		<div class="col-lg-12 mt-3 mb-3">

			<table class="table table-responsive-lg">
				<thead>
				<tr>
					<th class="quantity">Cantidad</th>
					<th class="description">Descripción</th>
					<th class="price">Precio</th>
				</tr>
				</thead>
				<tbody>


				<?php foreach ($order_details as $order_detail): ?>
					<tr>

						<td class="quantity">
							$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>

							<?php
							$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);

							foreach ($extras as $extra):
								$extra_suma += $extra['price'];
							endforeach; ?>

							Extras: +<?php echo $item_extra =  $extra_suma * $order_detail['qty']; ?>
						</td>

						<td class="description">
							<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
							<?php echo $order_detail['notes']?><br/>
							<?php
							$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
							foreach ($extras as $extra):
								$extra_suma += $extra['price'];
								?>
								<b>Extra: <?php echo $extra["ingredient_name"] ?></b> <b class="text-primary">$<?php echo $extra['price'] ?></b><br>

							<?php endforeach; ?>
						</td>

						<td class="price">
							$<?php echo $item_price =  $order_detail['price'] *  $order_detail['qty'] ?><br>
							+<?php echo $item_extra ?><br>
							<b>$<?php echo $item =  $item_price + $item_extra; ?></b>

							<?php $total+= $item; ?>
						</td>

					</tr>
					<?php
					$extra_suma = 0;
				endforeach;
				?>



				</tbody>
			</table>


			<div class="row">
				<div class="col-lg-12">
					<div class="float-right">
						<h4 style="margin-right: 25px;"><b>Venta:</b> $<?php echo $total; ?></h4>
						<h4 style="margin-right: 25px;"><b>Envio:</b> $<?php echo $order['delivery_price']; ?></h4>
						<h4 style="margin-right: 25px;"><u><b>Total:</b> $<?php echo $total +  $order['delivery_price']; ?></u></h4>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
