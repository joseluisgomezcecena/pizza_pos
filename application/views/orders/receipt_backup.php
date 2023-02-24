<style>
	body {
		width: 100%;
		height: 100%;
		margin: 0 !important;
		padding: 0 !important;
		background-color: #FAFAFA;
		font: 12pt "Tahoma";
	}
	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	.page {
		width: 58mm;
		min-height: 297mm;
		padding: 3mm;
		margin: 3mm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
		padding: 0.5cm;
		border: 5px red solid;
		height: 257mm;
		outline: 1cm #FFEAEA solid;
	}

	@page {
		/*
		size: A4;
		*/
		margin: 0 !important;
	}
	@media print {
		html, body {
			width: 58mm;
			height: 297mm;
		}
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;

		}
	}
</style>


<div class="">
	<div class="row">

		<div class="col-lg-12 ">
			<a href="#" class="btn btn-primary btn-lg btn-rounded mt-5 float-right"><i class="anticon anticon-check"></i> Terminar Orden</a>
		</div>



		<!--columna derecha-->
		<div class="">
			<div class="book">
				<div class="page">
					<table style="width: 100%" id="elem" class="table table-hover subpage">
						<thead>
						<tr>
							<th style="width: 35%">Platillo</th>
							<th style="width: 25%">Precio X Cantidad</th>
							<th style="width: 25%">Precio</th>
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

									<?php
									$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
									foreach ($extras as $extra):
										$extra_suma += $extra['price'];
									?>
											<b>Extra: <?php  $extra["ingredient_name"] ?></b> <b class="text-primary"><?php echo $extra['price'] ?></b><br>

									<?php endforeach; ?>
								</td>


								<td>
									$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>
									Extras: +<?php echo $extra_suma*$order_detail['qty']; ?>
								</td>


								<td>$<?php echo $order_detail['price'] *  $order_detail['qty'] ?><br><b>Total: $<?php echo ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?></b></td>

							</tr>
						<?php
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

<script>
	//print page

	window.onload = function() {
		window.print();
	}




</script>


