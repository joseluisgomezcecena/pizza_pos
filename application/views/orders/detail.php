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



<?php  echo form_open(base_url() . 'cashier/order/items/detail/'.$item_id . '/' . $order); ?>

<div class="container-fluid mt-5 mb-5">
	<!--
	<div class="row">
		<div class="col">

			<section class="card">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8 text-left">
							<b>Orden para:</b> <span class="text-primary"><?php echo $client['client_name'] ?></span>
						</div>
						<div class="col-md-4 col-sm-4 ">
							<p><?php echo $client['client_phone'] ?></p>
							<p><?php echo $client['client_street'] . " " . $client['client_number'] . " " . $client['client_block'] ?></p>
						</div>
					</div>
				</div>
			</section>


		</div>
	</div>
	-->

	<div class="row">
		<div class="col mt-5">
			<img class="img-fluid img-thumbnail" src="<?php echo base_url() ?>assets/uploads/pepperoni.jpg" alt="Product">
		</div>

		<div class="col align-middle mt-5">
			<div class="card">
				<div class="card-body">
					<h2><?php echo $item['item_name'] ?></h2>

					<p style="font-weight: bolder; font-size: 16px;" ID="price"></p>

					<div class="row mt-3">
						<div class="col">
							<label>Tamaño:</label>
							<select class="form-control" name="size" id="size" required>
								<option value="">Seleccione</option>
								<?php foreach ($sizes as $size): ?>
									<option value="<?php echo $size['size_id'] ?>"><?php echo $size['size_name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col">
							<label>Ingredientes:</label>
							<br><br/>
							<?php foreach ($ingredients as $ingredient): ?>

								<input name="ingredients[]" type="checkbox" value="<?php echo $ingredient['ingredient_id'] ?>" checked> <?php echo $ingredient['ingredient_name'] ?>&nbsp;&nbsp;

							<?php endforeach; ?>
						</div>
					</div>


					<div class="row mt-3">
						<div class="col">
							<label>Extras:</label>
							<br><br/>
							<?php foreach ($extras as $extra): ?>

								<input name="extras[]" type="checkbox" id="<?php echo $extra['ingredient_id'] ?>" value="<?php echo $extra['ingredient_id'] ?>" /> <?php echo $extra['ingredient_name'] ?>&nbsp;&nbsp;

							<?php endforeach; ?>
						</div>
					</div>


					<div class="row mt-3">
						<div class="col">
							<label>Cantidad:</label>
							<input type="number" name="qty" class="form-control" required>
						</div>
					</div>



					<button type="submit" class="btn btn-primary mt-3">Agregar a la Orden.</button>
				</div><!--card-body-->
			</div>
		</div>
	</div>
</div>

<?php echo form_close(); ?>
