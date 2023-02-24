<?php
$extra_suma = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>Receipt example</title>
</head>
<body>
<div class="ticket">
	<img src="./logo.png" alt="Logo">
	<p class="centered">RECEIPT EXAMPLE
		<br>Address line 1
		<br>Address line 2</p>
	<table>
		<thead>
		<tr>
			<th class="quantity">Q.</th>
			<th class="description">Description</th>
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

				<?php
				$extras = $controller->get_extras($order_detail['order_id'],$order_detail['oi_id']);
				foreach ($extras as $extra):
					$extra_suma += $extra['price'];
					?>
					<b>Extra: <?php  $extra["ingredient_name"] ?></b> <b class="text-primary"><?php echo $extra['price'] ?></b><br>

				<?php endforeach; ?>
			</td>
			<td class="price">
				$<?php echo $order_detail['price'] *  $order_detail['qty'] ?>
				Total: $<?php echo ($order_detail['price'] *  $order_detail['qty'])+($extra_suma * $order_detail['qty'])  ?>

			</td>

		</tr>
			<?php
			$extra_suma = 0;
			endforeach;
			?>

		</tbody>
	</table>
	<p class="centered">Thanks for your purchase!
		<br>parzibyte.me/blog</p>
</div>
<button id="btnPrint" class="hidden-print">Print</button>
<script src="script.js"></script>
</body>
</html>



<script>
	//print page

	window.onload = function() {
		window.print();
	}

	/*

	const $btnPrint = document.querySelector("#btnPrint");
	$btnPrint.addEventListener("click", () => {
		window.print();
	});

	*/
</script>


