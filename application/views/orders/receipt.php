<?php
$extra_suma = 0;
$total = 0;
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
	<p class="centered">CHEKOS PIZZA
		<br>Lombardo Toledano 1398-1,
		<br>Calle Rio Presidio 1301, Calle Diluvio Condesa</p>
	<table>
		<thead>
		<tr>
			<th class="quantity">Cant.</th>
			<th class="description">Descripción</th>
			<th class="price">$$</th>
		</tr>
		</thead>
		<tbody>


		<?php foreach ($order_details as $order_detail): ?>
		<tr>

			<td class="quantity">
				$<?php echo $order_detail['price'] ?> X <?php echo $order_detail['qty'] ?><br>
				Extras: +<?php echo $extra_suma*$order_detail['qty']; ?>
			</td>

			<td class="description">
				<?php echo $order_detail['item_name'] ?><br><?php echo $order_detail['size_name'] ?><br>
				<?php echo $order_detail['notes']?><br/>
				<?php
				$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
				foreach ($extras as $extra):
					$extra_suma += $extra['price'];
					?>
					<b>Extra: <?php echo $extra["ingredient_name"] ?></b> <b class="text-primary"><?php echo $extra['price'] ?></b><br>

				<?php endforeach; ?>
			</td>

			<td class="price">
				$<?php echo $order_detail['price'] *  $order_detail['qty'] ?><br>
				Total: $<?php echo $total+= ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?>
			</td>

		</tr>
			<?php
			$extra_suma = 0;
			endforeach;
			?>

		</tbody>
	</table>
	<p class="centered"><?php echo $client['client_street'] . " " . $client['number'] . " " . $client['client_block'] ?></p>
	<p class="centered"><b>TOTAL:</b> $<?php echo $total; ?></p>
	<p class="centered">Gracias Por Su Compra!
		<br>CHEKOS PIZZA</p>
	<br><br>
	------------------------
	<br>
</div>
<button id="btnPrint" class="hidden-print">Imprimir</button>
<button onclick="history.back()" class="hidden-print">Volver</button>
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


