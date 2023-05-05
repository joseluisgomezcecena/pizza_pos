<?php
$extra_suma = 0;
$total = 0;
$extras_producto = 0;
$total_suma = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>Recibo</title>
</head>

<body>
<div class="ticket centered">
	<img style="width: 50px; height: auto;" src="<?php echo base_url() ?>assets/img/p1.png" alt="Logo">

	<p class="centered">
		CHEKOS PIZZA
		<br>
		Calle Rio Presidio 1301, Colonia Roma
	</p>

	<table>
		<thead>
		<tr>
			<th class="quantity">Qty.</th>
			<th class="description">Descripción</th>
			<th class="price">Precio</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($order_details as $order_detail):
		?>
			<tr>

				<td>
					<?php echo $order_detail['qty']; ?>
				</td>


				<!--precio-->
				<td>
					<!--platillo-->
					<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
					<?php echo $order_detail['notes']?><br/>
					<!--termina platillo-->

					<!--extras-->
					<?php
					$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);

					if($extras != null)
					{
						echo "<b>Extra(s):</b><br>";
						foreach ($extras as $extra):
							$extra_suma += $extra['price'];
							?>
							<small>*<?php echo $extra["ingredient_name"] ?></small><br><small>+ $<?php echo $extra['price'] ?></small><br>
						<?php
						endforeach;
					}
					?>

					<br>

					$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>
					<?php
					if($extra_suma != 0)
					{
						echo "Extras: +" . $extra_suma*$order_detail['qty'];
					}

					?>
				</td>
				<!--termina precio-->

				<!--precio total-->
				<td>
					<!--
					$<?php echo $order_detail['price'] *  $order_detail['qty'] ?><br>
					-->
					<b>
						<!--
						Total: $
						-->
						$<?php echo $total = ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?>
					</b>
				</td>
				<!--termina precio-->

			</tr>
		<?php
			$total_suma += $total;
			$extra_suma = 0;
		endforeach;
		?>

		<tr>
			<td>1</td>
			<td>Envio</td>
			<td>$<?php echo $order_data['delivery_price']; ?></td>
		</tr>

		</tbody>
	</table>

	<?php if($client):?>
		<p class="centered"><b>Dirección: <?php echo $client['client_street'] . " #" . $client['client_number'] . " " . $client['client_block'] ?></b></p>
		<p class="centered"><b><?php echo $client['client_address_notes'] ?></b></p>
	<?php else: ?>
		<p class="centered"><b>Orden de mostrador</b></p>
	<?php endif; ?>

	<p class="centered"><b>TOTAL:</b> $<?php echo $total_suma + $order_data['delivery_price']; ?></p>
	<p class="centered">Gracias Por Su Compra!
		<br>CHEKOS PIZZA</p>
	<br><br><br>
	-----------cortar aqui-------------
	<br>
</div>
<button id="btnPrint" class="hidden-print">Imprimir</button>
<a href="<?php echo base_url() . $link ?>" class="hidden-print">Volver</a>

<script src="script.js"></script>

</body>
</html>



<script>
	//print page

	window.onload = function() {
		window.print();
	}



	const $btnPrint = document.querySelector("#btnPrint");
	$btnPrint.addEventListener("click", () => {
		window.print();
	});


</script>


