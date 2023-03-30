<?php
$extra_suma = 0;
$total = 0;
$extras_producto = 0;
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
		<?php foreach ($order_details as $order_detail): ?>
		<tr>

			<td class="quantity">
				<?php echo $order_detail['qty'] ?>
				<!--
				$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>
				Extras: +<?php echo $extra_suma*$order_detail['qty']; ?>
				-->
			</td>

			<td class="description">
				<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
				<?php echo $order_detail['notes']?><br/>
				<?php
				$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
				foreach ($extras as $extra):
					$extra_suma += $extra['price'];
					?>
					<b>+Extra: <?php echo $extra["ingredient_name"] ?></b> <b class="text-primary">
					<!--
					$<?php echo $extra['price'] ?></b>c/u
					-->
					<br>
					+$<?php echo $extras_producto = $order_detail['qty'] * $extra['price'] ?>

				<?php endforeach; ?>
			</td>

			<td class="price">
				$<?php echo $precio_producto =  $order_detail['price'] *  $order_detail['qty'] ?><br>
				$<?php echo $extras_producto + $precio_producto?>
				<?php $total+= ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?>
			</td>

		</tr>
			<?php
			$extra_suma = 0;
			endforeach;
			?>

		</tbody>
	</table>

	<?php if($client):?>
		<p class="centered"><b>Dirección: <?php echo $client['client_street'] . " #" . $client['client_number'] . " " . $client['client_block'] ?></b></p>
		<p class="centered"><b><?php echo $client['client_address_notes'] ?></b></p>
	<?php else: ?>
		<p class="centered"><b>Orden de mostrador</b></p>
	<?php endif; ?>

	<p class="centered"><b>TOTAL:</b> $<?php echo $total; ?></p>
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


